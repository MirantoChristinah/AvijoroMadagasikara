<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', function () {
    return redirect()->to('/fr');
});



// Un seul groupe magique pour toutes les langues
$routes->group('{locale}', function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('qui-sommes-nous', 'Home::about');
    $routes->get('projects', 'Projects::index');
    $routes->get('projects/(:num)', 'Projects::see/$1');
    
    $routes->get('actualites', 'News::index');
    $routes->get('actualites/(:num)', 'News::see/$1');
     
    $routes->get('media', 'Home::media');
    $routes->get('soutenir', 'Home::support');
    $routes->get('faq', 'Home::faq');
    
    // Le formulaire de contact fonctionne maintenant dans TOUTES les langues
    $routes->get('contact', 'Home::contact');
    $routes->post('contact', 'Home::envoyer'); 
    $routes->post('newsletter/inscription', 'Home::inscriptionNewsletter');

});
?>