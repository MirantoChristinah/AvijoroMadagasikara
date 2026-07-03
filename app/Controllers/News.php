<?php
namespace App\Controllers;

use App\Models\ActualiteModel;

class News extends BaseController
{
    public function index ()
    {
        $actualiteModel = new ActualiteModel();
        $locale = $this->request->getLocale(); 

        $categorieSelectionnee = $this->request->getGet('categorie') ?? 'Tous';
        $data = [
            'categorie_selectionnee' => $categorieSelectionnee,
            'liste_articles'       => $actualiteModel->getActualitesTraduites($locale, $categorieSelectionnee)
        ];
        return $this->body("avijoro/news",$data);
    }

    public function see($id)
    {
        $actualiteModel = new ActualiteModel();
        $article = $actualiteModel->getActualiteSeule($id);
        $data = [
            'article' => $article
        ];
        return $this->body("avijoro/news_detail", $data);
    }
}



?>