<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/error', 'Home::error');
$routes->get('/resist', 'Home::resist');
$routes->get('/home/test-email', 'Home::testEmail');
$routes->get('/home', 'Home::pinaka');