<?php

namespace App\Models;

use CodeIgniter\Model;

class TemoignageModel extends Model
{
    protected $table            = 'temoignages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['nom', 'created_at'];

    /**
     * Récupère tous les témoignages traduits
     *
     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @return array La liste des témoignages
     */
    public function getTemoignagesTraduits(string $codeLangue): array
    {
        $this->select('
            temoignages.id, 
            temoignages.nom, 
            temoignages.created_at,
            temoignages_traductions.role_personne, 
            temoignages_traductions.message
        ');

        $this->join('temoignages_traductions', 'temoignages_traductions.temoignage_id = temoignages.id');
        $this->join('langues', 'langues.id = temoignages_traductions.langue_id');

        $this->where('langues.code', $codeLangue);
        $this->orderBy('temoignages.created_at', 'DESC');

        return $this->findAll();
    }
}