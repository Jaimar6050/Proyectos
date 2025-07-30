<?php
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\ProductoController;

$router = new Router();

// Página principal y dashboard
$router->get('/', HomeController::class, 'index');
$router->get('/dashboard', HomeController::class, 'dashboard');

// CRUD de productos
$router->get('/producto/', ProductoController::class, 'index');
$router->get('/producto/create', ProductoController::class, 'create');
$router->post('/producto/save', ProductoController::class, 'save');
$router->post('/producto/delete', ProductoController::class, 'delete');
$router->post('/producto/edit', ProductoController::class, 'edit');

$router->dispatch();
