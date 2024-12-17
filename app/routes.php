<?php

namespace App\Controllers;
use App\Controllers\AdminController;
use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Core\Router;

    //ADMIN
    $router->get('admin/dashboard', 'AdminController@index');
    $router->get('admin/posts', 'AdminController@adm_post_list');
    $router->get('admin/users', 'AdminController@adm_user_list');
    
    $router->post('admin/users/create', 'AdminController@createUser');
    $router->post('admin/users/update', 'AdminController@updateUser');
    $router->post('admin/users/delete', 'AdminController@deleteUser');
    
    $router->get('admin/create-post','PostController@getCreate');
    $router->post('admin/create-post', 'PostController@create');
    $router->get('admin/delete-post','PostController@getDelete');
    $router->post('admin/delete-post', 'PostController@delete');
    $router->get('admin/editar-post','PostController@getEdit');
    $router->post('admin/editar-post', 'PostController@edit');

    $router->post('logout', 'AdminController@logout');
    
    //USER
    $router->get('', 'UserController@index'); //landing page
    $router->get('post-list', 'PostController@index_user_post_list');

    $router->get('search-post', 'PostController@searchPost');
    
    $router->get('post/id={id}', 'PostController@user_view_single_post');
    
    $router->get('login', 'UserController@login');
    $router->post('login', 'UserController@fazerLogin');