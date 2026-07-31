<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', function () {
    return redirect()->to('/fr');
});

// ====================================================================
// 🔒 ROUTES D'AUTHENTIFICATION & DU BACK-OFFICE (ADMINISTRATION)
// ====================================================================

$routes->get('login', 'Administration\Auth::login');
$routes->post('login/check', 'Administration\Auth::check');
$routes->get('logout', 'Administration\Auth::logout');

// Groupe pour toutes tes pages d'administration. 
// Le filtre 'adminAuth' bloque l'accès si on n'est pas connecté.
$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    
    // Page d'accueil de ton administration
    $routes->get('dashboard', 'Administration\Dashboard::index'); // 👈 CORRIGÉ ICI

    // --- Gestion des Projets ---
    $routes->get('projets', 'Administration\Projets::index'); // 👈 CORRIGÉ ICI
    $routes->get('projets/creer', 'Administration\Projets::creer');
    $routes->post('projets/enregistrer', 'Administration\Projets::enregistrer');
    $routes->get('projets/modifier/(:num)', 'Administration\Projets::modifier/$1');
    $routes->post('projets/mettre-a-jour/(:num)', 'Administration\Projets::mettreAJour/$1');
    $routes->get('projets/supprimer/(:num)', 'Administration\Projets::supprimer/$1');

    // --- Gestion des Actualités ---
    $routes->get('actualites', 'Administration\Actualites::index'); // 👈 CORRIGÉ ICI
    $routes->get('actualites/creer', 'Administration\Actualites::creer');
    $routes->post('actualites/enregistrer', 'Administration\Actualites::enregistrer');
    $routes->get('actualites/modifier/(:num)', 'Administration\Actualites::modifier/$1');
    $routes->post('actualites/mettre-a-jour/(:num)', 'Administration\Actualites::mettreAJour/$1');
    $routes->get('actualites/supprimer/(:num)', 'Administration\Actualites::supprimer/$1');

    $routes->get('projets/modifier/(:num)', 'Administration\Projets::modifier/$1');
    $routes->post('projets/mettre-a-jour/(:num)', 'Administration\Projets::mettreAJour/$1'); // 👈 Doit pointer exactement ici
        
    
    $routes->get('medias', 'Administration\Medias::index');
    $routes->get('medias/creer', 'Administration\Medias::creer');
    $routes->get('medias/modifier/(:num)', 'Administration\Medias::modifier/$1');
    $routes->post('medias/mettre-a-jour/(:num)', 'Administration\Medias::mettreAJour/$1');
    $routes->get('medias/supprimer/(:num)', 'Administration\Medias::supprimer/$1');
    $routes->post('medias/enregistrer', 'Administration\Medias::enregistrer');

});


// ====================================================================
// 🌍 ROUTES PUBLIQUES MULTILINGUES (Ton groupe magique actuel)
// ====================================================================
$routes->group('{locale}', function ($routes) {

    $routes->get('/', 'Index::index');
    $routes->get('qui-sommes-nous', 'Home::about');
    $routes->get('projects', 'Projects::index');
    $routes->get('projects/(:num)', 'Projects::see/$1');
    
    $routes->get('actualites', 'News::index');
    $routes->get('actualites/(:num)', 'News::see/$1');
     
    $routes->get('media', 'Media::index');
    $routes->get('media/voir/(:num)', 'Media::voir/$1');
    $routes->get('soutenir', 'Join::index');
    $routes->get('faq', 'Home::faq');
    
    $routes->get('contact', 'Contact::index');
    $routes->post('contact/envoyer', 'Contact::envoyer'); 
    $routes->post('newsletter/inscription', 'Home::inscriptionNewsletter');

});
