<?php

namespace App\Filters; // 👈 Attention à la majuscule sur "Filters"

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuth implements FilterInterface // 👈 Le nom ici doit être EXACTEMENT identique au nom du fichier
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si l'utilisateur n'a pas la session, on le renvoie au login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Veuillez vous connecter.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Rien à faire ici
    }
}
