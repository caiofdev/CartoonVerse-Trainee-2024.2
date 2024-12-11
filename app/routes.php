<?php

namespace App\Controllers;
use App\Controllers\AdminController;
use App\Controllers\GeneralController;
use App\Core\Router;

    $router->get('admin/users', 'AdminController@index');
    $router->post('admin/users/create', 'AdminController@createUser');
    $router->post('admin/users/update', 'AdminController@updateUser');
    $router->post('admin/users/delete', 'AdminController@deleteUser');
    // Exibe o login
    $router->get('login', 'AdminController@login');
    // Rota de envio - Login
    $router->post('login', 'AdminController@fazerLogin');
    // Exibe a dashboard
    $router->get('admin/dashboard', 'AdminController@dashboard');
    // Rota de envio - Logout
    $router->post('logout', 'AdminController@logout');
    
    $router->get('admin/post-list', 'PostController@index');
    
    $router->get('admin/create-post','PostController@getCreate'); // quando esse endpoint receber um GET, executa algo
    $router->post('admin/create-post', 'PostController@create'); // mas quando for POST, executa outra coisa
    
    $router->get('admin/delete-post','PostController@getDelete');
    $router->post('admin/delete-post', 'PostController@delete');

    $router->get('admin/editar-post','PostController@getEdit');
    $router->post('admin/editar-post', 'PostController@edit');

    $router->get('post-list', 'PostController@index_user_post_list');
    $router->get('search-post', 'PostController@searchPost');

    $router->get('post/{id}', 'PostController@user_view_single_post');
?>