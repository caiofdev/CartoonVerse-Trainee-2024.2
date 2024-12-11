<?php

namespace App\Controllers;
use App\Controllers\AdminController;
use App\Controllers\GeneralController;
use App\Core\Router;

    //ADMIN
    $router->get('admin/users', 'AdminController@index');
    $router->post('admin/users/create', 'AdminController@createUser');
    $router->post('admin/users/update', 'AdminController@updateUser');
    $router->post('admin/users/delete', 'AdminController@deleteUser');
    
    $router->get('admin/post-list', 'PostController@index');
    $router->get('admin/create-post','PostController@getCreate');
    $router->post('admin/create-post', 'PostController@create');
    $router->get('admin/delete-post','PostController@getDelete');
    $router->post('admin/delete-post', 'PostController@delete');
    $router->get('admin/editar-post','PostController@getEdit');
    $router->post('admin/editar-post', 'PostController@edit');

    $router->get('login', 'AdminController@login');
    $router->post('login', 'AdminController@fazerLogin');
    
    $router->get('admin/dashboard', 'AdminController@dashboard');
    $router->post('logout', 'AdminController@logout');
    
    //USER
    $router->get('post-list', 'PostController@index_user_post_list');
    $router->get('search-post', 'PostController@searchPost');

    $router->get('post/id={id}', 'PostController@user_view_single_post');

?>