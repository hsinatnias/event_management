<?php

use App\Controllers\User\Auth\AuthController;
use App\Controllers\User\Profile\ProfileController;
use App\Controllers\User\Profile\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', [AuthController::class, 'index'], ['filter' => 'noauth']);
$routes->post('/login', [AuthController::class, 'login']);
$routes->post('/logout', [AuthController::class, 'logout']);

$routes->get('/register', [UserController::class, 'show_register_form'], ['filter' => 'noauth']);
$routes->post('/register', [UserController::class, 'register']);


$routes->get('/profile', [ProfileController::class, 'index'], ['filter' => 'auth']);