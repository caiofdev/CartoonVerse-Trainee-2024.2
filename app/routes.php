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
    /*
    Sobre o $router: o primeiro parametro indica o que deve aparecer no URL para que a função (2° parametro)
    seja executada. Ou seja, se o URL for www.cartoonverse.com/admin/users, o index() de AdminController vai
    ser executado. Veja que essa função, index() retorna uma View() para um arquivo (user-list.view.php).
    Ou seja, o nome do arquivo NAO é o que aparece na URL. Para isso mesmo que serve as rotas: para "esconder"
    a arquitetura de pastas do projeto e determinar o que é acessivel e o que é executado quando algo
    é acessado.

    Nota: o arquivo que vai ser retornado pela View() deve estar dentro de views/ e deve terminar com
    .view.php (user-list.view.php). Você provavelmente sabe disso, mas é que quando peguei o código pra rever
    eu vi ele com .html, ai achei bom ressaltar

    -> 1° parametro do router é acessado (na url)
    -> 2° parametro do router é executado
    -> o 2° parametro retorna uma view() normalmente - pode ser um header("Location ... ") também, nada impede
    -> usuário recebe os dados, fica feliz e com um URL bonito e pequeno

    */
?>