<?php

use App\Controllers\User\Profile\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/register', [UserController::class, 'show_register_form']);
