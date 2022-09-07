<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {

    return $router->app->version();
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', 'UserController@getList');
    $router->get('/{user}', 'UserController@show');

    $router->post('/', 'UserController@store');
    $router->post('/connectCar/{user}', 'UserController@connectCar');
    $router->post('/disassociateCar/{user}', 'UserController@disassociateCar');
    $router->put('/{user}', 'UserController@update');
    $router->delete('/{user}', 'UserController@destroy');
});

$router->group(['prefix' => 'cars'], function () use ($router) {
    $router->get('/', 'CarController@getList');
    $router->get('/{car}', 'CarController@show');

    $router->post('/', 'CarController@store');
   
    $router->put('/{car}', 'CarController@update');
    $router->delete('/{car}', 'CarController@destroy');
});
