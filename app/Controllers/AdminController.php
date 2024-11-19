<?php

namespace App\Controllers;
require 'helpers.php';

use App\Core\App;
use Exception;

class AdminController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('site/index');
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
    
        header('Location: /users');
    }

    public function deleteUser(){
        $id = $_POST['id'];

        App::get('database')->delete('users', $id);

        header('Location: /users');
    }
}