<?php
namespace App\Controllers;

use App\Models\BenevoleModel;

class Join extends BaseController
{
    public function index ()
    {
        $locale = $this->request->getLocale();
        if (!in_array($locale, ['fr', 'mg', 'en'])) {
            $locale = 'fr';
        }

        $data = [
            'lang' => $locale
        ];
        return $this->body("avijoro/join",$data);
    }

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
    
}



?>