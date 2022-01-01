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
$routes->get('/profile/(:num)', 'User::edit/$1');

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
$routes->get('category/edit(:num)', 'CategoryController::edit/$1');
$routes->put('category/update(:num)', 'CategoryController::update/$1');
$routes->get('category/delete(:num)', 'CategoryController::delete/$1');

// Country
$routes->get('country', 'CountryController::list');
$routes->get('country-add', 'CountryController::add');
$routes->get('country/edit(:num)', 'CountryController::edit/$1');
$routes->put('country/update(:num)', 'CountryController::update/$1');
$routes->get('country/delete(:num)', 'CountryController::delete/$1');

// Gender
$routes->get('gender', 'GenderController::list');
$routes->get('gender-add', 'GenderController::add');
$routes->get('gender/edit(:num)', 'GenderController::edit/$1');
$routes->put('gender/update(:num)', 'GenderController::update/$1');
$routes->get('gender/delete(:num)', 'GenderController::delete/$1');

// Movie
$routes->get('movie', 'MovieController::list');
$routes->get('movies', 'MovieController::listByCard');
$routes->post('movie-search', 'MovieController::searchByName');
$routes->get('upcoming-movies', 'MovieController::listUpcomingByCard');
$routes->get('movie/(:num)', 'MovieController::movieDetails/$1');
$routes->get('movie/(:num)/rating/(:num)', 'MovieController::movieRate/$1/$2');
$routes->get('movies/filter(:num)', 'MovieController::listByCategory/$1');
$routes->get('movie-add', 'MovieController::add');
$routes->get('movie/edit(:num)', 'MovieController::edit/$1');
$routes->put('movie/update(:num)', 'MovieController::update/$1');
$routes->get('movie/delete(:num)', 'MovieController::delete/$1');
$routes->get('search/movie(:num)', 'MovieController::searchByName/$1');

//User 
$routes->get('user', 'User::list');

//Role
$routes->get('role', 'MovieActorController::list');
$routes->get('role-add', 'MovieActorController::add');
$routes->get('role/edit(:num)', 'MovieActorController::edit/$1');
$routes->put('role/update(:num)', 'MovieActorController::update/$1');
$routes->get('role/delete(:num)', 'MovieActorController::delete/$1');
$routes->get('role/movie(:num)', 'MovieActorController::searchByName/$1');

// Movie Category
$routes->get('categoryList', 'MovieCategoryController::list');
$routes->get('movie-category-add', 'MovieCategoryController::add');
$routes->get('categories/edit(:num)', 'MovieCategoryController::edit/$1');
$routes->put('categories/update(:num)', 'MovieCategoryController::update/$1');
$routes->get('categories/delete(:num)', 'MovieCategoryController::delete/$1');
$routes->get('categories/movie(:num)', 'MovieCategoryController::searchByName/$1');

// Movie Directors
$routes->get('movie-directors', 'MovieDirectorController::list');
$routes->get('movie-directors-add', 'MovieDirectorController::add');
$routes->get('movie-directors/edit(:num)', 'MovieDirectorController::edit/$1');
$routes->put('movie-directors/update(:num)', 'MovieDirectorController::update/$1');
$routes->get('movie-directors/delete(:num)', 'MovieDirectorController::delete/$1');
$routes->get('movie-directors/movie(:num)', 'MovieDirectorController::searchByName/$1');

//MovieWarning
$routes->get('warningList', 'MovieWarningController::list');
$routes->get('warning', 'MovieWarningController::listByCard');
$routes->get('warning/filter(:num)', 'MovieWarningController::listByWarning/$1');
$routes->get('movie-warning-add', 'MovieWarningController::add');
$routes->get('warning/edit(:num)', 'MovieWarningController::edit/$1');
$routes->put('warning/update(:num)', 'MovieWarningController::update/$1');
$routes->get('warning/delete(:num)', 'MovieWarningController::delete/$1');
$routes->get('warning/movie(:num)', 'MovieWarningController::searchByName/$1');

// Actor
$routes->get('actor', 'ActorController::list');
$routes->get('actors', 'ActorController::listByCard');
$routes->get('actor-add', 'ActorController::add');
$routes->get('actor/edit(:num)', 'ActorController::edit/$1');
$routes->put('actor/update(:num)', 'ActorController::update/$1');
$routes->get('actor/delete(:num)', 'ActorController::delete/$1');


// Picture
$routes->get('picture', 'PictureController::list');
$routes->get('picture-add', 'PictureController::add');
$routes->get('picture/edit(:num)', 'PictureController::edit/$1');
$routes->put('picture/update(:num)', 'PictureController::update/$1');
$routes->get('picture/delete(:num)', 'PictureController::delete/$1');

// Language
$routes->get('language', 'LanguageController::list');
$routes->get('language-add', 'LanguageController::add');
$routes->get('language/edit(:num)', 'LanguageController::edit/$1');
$routes->put('language/update(:num)', 'LanguageController::update/$1');
$routes->get('language/delete(:num)', 'LanguageController::delete/$1');

//Warning
$routes->get('warning', 'WarningController::list');
$routes->get('warning-add', 'WarningController::add');
$routes->get('warning/edit(:num)', 'WarningController::edit/$1');
$routes->put('warning/update(:num)', 'WarningController::update/$1');
$routes->get('warning/delete(:num)', 'WarningController::delete/$1');

// Director
$routes->get('director', 'DirectorController::list');
$routes->get('director-add', 'DirectorController::add');
$routes->get('director/edit(:num)', 'DirectorController::edit/$1');
$routes->put('director/update(:num)', 'DirectorController::update/$1');
$routes->get('director/delete(:num)', 'DirectorController::delete/$1');

//News
$routes->get('news', 'NewsController::list');
$routes->get('news-list', 'NewsController::listByCard');
$routes->get('news-details/(:num)', 'NewsController::showWithDetail/$1');
$routes->get('news-add', 'NewsController::add');
$routes->get('news/edit(:num)', 'NewsController::edit/$1');
$routes->put('news/update(:num)', 'NewsController::update/$1');
$routes->get('news/delete(:num)', 'NewsController::delete/$1');



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
