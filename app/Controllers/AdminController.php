<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('site/index', compact('users'));
        // o primeiro parametro de view() é o arquivo dentro de views/ que deve ser retornado.
        // ou seja, é o que vai aparecer na tela. O segundo é a variavel $users transformada em array
        // confira o arquivo routes.php
    }

    // Função para criar um novo usuário
    public function createUser()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'image' => uploadImage('image')
        ];

        App::get('database')->insert('users', $parameters);

        header('Location: /users');
    }

    public function updateUser(){
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'image' => uploadImage('image')
        ];

        $id = $_POST['id'];

        App::get('database')->update('users', $id, $parameters);
    
        header('Location: admin/users');
    }

    public function verifyUser(){
        $id = $_GET['id'];

        $user = App::get('database')->getUserById($id);

        return view('site/index', compact('user'));
    }

    public function deleteUser(){
        $id = $_POST['id'];

        App::get('database')->delete('users', $id);

        header('Location: /users');
    }
}