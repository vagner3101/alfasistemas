<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->set404Override(static function () {
    return view('Admin/others/error-page/error-404');
});


//GRUPO APP
$routes->group('app', static function ($routes) {
    $routes->get('/',  'App\Appindex::index');
    $routes->get('login',  'App\Appindex2::index');
    $routes->get('dashboard',  'App\Appindex3::index');
});


//tenat
$routes->get('/erro', 'Home::erro', ['as' => 'erro']);
$routes->get('/', 'Home::index');












if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
