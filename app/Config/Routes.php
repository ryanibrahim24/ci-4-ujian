<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'EmployeeController::index');
$routes->get('/coba', 'Home::coba');

$routes->get('/employees/create', 'EmployeeController::create');
$routes->get('/employees', 'EmployeeController::index');
$routes->post('/employees', 'EmployeeController::save');
$routes->get('/employees/edit/(:segment)', 'EmployeeController::edit/$1');
$routes->post('/employees/update/(:segment)', 'EmployeeController::update/$1');
$routes->delete('/employees/(:num)', 'EmployeeController::delete/$1');
