<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjetModel extends Model
{
    protected $table            = 'projets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['categorie', 'image', 'document_drive_link', 'statut', 'date_debut', 'date_fin', 'created_at'];

    /**
     * Récupère tous les projets traduits et filtrés
     *
     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @param string|null $categorie La catégorie à filtrer (optionnel)
     * @return array La liste des projets
     */
    public function getProjetsTraduits(string $codeLangue, ?string $categorie = null): array
    {
        $this->select('
            projets.id, 
            projets.categorie, 
            projets.image, 
            projets.document_drive_link, 
            projets.statut,
            projets.date_debut,
            projets.date_fin,
            projets_traductions.titre, 
            projets_traductions.description
        ');

        $this->join('projets_traductions', 'projets_traductions.projet_id = projets.id');
        $this->join('langues', 'langues.id = projets_traductions.langue_id');

        $this->where('langues.code', $codeLangue);

        if ($categorie !== null && $categorie !== 'Tous') {
            $this->where('projets.categorie', $categorie);
        }

        $this->orderBy('projets.date_debut', 'DESC');

        return $this->findAll();
    }
}