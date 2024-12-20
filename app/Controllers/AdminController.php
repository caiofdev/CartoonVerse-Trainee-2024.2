<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{
    public function index()
    {
        session_start();
        return viewAdmin('dashboard-admin');
    }

    public function sidebar()
    {
        $user = App::get('database')->selectOne('users', ['id' => $_SESSION['id']]);

        return viewAdmin('sidebar', compact('user'));
    }

    public function adm_post_list()
    {
        session_start();

        $page = 1;

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $page = intval($_GET['page']);

            if($page <= 0){
                return redirect('admin/post-list');
            }
        }

        $itemsPage = 5;
        $inicio = $itemsPage * $page - $itemsPage;

        $rows_count = App::get('database')->countAll('posts');

        if($inicio > $rows_count){
            return redirect('admin/post-list');
        }

        $posts = App::get('database')->selectAll('posts', $inicio, $itemsPage);

        $totalPages = ceil($rows_count / $itemsPage);
        
        foreach ($posts as $post) {
            // troca o id pelo nome de cada um
            $post->author = App::get('database')->selectOne('users', ['id'=>$post->author])->name;            
        }

        $author = App::get('database')->selectOne('users', ['id'=>$_SESSION['user']->id])->name;


        return view('admin/post-list', compact('posts', 'author', 'page', 'totalPages'));
    }

    public function adm_user_list(){
        session_start();

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

        $existe = App::get('database')->selectOne('users', ['email' => $_POST['email']]);
        
        if ($existe) {
            echo json_encode(['error' => 'Já existe um usuário com esse email.']);
            exit();
        }

        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'image' => uploadImage($_FILES['image'], $_POST['email'])
        ];

        echo json_encode(['success' => true]);
        
        App::get('database')->insert('users', $parameters);
        exit();
    }

    public function updateUser(){
        session_start();
        $id = $_POST['id'];
        $email = $_POST['email'];
        
        $existe = App::get('database')->selectOne('users', ['email' => $email]);
        
        if ($existe && $existe->id != $id) {
            echo json_encode(['error' => 'Já existe um usuário com esse email.']);
            exit();
        }

        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $parameters['image'] = uploadImage($_FILES['image'], $_POST['email']);
        }

        echo json_encode(['success' => true]);
        App::get('database')->update('users', $id, $parameters);

        exit();
    }

    public function deleteUser(){
        header('Content-Type: application/json');
        $id = $_POST['id'];

        try {
            App::get('database')->delete('users', $id);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao deletar usuário.']);
        }
        exit();
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
    }
}