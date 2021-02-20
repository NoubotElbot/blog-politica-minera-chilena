<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->set404Override();
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
//Usuarios - Login
$routes->get('login', 'Login::index');
$routes->get('usuario/new',             'Usuario::new');
$routes->post('usuario',                'Usuario::create');
$routes->get('usuario',                 'Usuario::index');
$routes->get('usuario/(:segment)/edit', 'Usuario::edit/$1');
$routes->put('usuario/(:segment)',      'Usuario::update/$1');
// Posts
$routes->get('post/new',             'Post::new');
$routes->post('post',                'Post::create');
$routes->get('post',                 'Post::index');
$routes->get('post/(:segment)',      'Post::show/$1');
$routes->get('post/(:segment)/edit', 'Post::edit/$1');
$routes->put('post/(:segment)',      'Post::update/$1');
$routes->delete('post/(:segment)',   'Post::delete/$1');
//categorias
$routes->get('categoria/new',             'Categoria::new');
$routes->post('categoria',                'Categoria::create');
$routes->get('categoria',                 'Categoria::index');
$routes->get('categoria/(:segment)',      'Categoria::show/$1');
$routes->get('categoria/(:segment)/edit', 'Categoria::edit/$1');
$routes->put('categoria/(:segment)',      'Categoria::update/$1');
$routes->delete('categoria/(:segment)',   'Categoria::delete/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
