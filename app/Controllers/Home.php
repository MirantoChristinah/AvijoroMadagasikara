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
    public function envoyer ()
    {
      // 1. On vérifie la méthode sécurisée POST
        if ($this->request->getMethod() === 'POST') {
            
            // 2. On récupère TOUTES les variables envoyées par la vue HTML
            $nomVisiteur       = $this->request->getPost('name');
            $emailVisiteur     = $this->request->getPost('email');
            $telephoneVisiteur = $this->request->getPost('phone');
            $sujetVisiteur     = $this->request->getPost('subject');
            $messageVisiteur   = $this->request->getPost('message');

                        // 3. On initialise le service e-mail
            $email = \Config\Services::email();

            // Configuration SMTP en direct pour forcer Google à accepter la connexion
            $config = [
                'protocol'     => 'smtp',
                'SMTPHost'     => '://gmail.com',
                'SMTPUser'     => 'andriamahefahanitriniala@gmail.com',
                'SMTPPass'     => 'rmdjwrhpongafhxd', // Votre clé Google à 16 lettres sans espaces
                'SMTPPort'     => 465,
                'SMTPCrypto'   => 'ssl',
                'mailType'     => 'text',
                'charset'      => 'utf-8',
                'wordWrap'     => true,
                'newline'      => "\r\n", // TRÈS IMPORTANT pour l'authentification Gmail
                'CRLF'         => "\r\n"
            ];

            // On applique cette configuration à notre outil d'envoi
            $email->initialize($config);

            // 4. On configure les paramètres d'envoi
            $email->setFrom('andriamahefahanitriniala@gmail.com', $nomVisiteur);
            $email->setReplyTo($emailVisiteur, $nomVisiteur);
            $email->setTo('andriamahefahanitriniala@gmail.com');
            $email->setSubject("Nouveau message du site - Sujet : " . $sujetVisiteur);

            // 5. On assemble proprement le corps du message
            $corpsMessage = "Nom : " . $nomVisiteur . "\n";
            $corpsMessage .= "Téléphone : " . ($telephoneVisiteur ? $telephoneVisiteur : 'Non renseigné') . "\n\n";
            $corpsMessage .= "Message :\n" . $messageVisiteur;

            $email->setMessage($corpsMessage);

                        // On tente l'envoi physique
            $resultat = $email->send();

            // S'il y a un échec, on force l'affichage de l'erreur SMTP à l'écran
            if (!$resultat) {
                echo "<h3>L'envoi a échoué. Voici le rapport technique :</h3>";
                echo $email->printDebugger(['headers', 'subject', 'body']);
                exit; // Arrête immédiatement le script pour empêcher la page blanche
            }

            // Si l'envoi réussit
            echo "<h3>L'envoi a fonctionné avec succès !</h3>";
            exit;


    }        
}
}