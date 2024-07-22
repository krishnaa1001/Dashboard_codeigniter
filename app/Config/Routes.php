<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::processRegister');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');
$routes->get('dashboard', 'UserController::dashboard', ['filter' => 'auth']);
$routes->get('profile', 'UserController::profile', ['filter' => 'auth']);
$routes->post('updateProfile', 'UserController::updateProfile', ['filter' => 'auth']);
$routes->get('search', 'SearchController::index', ['filter' => 'auth']);
$routes->post('search', 'SearchController::search', ['filter' => 'auth']);


