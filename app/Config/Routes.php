<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function()
{
    echo view('errors/html/404');
});
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Inicio
$routes->get('/', 'Home::index');
$routes->get('/somos', 'Home::somos');
//Usuarios - Login
$routes->match(['get', 'post'], 'login', 	'Login::index', ['filter' => 'noauth']);
$routes->get('logout',             		'Login::logout');
//$routes->get('usuario/new',             'Usuario::new', ['filter' => 'auth']);
//$routes->post('usuario',                'Usuario::create', ['filter' => 'auth']);
$routes->get('usuario',                 'Usuario::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'usuario/(:num)/edit', 'Usuario::edit/$1', ['filter' => 'auth']);
//Dashboard
$routes->get('dashboard',            	'Dashboard::index', ['filter' => 'auth']);
// Posts
$routes->match(['get', 'post'], 'post/new', 		'Post::create', ['filter' => 'auth']);
$routes->get('post',                 				'Post::index', ['filter' => 'auth']);
$routes->get('post/(:segment)',      				'Post::show/$1');
$routes->match(['get', 'post'], 'post/(:num)/edit',	'Post::edit/$1', ['filter' => 'auth']);
$routes->delete('post/(:num)',       				'Post::delete/$1', ['filter' => 'auth']);
//categorias
$routes->get('categoria/new',             'Categoria::new', ['filter' => 'auth']);
$routes->post('categoria',                'Categoria::create', ['filter' => 'auth']);
$routes->get('categoria',                 'Categoria::index', ['filter' => 'auth']);
$routes->get('categoria/(:segment)',      'Categoria::show/$1');
$routes->get('categoria/(:num)/edit', 	  'Categoria::edit/$1', ['filter' => 'auth']);
$routes->put('categoria/(:num)',          'Categoria::update/$1', ['filter' => 'auth']);
$routes->delete('categoria/(:num)',       'Categoria::delete/$1', ['filter' => 'auth']);



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
