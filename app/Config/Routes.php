<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'User::login');
$routes->get('/register', 'User::register');

$routes->group('admin', function ($routes){
    $routes->group('user', function ($routes)
    {
        $routes->get('add', 'User::register');
        $routes->get('delete/(:num)', 'User::delete/$1');
        $routes->get('update/(:num)', 'User::update');
        $routes->get('find/(:num)', 'User::find/$1');
        $routes->get('findAll', 'User::findAll');
    });
});

// Category
$routes->get('category', 'CategoryController::list');
$routes->get('category-add', 'CategoryController::add');

$routes->get('country', 'CountryController::list');
$routes->get('country-add', 'CountryController::add');

$routes->get('gender', 'GenderController::list');
$routes->get('gender-add', 'GenderController::add');

// Movie
$routes->get('movie', 'MovieController::list');

// Actor
$routes->get('actor', 'ActorController::list');

// Picture
$routes->get('picture', 'PictureController::list');

// Language
$routes->get('language', 'LanguageController::list');
$routes->get('language-add', 'LanguageController::add');

$routes->get('warning', 'LanguageController::list');
$routes->get('warning-add', 'WarningController::add');

// Director Data
$routes->get('director', 'DirectorController::list');
$routes->get('director-add', 'DirectorController::add');
$routes->post('director-store', 'DirectorController::store');
$routes->get('director/edit(:num)', 'DirectorController::edit/$1');
$routes->put('director/update(:num)', 'DirectorController::update/$1');
$routes->get('director/delete(:num)', 'DirectorController::delete/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
