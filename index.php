<?php

require __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/**
 * Controllers
 */

$router->namespace('Src\App\Controllers');

$router->group(null);
$router->get('/', 'VehicleController:index');

$router->get('/create', 'VehicleController:create');
$router->post('/store', 'VehicleController:store');

$router->get('/edit/{id}', 'VehicleController:edit');
$router->put('/update/{id}', 'VehicleController:update');

$router->get('/show/{id}', 'VehicleController:show');

$router->get('/delete/{id}', 'VehicleController:destroy');

// Marcas
$router->group('brands');
$router->get('/', 'BrandController:index');

$router->get('/create', 'BrandController:create');
$router->post('/store', 'BrandController:store');

$router->get('/edit/{id}', 'BrandController:edit');
$router->put('/update/{id}', 'BrandController:update');

$router->get('/delete/{id}', 'BrandController:destroy');

// Modelos
$router->group('models');
$router->get('/', 'ModelController:index');

$router->get('/create', 'ModelController:create');
$router->post('/store', 'ModelController:store');

$router->get('/edit/{id}', 'ModelController:edit');
$router->put('/update/{id}', 'ModelController:update');

$router->get('/delete/{id}', 'ModelController:destroy');

// Categorias
$router->group('categories');
$router->get('/', 'CategoryController:index');

$router->get('/create', 'CategoryController:create');
$router->post('/store', 'CategoryController:store');

$router->get('/edit/{id}', 'CategoryController:edit');
$router->put('/update/{id}', 'CategoryController:update');

$router->get('/delete/{id}', 'CategoryController:destroy');

/**
 * ERROS
 */
$router->group('ooops');
$router->get('/{errcode}', 'WebController:error');

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}
