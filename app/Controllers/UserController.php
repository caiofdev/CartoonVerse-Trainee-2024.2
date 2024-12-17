<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{
    public function index()
    {
        $posts = App::get('database')->selectRecentPosts('posts', 5);
    
        return view('site/landing-page', compact('posts'));
    }

    public function login()
    {
        session_start();
        
        if(isset($_SESSION['id'])){
            header('Location: /admin/dashboard');
        }

        return view('site/login');
    }

    public function fazerLogin(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = APP::get('database')->verificaLogin($email, $senha);

        if($user != false){
            session_start();
            $_SESSION['id'] = $user->id;
            header('Location: /admin/dashboard');
        }
        else {
            session_start();
            $_SESSION['mensagem-erro'] = "Usuário não encontrado! Email e/ou senha incorretos!";
            header('Location: /login');
        }
    }

}