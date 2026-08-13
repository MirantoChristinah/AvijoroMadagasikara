<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class Produits extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['produits'] = $db->table('produits')
            ->select('produits.*, produits_traductions.nom')
            ->join('produits_traductions', 'produits_traductions.produit_id = produits.id', 'left')
            ->where('produits_traductions.langue_id', 2)
            ->orderBy('produits.id', 'ASC')
            ->get()->getResultArray();

        return view('Administration/produits/index', $data);
    }

    public function creer()
    {
        return view('Administration/produits/creer');
    }

    public function enregistrer()
    {
        $db = \Config\Database::connect();

        $fichierImage = $this->request->getFile('image');
        $nomImagePourBDD = null;

        if ($fichierImage && $fichierImage->isValid() && !$fichierImage->hasMoved()) {
            $nomImagePourBDD = $fichierImage->getRandomName();
            $fichierImage->move(FCPATH . 'uploads/images/', $nomImagePourBDD);
        }

        $donneesProduit = [
            'prix'       => (int) $this->request->getPost('prix'),
            'categorie'  => $this->request->getPost('categorie') ?: null,
            'tailles'    => $this->request->getPost('tailles') ?: null,
            'couleurs'   => $this->request->getPost('couleurs') ?: null,
            'disponible' => $this->request->getPost('disponible') ? 1 : 0,
            'image'      => $nomImagePourBDD,
        ];

        $db->transStart();

        $db->table('produits')->insert($donneesProduit);
        $produitId = $db->insertID();

        $blocsTraductions = $this->request->getPost('trad');
        if (is_array($blocsTraductions)) {
            foreach ($blocsTraductions as $langueId => $champs) {
                $db->table('produits_traductions')->insert([
                    'produit_id'   => $produitId,
                    'langue_id'    => $langueId,
                    'nom'          => $champs['nom'],
                    'description'  => $champs['description'],
                ]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Échec de la sauvegarde.');
        }

        return redirect()->to('/admin/produits')->with('success', 'Produit ajouté avec succès !');
    }

    public function supprimer($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/produits');
        }

        $db = \Config\Database::connect();

        $produit = $db->table('produits')->where('id', $id)->get()->getRowArray();

        if ($produit) {
            if ($produit['image'] && file_exists(FCPATH . 'uploads/images/' . $produit['image'])) {
                unlink(FCPATH . 'uploads/images/' . $produit['image']);
            }

            $db->table('produits')->where('id', $id)->delete();

            return redirect()->to('/admin/produits')->with('success', 'Le produit et ses traductions ont été définitivement supprimés.');
        }

        return redirect()->to('/admin/produits')->with('error', 'Produit introuvable.');
    }

    public function modifier($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/produits');
        }

        $db = \Config\Database::connect();

        $data['produit'] = $db->table('produits')->where('id', $id)->get()->getRowArray();

        if (!$data['produit']) {
            return redirect()->to('/admin/produits')->with('error', 'Produit introuvable.');
        }

        $traductions = $db->table('produits_traductions')->where('produit_id', $id)->get()->getResultArray();

        $data['traductions'] = [];
        foreach ($traductions as $t) {
            $data['traductions'][$t['langue_id']] = $t;
        }

        return view('Administration/produits/modifier', $data);
    }

    public function mettreAJour($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/produits');
        }

        $db = \Config\Database::connect();

        $produitActuel = $db->table('produits')->where('id', $id)->get()->getRowArray();
        if (!$produitActuel) {
            return redirect()->to('/admin/produits')->with('error', 'Produit introuvable.');
        }

        $fichierImage = $this->request->getFile('image');
        $nomImagePourBDD = $produitActuel['image'];

        if ($fichierImage && $fichierImage->isValid() && !$fichierImage->hasMoved()) {
            if ($produitActuel['image'] && file_exists(FCPATH . 'uploads/images/' . $produitActuel['image'])) {
                unlink(FCPATH . 'uploads/images/' . $produitActuel['image']);
            }
            $nomImagePourBDD = $fichierImage->getRandomName();
            $fichierImage->move(FCPATH . 'uploads/images/', $nomImagePourBDD);
        }

        $donneesProduit = [
            'prix'       => (int) $this->request->getPost('prix'),
            'categorie'  => $this->request->getPost('categorie') ?: null,
            'tailles'    => $this->request->getPost('tailles') ?: null,
            'couleurs'   => $this->request->getPost('couleurs') ?: null,
            'disponible' => $this->request->getPost('disponible') ? 1 : 0,
            'image'      => $nomImagePourBDD,
        ];

        $db->transStart();

        $db->table('produits')->where('id', $id)->update($donneesProduit);

        $blocsTraductions = $this->request->getPost('trad');
        if (is_array($blocsTraductions)) {
            foreach ($blocsTraductions as $langueId => $champs) {
                $existe = $db->table('produits_traductions')
                    ->where('produit_id', $id)
                    ->where('langue_id', $langueId)
                    ->countAllResults();

                if ($existe > 0) {
                    $db->table('produits_traductions')
                        ->where('produit_id', $id)
                        ->where('langue_id', $langueId)
                        ->update([
                            'nom'         => $champs['nom'],
                            'description' => $champs['description'],
                        ]);
                } else {
                    $db->table('produits_traductions')->insert([
                        'produit_id'   => $id,
                        'langue_id'    => $langueId,
                        'nom'          => $champs['nom'],
                        'description'  => $champs['description'],
                    ]);
                }
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Échec de la mise à jour.');
        }

        return redirect()->to('/admin/produits')->with('success', 'Le produit a été mis à jour avec succès !');
    }
}
