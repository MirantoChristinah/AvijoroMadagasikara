<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class Actualites extends BaseController
{
    // 1. Liste des actualités
    public function index()
    {
        $db = \Config\Database::connect();
        
        // On récupère les actus avec le titre en Français (langue_id = 2) par défaut
        $data['actualites'] = $db->table('actualites')
            ->select('actualites.*, actualites_traductions.titre')
            ->join('actualites_traductions', 'actualites_traductions.actualite_id = actualites.id', 'left')
            ->where('actualites_traductions.langue_id', 2)
            ->orderBy('actualites.date_publication', 'DESC')
            ->get()->getResultArray();

        return view('Administration/actualites/index', $data);
    }

    // 2. Formulaire d'ajout
    public function creer()
    {
        return view('Administration/actualites/creer');
    }

    // 3. Sauvegarde de l'actualité (Données globales + Boucle des langues)
    public function enregistrer()
    {
        $db = \Config\Database::connect();
        
        // Gestion de l'image de l'article (public/uploads/images/)
        $fichierImage = $this->request->getFile('image');
        $nomImagePourBDD = null;

        if ($fichierImage && $fichierImage->isValid() && !$fichierImage->hasMoved()) {
            $nomImagePourBDD = $fichierImage->getRandomName();
            $fichierImage->move(FCPATH . 'uploads/images/', $nomImagePourBDD);
        }

        // Préparation des données globales
        $donneesActu = [
            'categorie'        => $this->request->getPost('categorie'),
            'video'            => $this->request->getPost('video') ?: null, // Lien YouTube
            'date_publication' => $this->request->getPost('date_publication') ?: date('Y-m-d'),
            'image'            => $nomImagePourBDD
        ];

        // Lancement de la transaction sécurisée
        $db->transStart();

        // Insertion globale et récupération de l'ID généré
        $db->table('actualites')->insert($donneesActu);
        $actuId = $db->insertID();

        // Récupération des blocs textuels (FR, MG, EN)
        $blocsTraductions = $this->request->getPost('trad');

        // Boucle pour insérer les lignes de textes (1=mg, 2=fr, 3=en)
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

    // 4. Suppression complète (Nettoyage de la photo incluse)
    public function supprimer($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/actualites');
        }

        $db = \Config\Database::connect();
        $actu = $db->table('actualites')->where('id', $id)->get()->getRowArray();

        if ($actu) {
            // On retire physiquement l'image du disque si elle existe
            if ($actu['image'] && file_exists(FCPATH . 'uploads/images/' . $actu['image'])) {
                unlink(FCPATH . 'uploads/images/' . $actu['image']);
            }

            // Supprime l'actu (et ses traductions grâce au ON DELETE CASCADE de ta BDD)
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

        // On récupère les données globales de l'actualité
        $data['actualite'] = $db->table('actualites')->where('id', $id)->get()->getRowArray();

        if (!$data['actualite']) {
            return redirect()->to('/admin/actualites')->with('error', 'Actualité introuvable.');
        }

        // On va chercher toutes les traductions écrites pour cette actualité
        $traductionsExistantes = $db->table('actualites_traductions')->where('actualite_id', $id)->get()->getResultArray();
        
        // On réorganise le tableau pour injecter les textes par langue_id (1, 2, 3) dans la vue
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

        // On vérifie que l'actualité existe en BDD avant de travailler
        $actuActuelle = $db->table('actualites')->where('id', $id)->get()->getRowArray();
        if (!$actuActuelle) {
            return redirect()->to('/admin/actualites')->with('error', 'Actualité introuvable.');
        }

        // Gestion du remplacement de la photo sur le disque
        $fichierImage = $this->request->getFile('image');
        $nomImagePourBDD = $actuActuelle['image']; // Par défaut on garde l'actuelle

        if ($fichierImage && $fichierImage->isValid() && !$fichierImage->hasMoved()) {
            // 📁 Si une nouvelle photo arrive, on efface l'ancienne pour éviter d'encombrer le serveur
            if ($actuActuelle['image'] && file_exists(FCPATH . 'uploads/images/' . $actuActuelle['image'])) {
                unlink(FCPATH . 'uploads/images/' . $actuActuelle['image']);
            }
            
            // On enregistre la nouvelle
            $nomImagePourBDD = $fichierImage->getRandomName();
            $fichierImage->move(FCPATH . 'uploads/images/', $nomImagePourBDD);
        }

        // Préparation des données globales rafraîchies
        $donneesActu = [
            'categorie'        => $this->request->getPost('categorie'),
            'video'            => $this->request->getPost('video') ?: null,
            'date_publication' => $this->request->getPost('date_publication') ?: date('Y-m-d'),
            'image'            => $nomImagePourBDD
        ];

        // Lancement de la transaction sécurisée
        $db->transStart();

        // Étape A : Mise à jour de la table globale
        $db->table('actualites')->where('id', $id)->update($donneesActu);

        // Étape B : Boucle pour mettre à jour les 3 langues reçues du formulaire
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
