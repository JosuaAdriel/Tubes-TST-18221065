<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('/movieAPI/(:any)/(:any)', 'MovieAPI::index/$1/$2');
$routes->get('/movie', 'MovieController::index');
$routes->post('/movie', 'MovieController::create');
$routes->put('/movie/update/(:num)', 'MovieController::update/$1');
$routes->delete('/movie/(:num)', 'MovieController::delete/$1');
$routes->get('/studio', 'StudioController::index');
$routes->get('/studioAPI/(:any)/(:any)', 'StudioAPI::index/$1/$2');
$routes->post('/studio', 'StudioController::create');
$routes->put('/studio/update/(:num)', 'StudioController::update/$1');
$routes->delete('studio/(:num)', 'StudioController::delete/$1');
$routes->get('/schedule', 'ScheduleController::index');
$routes->post('/schedule/create', 'ScheduleController::create');
$routes->delete('/schedule/delete/(:num)', 'ScheduleController::delete/$1');
$routes->get('/scheduleAPI/(:any)/(:any)', 'ScheduleAPI::index/$1/$2');
$routes->get('/payment', 'PaymentController::index');
