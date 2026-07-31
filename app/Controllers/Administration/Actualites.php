<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class Actualites extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        $data['actualites'] = $db->table('actualites')
            ->select('actualites.*, actualites_traductions.titre')
            ->join('actualites_traductions', 'actualites_traductions.actualite_id = actualites.id', 'left')
            ->where('actualites_traductions.langue_id', 2)
            ->orderBy('actualites.date_publication', 'DESC')
            ->get()->getResultArray();

        return view('Administration/actualites/index', $data);
    }

    public function creer()
    {
        return view('Administration/actualites/creer');
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

        $donneesActu = [
            'categorie'        => $this->request->getPost('categorie'),
            'video'            => $this->request->getPost('video') ?: null, 
            'date_publication' => $this->request->getPost('date_publication') ?: date('Y-m-d'),
            'image'            => $nomImagePourBDD
        ];

        // Lancement de la transaction sécurisée
        $db->transStart();

        $db->table('actualites')->insert($donneesActu);
        $actuId = $db->insertID();

        $blocsTraductions = $this->request->getPost('trad');

        foreach ($blocsTraductions as $langueId => $champs) {
            $db->table('actualites_traductions')->insert([
                'actualite_id' => $actuId,
                'langue_id'    => $langueId,
                'titre'        => $champs['titre'],
                'contenu'      => $champs['contenu']
            ]);
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Échec de l\'enregistrement.');
        }

        return redirect()->to('/admin/actualites')->with('success', 'Actualité publiée avec succès !');
    }

    public function supprimer($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/actualites');
        }

        $db = \Config\Database::connect();
        $actu = $db->table('actualites')->where('id', $id)->get()->getRowArray();

        if ($actu) {
            if ($actu['image'] && file_exists(FCPATH . 'uploads/images/' . $actu['image'])) {
                unlink(FCPATH . 'uploads/images/' . $actu['image']);
            }

            $db->table('actualites')->where('id', $id)->delete();

            return redirect()->to('/admin/actualites')->with('success', 'L\'actualité a bien été supprimée.');
        }

        return redirect()->to('/admin/actualites')->with('error', 'Actualité introuvable.');
    }

    
    public function modifier($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/actualites');
        }

        $db = \Config\Database::connect();

        $data['actualite'] = $db->table('actualites')->where('id', $id)->get()->getRowArray();

        if (!$data['actualite']) {
            return redirect()->to('/admin/actualites')->with('error', 'Actualité introuvable.');
        }

        $traductionsExistantes = $db->table('actualites_traductions')->where('actualite_id', $id)->get()->getResultArray();
        
        $data['traductions'] = [];
        foreach ($traductionsExistantes as $t) {
            $data['traductions'][$t['langue_id']] = $t;
        }

        return view('Administration/actualites/modifier', $data);
    }

    
    public function mettreAJour($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/actualites');
        }

        $db = \Config\Database::connect();

        $actuActuelle = $db->table('actualites')->where('id', $id)->get()->getRowArray();
        if (!$actuActuelle) {
            return redirect()->to('/admin/actualites')->with('error', 'Actualité introuvable.');
        }

        $fichierImage = $this->request->getFile('image');
        $nomImagePourBDD = $actuActuelle['image']; 

        if ($fichierImage && $fichierImage->isValid() && !$fichierImage->hasMoved()) {
            if ($actuActuelle['image'] && file_exists(FCPATH . 'uploads/images/' . $actuActuelle['image'])) {
                unlink(FCPATH . 'uploads/images/' . $actuActuelle['image']);
            }
            
            $nomImagePourBDD = $fichierImage->getRandomName();
            $fichierImage->move(FCPATH . 'uploads/images/', $nomImagePourBDD);
        }

        $donneesActu = [
            'categorie'        => $this->request->getPost('categorie'),
            'video'            => $this->request->getPost('video') ?: null,
            'date_publication' => $this->request->getPost('date_publication') ?: date('Y-m-d'),
            'image'            => $nomImagePourBDD
        ];

        $db->transStart();
        $db->table('actualites')->where('id', $id)->update($donneesActu);
        $blocsTraductions = $this->request->getPost('trad');

        foreach ($blocsTraductions as $langueId => $champs) {
            // On vérifie si la ligne de traduction existe déjà pour cette langue
            $existe = $db->table('actualites_traductions')
                        ->where('actualite_id', $id)
                        ->where('langue_id', $langueId)
                        ->countAllResults();

            if ($existe > 0) {
                $db->table('actualites_traductions')
                    ->where('actualite_id', $id)
                    ->where('langue_id', $langueId)
                    ->update([
                        'titre'   => $champs['titre'],
                        'contenu' => $champs['contenu']
                    ]);
            } 
            else
            {
                $db->table('actualites_traductions')->insert([
                    'actualite_id' => $id,
                    'langue_id'    => $langueId,
                    'titre'        => $champs['titre'],
                    'contenu'      => $champs['contenu']
                ]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Échec de la mise à jour.');
        }

        return redirect()->to('/admin/actualites')->with('success', 'L\'actualité a été mise à jour avec succès !');
    }

}
