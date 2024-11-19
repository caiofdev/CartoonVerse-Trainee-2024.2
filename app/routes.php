<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\AdminController;
use App\Core\Router;

    $router->get('users', 'AdminController@index');
    $router->post('users/create', 'AdminController@createUser');
    $router->post('users/update', 'AdminController@updateUser');
    $router->post('users/delete', 'AdminController@deleteUser');
?>