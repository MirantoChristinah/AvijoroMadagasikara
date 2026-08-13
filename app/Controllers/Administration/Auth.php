<?php

namespace App\Controllers\Administration; // Spécifie bien le sous-dossier ici

use App\Controllers\BaseController;

class Auth extends BaseController
{
    // Affiche le formulaire de connexion
    public function login()
    {
        // Charge la vue située dans app/Views/Administration/login.php
        // Le formulaire s'affiche toujours, même si une session existe déjà.
        return view('Administration/login');
    }

       public function check()
    {
        $session = session();
        $db = \Config\Database::connect();
        
        // Récupère les données envoyées par le formulaire HTML
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('mot_de_passe');
        
        // On cherche l'utilisateur dans la table 'users'
        $user = $db->table('users')->where('email', $email)->get()->getRowArray();

        if ($user) {
            if ($password == $user['mot_de_passe']) {
                
                // On crée la session
                $sessionData = [
                    'id'         => $user['id'],
                    'nom'        => $user['nom'],
                    'email'      => $user['email'],
                    'role'       => $user['role'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);

                // Connexion réussie : direction le tableau de bord officiel
                return redirect()->to('/admin/dashboard');
            }
        }

        // Si la connexion échoue, on retourne en arrière avec un message d'erreur
        return redirect()->back()->with('error', 'Identifiants invalides.');
    }


    //  Déconnexion de l'utilisateur
    public function logout()
    {
        // Détruit toutes les variables de session actives
        session()->destroy();
        return redirect()->to('/login');
    }
}
