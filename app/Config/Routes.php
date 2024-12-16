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


//Rotas Publicas - ver rotas de erro e configurar
$routes->get('erro-acesso', 'Auth\Error403::index', ['as' => 'error403']);
$routes->get('/erro', 'Home::erro', ['as' => 'erro']);
$routes->get('/', 'Home::index');


// Usar rotas do Shield, exceto para registro
service('auth')->routes($routes, ['except' => ['register']]);
// Adicionar rota personalizada para registro
$routes->get('register', '\App\Controllers\Auth\RegisterController::registerView');
$routes->post('register', '\App\Controllers\Auth\RegisterController::registerAction');


// Grupo de Rotas App
$routes->group('app', ['filter' => 'session'], function ($routes) {

    //Rrotas sem nivel de acesso
    $routes->group('', ['filter' => 'empresaAssociada'], function ($routes) {
        $routes->get('/', 'App\Appindex::index');
        $routes->get('dashboard', 'App\Dashboard::index', ['as' => 'dashboard']);
    });

    // Rotas com nível de acesso
    $routes->group('', ['filter' => 'empresaAssociada,group:admin,superadmin'], function ($routes) {
        // Rotas que requerem empresa associada E ser admin/superadmin
    });

    // Rora para configurar empresa
    $routes->group('', ['filter' => 'group:admin,superadmin'], function ($routes) {
        $routes->get('empresa', 'App\Empresa::index', ['as' => 'configura.empresa']);
    });
});


// Grupo de Rotas SuperAdmin
$routes->group('adm9202', ['filter' => 'session'], function ($routes) {

    // Rotas com nível de acesso Super Admin
    $routes->group('', ['filter' => 'group:superadmin'], function ($routes) {
        $routes->get('/', 'Admin\Adminindex::index', ['as' => 'home.admin']);
    });
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
