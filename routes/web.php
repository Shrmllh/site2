<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
//Version
$router->get('/', function () use ($router) {
    return $router->app->version();
});

//unsecure routes


// $router->group(['prefix' -> 'api'], function () use ($router) (
// $router->get('/users',['uses' -> 'UserController@getUsers']);
// ))


//Simple routes



/* Same to index controller
    $router->get('/sharmillah',['uses' => 'UserController@getAllUsers']); */

//<-- get all users
$router->get('/sharmillah',['uses' => 'UserController@getAllUsers']);
$router->get('/users', 'UserController@index');


$router->get('/guser/{id}', 'UserController@show'); // get user by id

$router->post('/addinguser', 'UserController@adding'); // create new user record

$router->put('/updatinguser/{id}', 'UserController@updating'); // update user record

$router->delete('/deletinguser/{id}', 'UserController@deleting'); // delete record