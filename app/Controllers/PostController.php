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
}

?>