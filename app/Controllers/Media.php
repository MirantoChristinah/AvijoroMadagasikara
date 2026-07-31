<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MediaModel;

class Media extends BaseController
{
    public function index()
    {
        // 1. Initialisation du modèle
        $mediaModel = new MediaModel();
        
        // 2. Récupération de la langue actuellement active sur le site ('fr', 'en', ou 'mg')
        $locale = $this->request->getLocale();
        
        // 3. Récupération du filtre sélectionné par l'utilisateur (URL ?type=...)
        $typeSelectionne = $this->request->getGet('type') ?? 'Tous';
        
        // 4. Préparation des données pour la vue avec vos médias traduits
        $data = [
            'lang'             => $locale, // Utile pour vos liens multilingues dans la vue
            'type_selectionne' => $typeSelectionne,
            'liste_medias'     => $mediaModel->getMediasFormates($locale, $typeSelectionne)
        ];
        
        // 5. Chargement de votre fonction d'affichage personnalisée
        return $this->body("avijoro/media", $data);
    }

    public function voir($id)
    {
        $mediaModel = new MediaModel();
        $locale     = $this->request->getLocale();

        // Récupérer le média sélectionné avec sa traduction
        $mediaModel->select('
            media.id, 
            media.type, 
            media.fichier, 
            media.projet_id,
            media_traductions.titre, 
            media_traductions.description
        ');
        $mediaModel->join('media_traductions', 'media_traductions.media_id = media.id');
        $mediaModel->join('langues', 'langues.id = media_traductions.langue_id');
        $mediaModel->where('langues.code', $locale);
        $mediaModel->where('media.id', $id);
        
        $media = $mediaModel->first();

        // Si le média n'existe pas, redirection ou erreur 404
        if (!$media) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Formatage des chemins selon vos nouveaux dossiers dans public/
        if ($media['type'] === 'document') {
            // Fichiers dans public/documents/
            $cheminFichier = base_url('documents/' . $media['fichier']);
            $miniature     = base_url('assets/images/icons/pdf-placeholder.png');
        } elseif ($media['type'] === 'video') {
            // Vidéos et miniatures dans public/images/
            $cheminFichier = base_url('images/' . $media['fichier']);
            $miniature     = base_url('images/thumbnails/' . pathinfo($media['fichier'], PATHINFO_FILENAME) . '.jpg');
        } else {
            // Images classiques dans public/images/
            $cheminFichier = base_url('images/' . $media['fichier']);
            $miniature     = $cheminFichier;
        }

        $media['chemin_complet'] = $cheminFichier;
        $media['miniature']      = $miniature;

        $data = [
            'lang'  => $locale,
            'media' => $media
        ];

        // On utilise l'antislash \ pour appeler votre fonction globale body()
        return $this->body("avijoro/media_detail", $data);
    }
}
