<?php

namespace App\Controllers;

use App\Models\ProjectsModel;

class Projects extends BaseController
{
    public function index()
    {
        $projetModel=new ProjectsModel();
        $locale = $this->request->getLocale(); 
        $categorieSelectionnee = $this->request->getGet('categorie') ?? 'Tous';
        $data = [
            'categorie_selectionnee' => $categorieSelectionnee,
            'liste_projets'          => $projetModel->getProjetsFormates($locale, $categorieSelectionnee)
        ];

        return $this->body("avijoro/projects", $data);
    }
     public function see($id)
    {
        $projetModel = new ProjectsModel();

        $project = $projetModel->getProjetSeul($id);

        if (!$project) 
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Ce projet n'existe pas.");
        }

        if (!empty($project['image'])) 
        {
            $project['image_url'] = base_url('uploads/projets/' . $project['image']);
        } else 
        {
            $project['image_url'] = base_url('assets/images/placeholders/projet.jpg');
        }

        $data = [
            'project' => $project
        ];

         return $this->body("avijoro/projects_details", $data);
    }

}
