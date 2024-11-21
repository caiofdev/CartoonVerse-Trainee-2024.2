<?php

namespace App\Controllers;

// require '/core/helpers.php'; ---> desnecessário [pois o autoload do composer ja faz isso] (oq ta entre
// colchetes foi o copilot. Nao faço ideia se é verdade, so sei que o require é desnecessário)

use App\Core\App;
use Exception;

class AdminController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/user-list', compact('users'));
        // o primeiro parametro de view() é o arquivo dentro de views/ que deve ser retornado.
        // ou seja, é o que vai aparecer na tela. O segundo é a variavel $users transformada em array
        // confira o arquivo routes.php

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