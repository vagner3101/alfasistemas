<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

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


//$routes->get('app',  'App\Appindex::index', ['filter' => 'session']);




//$routes->get('login',  'App\Appindex2::index');
//Rotas do Shield
service('auth')->routes($routes);


// Grupo APP com filtros de sessão e grupo superadmin
$routes->group('app', ['filter' => 'session'], function ($routes) {
    // Grupo APP com filtro de grupo superadmin
    $routes->group('', ['filter' => 'group:admin,superadmin'], function ($routes) {
        $routes->get('/', 'App\Appindex::index');
        $routes->get('dashboard', 'App\Appindex3::index');
    });
});


/*
//GRUPO DE ROTAS COM FILTRO DE LOGIN
$routes->group('app', ['filter' => 'session'], function ($routes) {
    $routes->get('/',  'App\Appindex::index');
    $routes->get('login',  'App\Appindex2::index');
    $routes->get('dashboard',  'App\Appindex3::index');
});

//GRUPO DE ROTAS COM FILTRO  DE PERMIÇÃO
$routes->get('app/login', 'App\Appindex2::index');

// Grupo APP com filtro de sessão
$routes->group('app', ['filter' => 'session'], function ($routes) {
    // Grupo APP com filtro de grupo superadmin
    $routes->group('', ['filter' => 'group:superadmin'], function ($routes) {
        $routes->get('/', 'App\Appindex::index');
        
        // Grupo APP com filtro de permissão específica
        $routes->group('', ['filter' => 'permission:view_dashboard'], function ($routes) {
            $routes->get('dashboard', 'App\Appindex3::index');
        });
    });
});

*/



//tenat
$routes->get('/erro', 'Home::erro', ['as' => 'erro']);
$routes->get('/', 'Home::index');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
