<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class Medias extends BaseController
{
   
   public function index()
{
    $db = \Config\Database::connect();

    $data['medias'] = $db->table('media')
        ->select('media.*, media_traductions.titre')
        ->join('media_traductions', 'media_traductions.media_id = media.id AND media_traductions.langue_id = 2', 'left')
        ->get()->getResultArray();

    return view('Administration/medias/index', $data);
}
    public function creer()
    {
        $db = \Config\Database::connect();
        
        // On récupère les projets existants pour pouvoir lier le média si besoin
        $data['projets'] = $db->table('projets')
            ->select('projets.id, projets_traductions.titre')
            ->join('projets_traductions', 'projets_traductions.projet_id = projets.id', 'left')
            ->where('projets_traductions.langue_id', 2)
            ->get()->getResultArray();

        return view('Administration/medias/creer', $data);
    }

    
    public function supprimer($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/medias');
        }

        $db = \Config\Database::connect();
        $media = $db->table('media')->where('id', $id)->get()->getRowArray();

        if ($media) {
            // Nettoyage physique du fichier sur le serveur selon son type
            if ($media['type'] === 'photo' && file_exists(FCPATH . 'uploads/images/' . $media['fichier'])) {
                unlink(FCPATH . 'uploads/images/' . $media['fichier']);
            } elseif ($media['type'] === 'document' && file_exists(FCPATH . 'uploads/documents/' . $media['fichier'])) {
                unlink(FCPATH . 'uploads/documents/' . $media['fichier']);
            }

            // Suppression en BDD (Cascade automatique vers les traductions)
            $db->table('media')->where('id', $id)->delete();

            return redirect()->to('/admin/medias')->with('success', 'Le média a été définitivement supprimé.');
        }

        return redirect()->to('/admin/medias')->with('error', 'Média introuvable.');
    }

    public function modifier($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/medias');
        }

        $db = \Config\Database::connect();

        // On récupère les données globales du média
        $data['media'] = $db->table('media')->where('id', $id)->get()->getRowArray();

        if (!$data['media']) {
            return redirect()->to('/admin/medias')->with('error', 'Média introuvable.');
        }

        // On va chercher toutes les traductions écrites pour ce média
        $traductionsExistantes = $db->table('media_traductions')->where('media_id', $id)->get()->getResultArray();
        
        // On réorganise le tableau pour injecter les textes par langue_id (1=mg, 2=fr, 3=en)
        $data['traductions'] = [];
        foreach ($traductionsExistantes as $t) {
            $data['traductions'][$t['langue_id']] = $t;
        }

        // On récupère les projets pour le cas où l'admin veut changer le lien
        $data['projets'] = $db->table('projets')
            ->select('projets.id, projets_traductions.titre')
            ->join('projets_traductions', 'projets_traductions.projet_id = projets.id', 'left')
            ->where('projets_traductions.langue_id', 2)
            ->get()->getResultArray();

        return view('Administration/medias/modifier', $data);
    }

      
    public function enregistrer()
    {
        $db = \Config\Database::connect();
        
        $type = $this->request->getPost('type');
        $projetId = $this->request->getPost('projet_id') ?: null;
        $nomFichierPourBDD = null;

        if ($type === 'photo' || $type === 'document') {
            $file = $this->request->getFile('fichier_upload');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $nomFichierPourBDD = $file->getRandomName();
                $file->move(($type === 'photo') ? FCPATH . 'uploads/images/' : FCPATH . 'uploads/documents/', $nomFichierPourBDD);
            }
        } elseif ($type === 'video') {
            $urlVideo = $this->request->getPost('fichier_video');
            
            // Extraction de l'ID YouTube si l'admin colle une URL complète
            if (!empty($urlVideo)) {
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|[^/]+\?v=)|youtu\.be/)([^"&?/\s]{11})%i', $urlVideo, $match)) {
                    $nomFichierPourBDD = $match[1];
                } else {
                    $nomFichierPourBDD = $urlVideo;
                }
            }
        }

        // Sécurité : évite l'insertion d'une ligne vide dans la colonne obligatoire 'fichier'
        if (empty($nomFichierPourBDD)) {
            return redirect()->back()->with('error', 'Le fichier ou le lien vidéo YouTube est obligatoire.');
        }

        $db->transStart();

        // Insertion dans la table principale 'media'
        $db->table('media')->insert([
            'projet_id' => $projetId,
            'type'      => $type,
            'fichier'   => $nomFichierPourBDD
        ]);
        
        $mediaId = $db->insertID();
        $blocsTraductions = $this->request->getPost('trad');

        // Parcours sécurisé des onglets de langues
        if (is_array($blocsTraductions)) {
            foreach ($blocsTraductions as $langueId => $champs) {
                
                // Si l'onglet masqué n'a pas été rempli, on passe au suivant sans insérer de ligne invalide
                if (empty($champs['titre'])) {
                    continue; 
                }

                $db->table('media_traductions')->insert([
                    'media_id'    => $mediaId,
                    'langue_id'   => $langueId,
                    'titre'       => esc($champs['titre']),
                    'description' => !empty($champs['description']) ? esc($champs['description']) : null
                ]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la sauvegarde en base de données.');
        }

        return redirect()->to('/admin/medias')->with('success', 'Média enregistré avec succès !');
    }
    public function mettreAJour($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/medias');
        }

        $db = \Config\Database::connect();
        $mediaActuel = $db->table('media')->where('id', $id)->get()->getRowArray();

        if (!$mediaActuel) {
            return redirect()->to('/admin/medias')->with('error', 'Média introuvable.');
        }

        $type = $mediaActuel['type'];
        $nomFichierPourBDD = $mediaActuel['fichier'];

        if ($type === 'photo' || $type === 'document') {
            $file = $this->request->getFile('fichier_upload');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                if ($mediaActuel['fichier']) {
                    $ancienChemin = ($type === 'photo') ? FCPATH . 'uploads/images/' : FCPATH . 'uploads/documents/';
                    if (file_exists($ancienChemin . $mediaActuel['fichier'])) {
                        unlink($ancienChemin . $mediaActuel['fichier']);
                    }
                }
                $nomFichierPourBDD = $file->getRandomName();
                $file->move(($type === 'photo') ? FCPATH . 'uploads/images/' : FCPATH . 'uploads/documents/', $nomFichierPourBDD);
            }
        } elseif ($type === 'video') {
            $urlVideo = $this->request->getPost('fichier_video');
            if (!empty($urlVideo)) {
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|[^/]+\?v=)|youtu\.be/)([^"&?/\s]{11})%i', $urlVideo, $match)) {
                    $nomFichierPourBDD = $match[1];
                } else {
                    $nomFichierPourBDD = $urlVideo;
                }
            }
        }

        if (empty($nomFichierPourBDD)) {
            return redirect()->back()->with('error', 'Le fichier ou le lien ne peut pas être vide.');
        }

        $db->transStart();

        $db->table('media')->where('id', $id)->update([
            'projet_id' => $this->request->getPost('projet_id') ?: null,
            'fichier'   => $nomFichierPourBDD
        ]);

        $blocsTraductions = $this->request->getPost('trad');
        
        if (is_array($blocsTraductions)) {
            foreach ($blocsTraductions as $langueId => $champs) {
                
                // Si le titre modifié a été effacé ou laissé vide, on ignore
                if (empty($champs['titre'])) {
                    continue;
                }

                $existe = $db->table('media_traductions')
                            ->where('media_id', $id)
                            ->where('langue_id', $langueId)
                            ->countAllResults();

                if ($existe > 0) {
                    $db->table('media_traductions')
                        ->where('media_id', $id)
                        ->where('langue_id', $langueId)
                        ->update([
                            'titre'       => esc($champs['titre']),
                            'description' => !empty($champs['description']) ? esc($champs['description']) : null
                        ]);
                } else {
                    $db->table('media_traductions')->insert([
                        'media_id'    => $id,
                        'langue_id'   => $langueId,
                        'titre'       => esc($champs['titre']),
                        'description' => !empty($champs['description']) ? esc($champs['description']) : null
                    ]);
                }
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Échec de la mise à jour.');
        }

        return redirect()->to('/admin/medias')->with('success', 'Le média a été mis à jour avec succès !');
    }
}