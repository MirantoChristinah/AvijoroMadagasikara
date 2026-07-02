<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table            = 'projets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['categorie', 'image', 'document_drive_link', 'statut', 'date_debut', 'date_fin'];

    
    public function getProjetsFormates(string $codeLangue, ?string $categorieFiltre = null): array
    {
        $this->select('
            projets.id, 
            projets.categorie AS category, 
            projets.image, 
            projets.document_drive_link, 
            projets.statut AS status, 
            projets.date_debut, 
            projets.date_fin,
            projets_traductions.titre AS title, 
            projets_traductions.description
        ');

        $this->join('projets_traductions', 'projets_traductions.projet_id = projets.id');
        $this->join('langues', 'langues.id = projets_traductions.langue_id');
        $this->where('langues.code', $codeLangue);

        if ($categorieFiltre !== null && $categorieFiltre !== 'Tous') 
        {
            $this->where('projets.categorie', $categorieFiltre);
        }

        $this->orderBy('projets.date_debut', 'DESC'); 
        $resultats = $this->findAll();

        foreach ($resultats as &$project) 
        {
            
            if (!empty($project['image'])) 
            {
                $project['image'] = base_url('uploads/projets/' . $project['image']);
            } else 
            {
                $project['image'] = base_url('assets/images/placeholders/projet.jpg');
            }

            $project['progress'] = $this->calculerProgression($project['date_debut'], $project['date_fin']);
            $project['beneficiaries'] = 1500; 
            $project['location']      = 'Madagascar';
        }

        return $resultats;
    }

    private function calculerProgression(?string $debut, ?string $fin): int
    {
        if (!$debut || !$fin) return 50;
        $start = strtotime($debut);
        $end   = strtotime($fin);
        $now   = time();

        if ($now >= $end) return 100;
        if ($now <= $start) return 0;

        return min(100, max(0, round((($now - $start) / ($end - $start)) * 100)));
    }

    public function getProjetSeul(int $id): ?array
    {
        $codeLangue=service('request')->getLocale();

        return $this->select('
                    projets.id, 
                    projets.categorie AS category, 
                    projets.image, 
                    projets.document_drive_link, 
                    projets.statut AS status, 
                    projets.date_debut, 
                    projets.date_fin,
                    projets_traductions.titre AS title, 
                    projets_traductions.description
                ')
                ->join('projets_traductions', 'projets_traductions.projet_id = projets.id')
                ->join('langues', 'langues.id = projets_traductions.langue_id')
                ->where('langues.code', $codeLangue)
                ->where('projets.id', $id)
                ->first();
    }
}
