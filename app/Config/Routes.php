<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =========================
// REDIRECTION PAR DÉFAUT
// =========================
$routes->get('/', function () {
    return redirect()->to('/fr');
});


// =========================
// GROUPE FRANÇAIS
// =========================
$routes->group('fr', function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('qui-sommes-nous', 'Home::about');
    $routes->get('projets', 'Home::projects');
    
    // Vos actualités
    $routes->get('actualites', 'Home::news');
    // LIGNE À AJOUTER : Capture le numéro d'article (ex: /fr/actualites/15)
    $routes->get('actualites/(:num)', 'Home::voir/$1');

    $routes->get('media', 'Home::media');
    $routes->get('soutenir', 'Home::support');
    $routes->get('faq', 'Home::faq');
    $routes->get('contact', 'Home::contact');

});


// =========================
// GROUPE MALAGASY
// =========================
$routes->group('mg', function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('qui-sommes-nous', 'Home::about');
    $routes->get('projets', 'Home::projects');
    
    // Vos actualités en malgache
    $routes->get('actualites', 'Home::news');
    // LIGNE À AJOUTER : Capture le numéro d'article (ex: /mg/actualites/15)
    $routes->get('actualites/(:num)', 'Home::voir/$1');

    $routes->get('media', 'Home::media');
    $routes->get('soutenir', 'Home::support');
    $routes->get('faq', 'Home::faq');
    $routes->get('contact', 'Home::contact');

});
