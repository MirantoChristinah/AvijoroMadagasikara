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
    
    // Le formulaire de contact fonctionne maintenant dans TOUTES les langues
    $routes->get('contact', 'Contact::index');
    $routes->post('contact/envoyer', 'Contact::envoyer'); 
    $routes->post('newsletter/inscription', 'Home::inscriptionNewsletter');

});
?>