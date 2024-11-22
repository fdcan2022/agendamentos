<?php

use App\Controllers\Super\HomeController;
use App\Controllers\Super\UnitsController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('super', static function ($routes) {
    $routes->get('/', [HomeController::class, 'index'], ['as' => 'super.home']);

    $routes->group('units', static function ($routes) {
        $routes->get('/', [UnitsController::class, 'index'], ['as' => 'units']);
        $routes->get('new', [UnitsController::class, 'new'], ['as' => 'units.new']);
        $routes->get('edit/(:num)', [UnitsController::class, 'edit/$1'], ['as' => 'units.edit']);
        $routes->post('create', [UnitsController::class, 'create'], ['as' => 'units.create']);
        $routes->put('update/(:num)', [UnitsController::class, 'update/$1'], ['as' => 'units.update']);
        $routes->delete('delete/(:num)', [UnitsController::class, 'delete/$1'], ['as' => 'units.delete']);
        $routes->put('action/(:num)', [UnitsController::class, 'action/$1'], ['as' => 'units.action']); // ativar ou desativar um registro



    });


});