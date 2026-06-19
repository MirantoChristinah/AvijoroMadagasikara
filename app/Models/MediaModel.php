<?php

namespace App\Models;

use CodeIgniter\Model;

class MediaModel extends Model
{
    protected $table            = 'media';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['projet_id', 'type', 'fichier'];

    /** 

     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @param string|null 
     * @return array 
     */
    public function getMediasFormates(string $codeLangue, ?string $typeFiltre = null): array
    {
        $this->select('
            media.id, 
            media.type, 
            media.fichier, 
            media_traductions.titre, 
            media_traductions.description
        ');

        $this->join('media_traductions', 'media_traductions.media_id = media.id');
        $this->join('langues', 'langues.id = media_traductions.langue_id');
        $this->where('langues.code', $codeLangue);

        if ($typeFiltre !== null && $typeFiltre !== 'Tous')
        {
            
            $dbType = 'photo';
            if ($typeFiltre === 'Vidéos') $dbType = 'video';
            if ($typeFiltre === 'Documents') $dbType = 'document';

            $this->where('media.type', $dbType);
        }

        $this->orderBy('media.created_at', 'DESC');
        $resultats = $this->findAll();

        foreach ($resultats as &$media)
        {
            
            $typeVue = 'Photo';
            $miniature = base_url('uploads/medias/' . $media['fichier']);
            $badge = '';

            if ($media['type'] === 'video') 
            {
                $typeVue = 'Vidéo';
                $miniature = base_url('uploads/medias/thumbnails/' . pathinfo($media['fichier'], PATHINFO_FILENAME) . '.jpg');
                $badge = ''; // à ajouter dans la table (durée d'une vidéo)
            } 
            
            elseif ($media['type'] === 'document') 
            {
                $typeVue = 'Document';
                $miniature = base_url('assets/images/icons/pdf-placeholder.png');
                $badge = 'PDF';
            }

            $media['type']         = $typeVue;
            $media['miniature']    = $miniature;
            $media['valeur_badge'] = $badge;
        }

        return $resultats;
    }


}
