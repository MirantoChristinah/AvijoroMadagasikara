<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class Projets extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        $data['projets'] = $db->table('projets')
            ->select('projets.*, projets_traductions.titre')
            ->join('projets_traductions', 'projets_traductions.projet_id = projets.id', 'left')
            ->where('projets_traductions.langue_id', 2) 
            ->get()->getResultArray();

        return view('Administration/projets/index', $data);
    }

    public function creer()
    {
        return view('Administration/projets/creer');
    }

    public function enregistrer()
    {
        $db = \Config\Database::connect();
        
        $fichierImage = $this->request->getFile('image');
        $nomImagePourBDD = null;

        // Si une image valide a été sélectionnée dans le formulaire
        if ($fichierImage && $fichierImage->isValid() && !$fichierImage->hasMoved()) {
            
            $nomImagePourBDD = $fichierImage->getRandomName();
            $fichierImage->move(FCPATH . 'uploads/images/', $nomImagePourBDD);
        }

        // Préparation de l'écriture dans la table 'projets'
        $donneesProjet = [
            'categorie'           => $this->request->getPost('categorie'),
            'statut'              => $this->request->getPost('statut'),
            'date_debut'          => $this->request->getPost('date_debut') ?: null,
            'date_fin'            => $this->request->getPost('date_fin') ?: null,
            'document_drive_link' => $this->request->getPost('document_drive_link') ?: null,
            'image'               => $nomImagePourBDD
        ];

        // Lancement de la transaction sécurisée
        $db->transStart();

        // Insertion dans 'projets'
        $db->table('projets')->insert($donneesProjet);
        $projetId = $db->insertID();

        // Récupération du tableau des textes multilingues
        $blocsTraductions = $this->request->getPost('trad');

        // On boucle sur les langues reçues (1=mg, 2=fr, 3=en)
        foreach ($blocsTraductions as $langueId => $champs) {
            $db->table('projets_traductions')->insert([
                'projet_id'   => $projetId,
                'langue_id'   => $langueId,
                'titre'       => $champs['titre'],
                'description' => $champs['description']
            ]);
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Échec de la sauvegarde.');
        }

        return redirect()->to('/admin/projets')->with('success', 'Projet ajouté avec succès !');
    }
    public function supprimer($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/projets');
        }

        $db = \Config\Database::connect();

        $projet = $db->table('projets')->where('id', $id)->get()->getRowArray();

        if ($projet) {
            if ($projet['image'] && file_exists(FCPATH . 'uploads/images/' . $projet['image'])) {
                unlink(FCPATH . 'uploads/images/' . $projet['image']);
            }

            
            $db->table('projets')->where('id', $id)->delete();

            return redirect()->to('/admin/projets')->with('success', 'Le projet et ses traductions ont été définitivement supprimés.');
        }

        return redirect()->to('/admin/projets')->with('error', 'Projet introuvable.');
    }
    public function modifier($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/projets');
        }

        $db = \Config\Database::connect();

        // On récupère les données globales du projet
        $data['projet'] = $db->table('projets')->where('id', $id)->get()->getRowArray();

        if (!$data['projet']) {
            return redirect()->to('/admin/projets')->with('error', 'Projet introuvable.');
        }

        // On récupère toutes les traductions existantes pour ce projet, indexées par langue_id
        $traductions = $db->table('projets_traductions')->where('projet_id', $id)->get()->getResultArray();
        
        // On réorganise le tableau pour que les clés soient les IDs des langues (1, 2, 3)
        $data['traductions'] = [];
        foreach ($traductions as $t) {
            $data['traductions'][$t['langue_id']] = $t;
        }

        return view('Administration/projets/modifier', $data);
    }

    public function mettreAJour($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/projets');
        }

        $db = \Config\Database::connect();

        // On vérifie que le projet existe bien
        $projetActuel = $db->table('projets')->where('id', $id)->get()->getRowArray();
        if (!$projetActuel) {
            return redirect()->to('/admin/projets')->with('error', 'Projet introuvable.');
        }

        // Gestion du téléversement de la nouvelle image (si elle est fournie)
        $fichierImage = $this->request->getFile('image');
        $nomImagePourBDD = $projetActuel['image']; // Par défaut, on garde l'ancienne

        if ($fichierImage && $fichierImage->isValid() && !$fichierImage->hasMoved()) {
            // On supprime l'ancienne image du disque dur si elle existe
            if ($projetActuel['image'] && file_exists(FCPATH . 'uploads/images/' . $projetActuel['image'])) {
                unlink(FCPATH . 'uploads/images/' . $projetActuel['image']);
            }
            // On enregistre la nouvelle
            $nomImagePourBDD = $fichierImage->getRandomName();
            $fichierImage->move(FCPATH . 'uploads/images/', $nomImagePourBDD);
        }

        // Préparation des données globales à mettre à jour
        $donneesProjet = [
            'categorie'           => $this->request->getPost('categorie'),
            'statut'              => $this->request->getPost('statut'),
            'date_debut'          => $this->request->getPost('date_debut') ?: null,
            'date_fin'            => $this->request->getPost('date_fin') ?: null,
            'document_drive_link' => $this->request->getPost('document_drive_link') ?: null,
            'image'               => $nomImagePourBDD
        ];

        // Lancement de la transaction sécurisée
        $db->transStart();

        // Mise à jour de la table principale 'projets'
        $db->table('projets')->where('id', $id)->update($donneesProjet);

        // Récupération des blocs textuels du formulaire
        $blocsTraductions = $this->request->getPost('trad');

        // On boucle sur chaque langue pour mettre à jour ou insérer si elle manquait
        foreach ($blocsTraductions as $langueId => $champs) {
            // On vérifie si la traduction existe déjà en BDD
            $existe = $db->table('projets_traductions')
                        ->where('projet_id', $id)
                        ->where('langue_id', $langueId)
                        ->countAllResults();

            if ($existe > 0) {
                // Si elle existe, on met à jour le titre et la description
                $db->table('projets_traductions')
                    ->where('projet_id', $id)
                    ->where('langue_id', $langueId)
                    ->update([
                        'titre'       => $champs['titre'],
                        'description' => $champs['description']
                    ]);
            } else {
                // Sécurité : si elle n'existait pas, on la crée
                $db->table('projets_traductions')->insert([
                    'projet_id'   => $id,
                    'langue_id'   => $langueId,
                    'titre'       => $champs['titre'],
                    'description' => $champs['description']
                ]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Échec de la mise à jour.');
        }

        return redirect()->to('/admin/projets')->with('success', 'Le projet a été mis à jour avec succès !');
    }

}
