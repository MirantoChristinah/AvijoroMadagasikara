<?php
namespace App\Controllers;

use App\Models\ActualiteModel;

class News extends BaseController
{
    public function index ()
    {
        $actualiteModel = new ActualiteModel();
        $categorieSelectionnee = $this->request->getGet('categorie') ?? 'Tous';
        $data = [
            'categorie_selectionnee' => $categorieSelectionnee,
            'liste_actualites'       => $actualiteModel->getActualitesTraduites($locale, $categorieSelectionnee)
        ];
        body("avijoro/news",$data);
    }

    public function see($id)
    {
        $actualiteModel = new ActualiteModel();
        $article = $actualiteModel->getActualiteSeule($id);
        $data = [
            'article' => $article
        ];
        body("avijoro/news_detail", $data);
    }
}



?>