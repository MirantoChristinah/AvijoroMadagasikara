<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', function () {
    return redirect()->to('/fr');
});



$routes->group('fr', function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('qui-sommes-nous', 'Home::about');
    $routes->get('projets', 'Home::projects');
    
    $routes->get('actualites', 'Home::news');
    $routes->get('actualites/(:num)', 'Home::voir/$1');

    $routes->get('media', 'Home::media');
    $routes->post('soutenir/postuler', 'Home::postuler');

    $routes->get('soutenir', 'Home::support');
    $routes->get('faq', 'Home::faq');
    $routes->get('contact', 'Home::contact');
    $routes->post('contact', 'Home::envoyer'); 
    //$routes->get('actualites/(:num)', 'Actualite::see/$1');


});



$routes->group('mg', function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('qui-sommes-nous', 'Home::about');
    $routes->get('projets', 'Home::projects');
    
    $routes->get('actualites', 'Home::news');
    $routes->get('actualites/(:num)', 'Home::voir/$1');

    $routes->get('media', 'Home::media');

    $routes->get('soutenir', 'Home::support');
    $routes->post('soutenir/postuler', 'Home::postuler');

    $routes->get('faq', 'Home::faq');
    $routes->get('contact', 'Home::contact');

});

$routes->group('en', function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('qui-sommes-nous', 'Home::about');
    $routes->get('projets', 'Home::projects');
    
    $routes->get('actualites', 'Home::news');
    $routes->get('actualites/(:num)', 'Home::voir/$1');

    $routes->get('media', 'Home::media');

    $routes->get('soutenir', 'Home::support');
    $routes->post('soutenir/postuler', 'Home::postuler');
    
    $routes->get('faq', 'Home::faq');
    $routes->get('contact', 'Home::contact');

});

