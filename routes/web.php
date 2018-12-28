<?php

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

$router->get('boards', 'BoardController@index');
$router->get('boards/{id}', 'BoardController@show');
$router->post('boards', 'BoardController@store');
$router->put('boards/{id}', 'BoardController@update');
$router->get('login', 'UsersController@authenticate');


// $app->group(['prefix' => 'api/'], function ($app) {
//     $app->get('login/', 'UsersController@authenticate');
//     $app->post('todo/', 'TodoController@store');
//     $app->get('todo/', 'TodoController@index');
//     $app->get('todo/{id}/', 'TodoController@show');
//     $app->put('todo/{id}/', 'TodoController@update');
//     $app->delete('todo/{id}/', 'TodoController@destroy');
// });