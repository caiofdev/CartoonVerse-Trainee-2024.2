<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('', 'ExampleController@index');
    $router->get('admin/post-list', 'PostController@index');
    $router->get('admin/create-post','PostController@getCreate'); // quando esse endpoint receber um GET, executa algo
    $router->post('admin/create-post', 'PostController@create'); // mas quando for POST, executa outra coisa
    $router->get('admin/delete-post','PostController@getDelete');
    $router->post('admin/delete-post', 'PostController@delete');

?>