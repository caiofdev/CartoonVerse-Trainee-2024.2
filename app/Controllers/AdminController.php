<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{
    public function index()
    {

        $page = 1;

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $page = intval($_GET['page']);

            if($page <= 0){
                return redirect('admin/index');
            }
        }

        $itemsPage = 5;
        $inicio = $itemsPage * $page - $itemsPage;

        $rows_count = App::get('database')->countAll('users');

        if($inicio > $rows_count){
            return redirect('admin/index');
        }

        $users = App::get('database')->selectAll('users', $inicio, $itemsPage);

        $totalPages = ceil($rows_count / $itemsPage);

        return viewAdmin('user-list', compact('users', 'page', 'totalPages'));
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