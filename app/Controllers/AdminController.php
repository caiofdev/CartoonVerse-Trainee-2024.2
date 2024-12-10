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
                return redirect('admin/users');
            }
        }

        $itemsPage = 5;
        $inicio = $itemsPage * $page - $itemsPage;

        $rows_count = App::get('database')->countAll('users');

        if($inicio > $rows_count){
            return redirect('admin/users');
        }

        $users = App::get('database')->selectAll('users', $inicio, $itemsPage);

        $totalPages = ceil($rows_count / $itemsPage);

        return viewAdmin('user-list', compact('users', 'page', 'totalPages'));
    }

    // Função para criar um novo usuário
    public function createUser()
    {
        session_start();
        $email = $_POST['email'];

        $existe = App::get('database')->selectOne('users', ['email' => $email]);
        
        if ($existe) {
            echo json_encode(['error' => 'Já existe um usuário com esse email.']);
            exit();
        }

        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'image' => uploadImage($_FILES['image'], $_POST['email'])
        ];

        App::get('database')->insert('users', $parameters);

        echo json_encode(['success' => true]);
        exit();
    }

    public function updateUser(){
        session_start();
        $email = $_POST['email'];
        
        $existe = App::get('database')->selectOne('users', ['email' => $email]);
        
        if ($existe) {
            echo json_encode(['error' => 'Já existe um usuário com esse email.']);
            exit();
        }

        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $parameters['image'] = uploadImage($_FILES['image'], $_POST['email']);
        }

        App::get('database')->update('users', $_POST['id'], $parameters);

        echo json_encode(['success' => true]);
        exit();
    }

    public function deleteUser(){
        $id = $_POST['id'];

        App::get('database')->delete('users', $id);

        redirect('admin/users');
    }
}