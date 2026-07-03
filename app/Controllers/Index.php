<?php
namespace App\Controllers;
use App\Models\ProjectsModel;

class Index extends BaseController
{
    public function index ()
    {
        //$projectsModel = new ProjectsModel();
         $projectsModel = new \App\Models\ProjectsModel();
            helper('text');
        // Récupère la langue active (ex: 'fr', 'en', 'mg')
        $locale = $this->request->getLocale();
        
        // Récupère tous les projets traduits et formatés
        $allProjects = $projectsModel->getProjetsFormates($locale);
        
        // On ne garde que les 3 premiers pour la page d'accueil
        $data['projets'] = array_slice($allProjects, 0, 3);
        $data['lang'] = $locale;
        return $this->body("avijoro/index",$data);
    }
}



?>