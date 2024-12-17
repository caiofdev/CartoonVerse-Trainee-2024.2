<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{

    // public function index()
    // {
    //     session_start();
    //     $posts = App::get('database')->selectAll('posts');
        
    //     foreach ($posts as $post) {
    //         // troca o id pelo nome de cada um
    //         $post->author = App::get('database')->selectOne('users', ['id'=>$post->author])->name;            
    //     }

    //     $author = App::get('database')->selectOne('users', ['id'=>$_SESSION['user']->id])->name;


    //     return view('admin/post-list', compact('posts', 'author'));
    // }

    public function index()
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




    public function getCreate(){
        return view('admin/create-post');
    }

    public function create(){
	session_start();
        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => uploadImagePost($_FILES['image']),
            'created_at' => date('Y-m-d'),
            'author' => $_SESSION['user']->id
            // 'author' => $_SESSION['id'] // CHECK ME!!
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
        }

        $post = App::get('database')->selectOne('posts', ['id' => $id]); // ve se existe um post com esse id
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

    public function edit(){
        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $parameters['image'] = uploadImagePost($_FILES['image'], $_POST['id']);
        }
        
        $id = $_POST['id'];

        App::get('database')->update('posts', $id, $parameters);

        header('Location: /admin/post-list');
        
    }

    public function index_user_post_list(){
        // $posts = App::get('database')->selectAll('posts');

        $page = 1;

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $page = intval($_GET['page']);

            if($page <= 0){
                return redirect('site/post-list');
            }
        }

        $itemsPage = 6;
        $inicio = $itemsPage * $page - $itemsPage;

        $rows_count = App::get('database')->countAll('posts');

        if($inicio > $rows_count){
            return redirect('site/post-list');
        }

        $posts = App::get('database')->selectAll('posts', $inicio, $itemsPage);

        
        foreach ($posts as $post) {
            // troca o id pelo nome de cada um
            $nome = App::get('database')->selectOne('users', ['id' => $post->author])['name']; 
            $post->author = $nome;
        }
        

        $totalPages = ceil($rows_count / $itemsPage);

        return view('site/post-list', compact('posts', 'page', 'totalPages'));


        // return view('site/post-list', compact('posts'));
    }
    public function searchPost() {
        $page = 1;

        if(isset($_GET['page']) && !empty($_GET['page'])){
            $page = intval($_GET['page']);

            if($page <= 0){
                return redirect('site/post-list');
            }
        }
        $itemsPage = 6;
        $inicio = $itemsPage * $page - $itemsPage;

        $rows_count = App::get('database')->countAll('posts');

        if($inicio > $rows_count){
            return redirect('site/post-list');
        }

        if (isset($_GET['title'])) {   
            $title = htmlspecialchars($_GET['title']);
            $posts = App::get('database')->getBySimilar('posts', 'title', $title, $inicio, $itemsPage);
            
            foreach ($posts as $post) {
                // troca o id pelo nome de cada um
                $post->author = App::get('database')->selectOne('users', ['id' => $post->author])->name; 
                // var_dump($post);
            }

            $totalPages = ceil($rows_count / $itemsPage);

            return view('site/post-list',compact('posts', 'page', 'totalPages'));
        }
    }

    public function user_view_single_post(){
        // var_dump($id);
        // if (isset($_GET['id'])) {
        //     $postId = htmlspecialchars($_GET['id']);
        
        $id = $_GET['id'];
        if (!is_numeric($id)) { // se nao for numerico pula fora pra evitar confusao
            header('Location: /site/post-list');
            return;
        }
        $post = App::get('database')->selectOne('posts', ['id' => $id]);
        // var_dump($post);
        $author = App::get('database')->selectOne('users', ['id' => $post->author]);
        // var_dump($author);
        if (!$post) {
            header('Location: /post-list');
            return;
        }
        return view('site/post-unico', compact('post', 'author'));

    }
}

?>
