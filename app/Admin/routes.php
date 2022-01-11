<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UsersController::class);

    $router->get('/inputs', 'InputsController@index')->name('admin.inputs');
    $router->get('/outputs', 'OutputsController@index')->name('admin.outputs');
    $router->get('/parameters', 'ParametersController@index')->name('admin.outputs');
    $router->get('/materials', 'MaterialsController@index')->name('admin.outputs');
});
