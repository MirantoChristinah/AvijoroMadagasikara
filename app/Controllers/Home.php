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
        if (!in_array($locale, ['fr', 'mg', 'en'])) {
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
        return $this->renderPage('avijoro/about');
    }

    public function projects()
    {
        return $this->renderPage('avijoro/projects');
    }

    // page liste des actualites (Simulation sans BDD)
    public function news()
    {
        $locale = $this->request->getLocale();

        // Simulation de TOUS les articles Figma (Grands et Petits)
        $faux_articles = [
            [
                'id' => 1, 'featured' => 1,
                'titre' => "Inauguration de la 5ème école dans la région Vakinankaratra",
                'categorie' => "Événements", 'date_publication' => "2026-05-10",
                'contenu' => "Une nouvelle école primaire a été inaugurée avec succès, offrant un accès à l'éducation pour 180 enfants supplémentaires.",
                'image' => "https://unsplash.com"
            ],
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
        return $this->renderPage('avijoro/media');
    }

    public function support()
    {
        return $this->renderPage('avijoro/join');
    }

    public function don()
    {
        return $this->renderPage('avijoro/donate');
    }

    public function faq()
    {
        return $this->renderPage('avijoro/faq');
    }

    public function contact()
    {
        return $this->renderPage('avijoro/contact');
    }
    
    public function join()
    {
        return $this->renderPage('avijoro/join');
    }

    public function envoyer()
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

            // Configuration SMTP corrigée pour Gmail
            $config = [
                'protocol'     => 'smtp',
                'SMTPHost'     => 'smtp.gmail.com', // <-- CORRIGÉ ICI
                'SMTPUser'     => 'andriamahefahanitriniala@gmail.com',
                'SMTPPass'     => 'rmdjwrhpongafhxd', 
                'SMTPPort'     => 465,
                'SMTPCrypto'   => 'ssl',
                'mailType'     => 'text',
                'charset'      => 'utf-8',
                'wordWrap'     => true,
                'newline'      => "\r\n", 
                'CRLF'         => "\r\n"
            ];

            // On applique cette configuration
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
                exit; 
            }

            // Si l'envoi réussit
            echo "<h3>L'envoi a fonctionné avec succès !</h3>";
            exit;
        }
    } // <-- AJOUTÉ : Ferme proprement la fonction envoyer()


 


    public function postuler ()
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
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        // 4. Succès : Redirection vers /fr/soutenir ou /mg/soutenir
        return redirect()->to(base_url($locale . '/soutenir'))->with('success', 'Votre candidature a été envoyée avec succès !');
    }
    
    public function inscriptionNewsletter()
{
    if ($this->request->is('post')) {
        $emailVisiteur = $this->request->getPost('email');

        // Validation de la syntaxe de l'adresse email
        if (!filter_var($emailVisiteur, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('erreur', 'Adiresy mailaka tsy manan-kery.');
        }

        // Récupération des accès sécurisés du fichier .env
        $apiKey = env('brevo.apiKey');
        $listId = (int) env('brevo.listId');

        // Connexion à distance à l'API Brevo
        $config = \Brevo\Client\Configuration::getDefaultConfiguration();
        $config->setApiKey('api-key', $apiKey);

        $apiInstance = new \Brevo\Client\Api\ContactsApi(new \GuzzleHttp\Client(), $config);
        
        $createContact = new \Brevo\Client\Model\CreateContact([
            'email'         => $emailVisiteur,
            'listIds'       => [$listId],
            'updateEnabled' => true
        ]);

        try {
            $apiInstance->createContact($createContact);
            return redirect()->back()->with('succes', 'Misaotra tamin\'ny fisoratana anarana !');
        } catch (\Exception $e) {
            return redirect()->back()->with('erreur', 'Erreur : ' . $e->getMessage());
        }
    }
}


    
}