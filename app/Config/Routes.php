<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\User\Auth\AuthController;
use App\Controllers\Utility\UtilityController;
use App\Controllers\User\Event\EventController;
use App\Controllers\User\Profile\UserController;
use App\Controllers\Admin\Auth\AdminAuthController;
use App\Controllers\User\Profile\ProfileController;

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
$routes->get('/create-profile', [ProfileController::class,'edit_profile_view'], ['filter' => 'auth']);

$routes->post('/create-profile', [ProfileController::class,'create']);
$routes->get('/edit-profile', [ProfileController::class,'update_profile_view'], ['filter' => 'auth']);
$routes->patch('/edit-profile', [ProfileController::class,'update']);


//events
$routes->get('/events', [EventController::class, 'index'], ['filter' => 'auth']);
$routes->get('/events/(:num)', [EventController::class, 'show/$1'], ['filter' => 'auth']);
$routes->get('/event/create', [EventController::class,'new'],  ['as'=>'create-event', 'filter' => 'auth']);
$routes->post('/event/create', [EventController::class,'create']);
$routes->get('/event/edit/(:num)', [EventController::class, 'edit/$1'], ['filter' => 'auth']);

$routes->put('/event/update/(:num)', [EventController::class, 'update/$1']);
$routes->get('/event/delete/(:num)', [EventController::class, 'delete/$1']);



$routes->get('images/showImage/(:any)', [UtilityController::class, 'showuserprofileimage/$1'], ['filter' => 'auth']);



//Admin section

$routes->get('/admin', [AdminAuthController::class, 'index']);

