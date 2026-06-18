<?php

namespace App\Controllers;

class Home extends BaseController
{
    // Chargement automatique du helper URL
    protected $helpers = ['url'];

    /**
     * Méthode privée pour centraliser le rendu des pages 
     * et éviter de répéter le même code partout.
     */
    private function renderPage(string $viewName)
    {
        // CodeIgniter 4 détecte automatiquement la langue via le segment d'URL (fr ou mg)
        $locale = $this->request->getLocale();

        // Sécurité au cas où la locale retournée est invalide
        if (!in_array($locale, ['fr', 'mg'])) {
            $locale = 'fr';
        }

        // Prépare les données pour les injecter dans le header, la vue principale et le footer
        $data = [
            'lang' => $locale
        ];

        return view('includes/header', $data)
             . view($viewName, $data)
             . view('includes/footer', $data);
    }

   
    public function index()
    {
        return $this->renderPage('avijoro/index'); // Charge index.php
    }

    public function about()
    {
        return $this->renderPage('avijoro/about'); // Créez une vue 'about.php' si ce n'est pas fait
    }

    public function projects()
    {
        return $this->renderPage('avijoro/projects'); // Créez une vue 'projects.php'
    }

        // page liste des actualites (Simulation sans BDD)
       public function news()
    {
        $locale = $this->request->getLocale();

        // Simulation de TOUS les articles Figma (Grands et Petits)
        $faux_articles = [
            // ARTICLES À LA UNE (featured = 1)
            [
                'id' => 1, 'featured' => 1,
                'titre' => "Inauguration de la 5ème école dans la région Vakinankaratra",
                'categorie' => "Événements", 'date_publication' => "2026-05-10",
                'contenu' => "Une nouvelle école primaire a été inaugurée avec succès, offrant un accès à l'éducation pour 180 enfants supplémentaires.",
                'image' => "https://unsplash.com"
            ],
            // ARTICLES RÉGULIERS (featured = 0 -> s'afficheront en petites cases sur 3 colonnes)
            [
                'id' => 3, 'featured' => 0,
                'titre' => "Formation professionnelle : 200 jeunes diplômés",
                'categorie' => "Réussites", 'date_publication' => "2026-05-01",
                'contenu' => "La première promotion de notre programme de formation professionnelle a reçu ses diplômes avec un taux de placement de 85%.",
                'image' => "https://unsplash.com"
            ],
            [
                'id' => 4, 'featured' => 0,
                'titre' => "Nouveau partenariat avec l'UNICEF",
                'categorie' => "Événements", 'date_publication' => "2026-04-25",
                'contenu' => "AVIJORO Madagascar signe un accord de partenariat stratégique avec l'UNICEF pour renforcer nos programmes d'éducation.",
                'image' => "https://unsplash.com"
            ],
            [
                'id' => 5, 'featured' => 0,
                'titre' => "Accès à l'eau : 5 nouveaux puits opérationnels",
                'categorie' => "Projets", 'date_publication' => "2026-04-20",
                'contenu' => "Cinq puits ont été mis en service cette semaine, apportant de l'eau potable à plus de 1000 personnes dans la région Atsimo-Andrefana.",
                'image' => "https://unsplash.com"
            ]
        ];

        $categorie = $this->request->getGet('categorie');

        $data = [
            'lang'                   => $locale,
            'liste_articles'         => $faux_articles,
            'categorie_selectionnee' => $categorie
        ];

        return view('includes/header', $data)
             . view('avijoro/news', $data)
             . view('includes/footer', $data);
    }


    public function media()
    {
        return $this->renderPage('avijoro/media'); // Créez une vue 'media.php';
    }

    public function support()
    {
        return $this->renderPage('avijoro/join'); // Créez une vue 'support.php'
    }

    public function faq()
    {
        return $this->renderPage('avijoro/faq'); // Créez une vue 'faq.php'
    }

     public function contact()
    {
        return $this->renderPage('avijoro/contact'); // Créez une vue 'faq.php'
    }
     public function join()
    {
        return $this->renderPage('avijoro/join'); // Créez une vue 'faq.php'
    }

    public function postuler()
    {
        // 1. Récupération automatique de la locale courante par CodeIgniter
        $locale = $this->request->getLocale();
        if (!in_array($locale, ['fr', 'mg', 'en'])) {
            $locale = 'fr';
        }

        // 2. Extraction et préparation des données du formulaire
        $firstName = $this->request->getPost('firstName');
        $lastName  = $this->request->getPost('lastName');

        $dataInsert = [
            'nom'           => trim($firstName . ' ' . $lastName),
            'email'         => $this->request->getPost('email'),
            'telephone'     => $this->request->getPost('phone'),
            'disponibilite' => $this->request->getPost('availability'),
            'motivation'    => $this->request->getPost('motivation'),
            'statut'        => 'en attente'
        ];

        // 3. Insertion via le modèle BenevoleModel
        $model = new \App\Models\BenevoleModel();

        if ($model->insert($dataInsert) === false) {
            // S'il y a des erreurs de validation, on revient en arrière
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        // 4. Succès : Redirection vers /fr/soutenir ou /mg/soutenir
        return redirect()->to(base_url($locale . '/soutenir'))->with('success', 'Votre candidature a été envoyée avec succès !');
    }
    
}
