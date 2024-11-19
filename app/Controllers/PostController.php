<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{

    public function index()
    {
        $posts = App::get('database')->selectAll('posts');

        foreach ($posts as $post) {

            // troca o id pelo nome de cada um
            $post->author = App::get('database')->selectOne('users', $post->author)->name; 
            
        }
        return view('admin/post-list', compact('posts'));
    }
    public function getCreate(){
        return view('admin/create-post');
    }

    public function create(){
	//session_start();
        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => uniqid() . $_POST['image'],
            'created_at' => date('Y-m-d'),
            'author' => $_SESSION['id'] // CHECK ME!!
        ];
        // var_dump($parameters);
        App::get('database')->insert('posts', $parameters);
        header('Location: /admin/post-list');
    }

    public function getDelete(){
        return view('admin/delete-post');
    }
    public function delete(){
        $id = $_POST['id'];
        if (!is_numeric($id)) { // se nao for numerico pula fora pra evitar confusao
            header('Location: /admin/post-list');
            return;
        }

        $post = App::get('database')->selectOne('posts', $id); // ve se existe um post com esse id
        if (!$post) {
            header('Location: /admin/post-list');
            return;
        }        
        App::get('database')->delete('posts', $id);
        header('Location: /admin/post-list');
    }
    public function getEdit(){
        return view('admin/editar-post');
    }
}

?>
