<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return viewAdmin('user-list', compact('users'));
    }

    // Função para criar um novo usuário
    public function createUser()
    {
            $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'image' => uploadImage($_FILES['image'], $_POST['email'])
        ];

        App::get('database')->insert('users', $parameters);

        redirect('admin/users');
    }

    public function verifyUser(){
        $id = $_GET['id'];
    
        $user = App::get('database')->selectOne('users', ['id' => $id]);

        if ($user) {
            return viewUserModals('view-user', compact('user'));
        } else {
            // Redirecionar ou mostrar uma mensagem de erro se o usuário não for encontrado
            return viewUserModals('view-user', ['error' => 'Usuário não encontrado']);
        }
    }

    public function updateUser(){
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $parameters['image'] = uploadImage($_FILES['image'], $_POST['email']);
        }

        App::get('database')->update('users', $_POST['id'], $parameters);

        redirect('admin/users');
    }

    public function deleteUser(){
        $id = $_POST['id'];

        App::get('database')->delete('users', $id);

        redirect('admin/users');
    }
}