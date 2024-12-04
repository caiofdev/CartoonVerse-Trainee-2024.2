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

    public function edit(){
        $parameters = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => uploadImagePost($_FILES['image'], $_POST['id'])
        ];
        
        $id = $_POST['id'];

        App::get('database')->update('posts', $id, $parameters);

        header('Location: /admin/post-list');
        
        // $sql = sprintf("UPDATE `posts` SET `id`= id,`title`='[value-2]',`content`='[value-3]',`image`='[value-4]',`created_at`='[value-5]',`author`='[value-6]' WHERE 1",
        //                  $table,
        //                  implode(', ', array_keys($parameters)),
        //                  ':' . implode(', :', array_keys($parameters))
        //                 );
        // try {
        //     $stmt = $this->pdo->prepare($sql);
        //     $stmt->execute($parameters);
        // } catch (Exception $e) {
        //     die($e->getMessage());
        // }
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
            $post->author = App::get('database')->selectOne('users', $post->author)->name; 
        }
        

        $totalPages = ceil($rows_count / $itemsPage);

        return view('site/post-list', compact('posts', 'page', 'totalPages'));


        // return view('site/post-list', compact('posts'));
    }
    public function searchPost() {
        if (isset($_GET['title'])) {   
            $title = htmlspecialchars($_GET['title']);
            $posts = App::get('database')->getBySimilar('posts', 'title', $title);
            
            foreach ($posts as $post) {
                // troca o id pelo nome de cada um
                $post->author = App::get('database')->selectOne('users', $post->author)->name; 
            }
            
            return view('site/post-list',compact('posts'));
        }
    }

    public function user_view_single_post(){
        var_dump($_GET);
        if (isset($_GET['id'])) {
            $postId = htmlspecialchars($_GET['id']);
            
            if (!is_numeric($postId)) { // se nao for numerico pula fora pra evitar confusao
                header('Location: /site/post-list');
                return;
            }

            $post = App::get('database')->selectOne('posts', $postId); // ve se existe um post com esse id
            if (!$post) {
                header('Location: /site/post-list');
                return;
            }
            return view('site/post-unico', $post);

        }
    }
}

?>
