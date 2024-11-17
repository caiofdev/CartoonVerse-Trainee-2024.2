<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{
    // Função para fazer o upload da imagem
    public function uploadImage($file, $userId = null)
    {
        $targetDir = __DIR__ . '/public/assets/img/profile/';
        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);

        // Se o ID do usuário for fornecido, inclua-o no nome do arquivo
        if ($userId) {
            $fileName .= "_user{$userId}";
        }

        $targetFile = $targetDir . $fileName . '.' . $imageFileType;

        // Verificar se o arquivo é uma imagem
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            die("O arquivo não é uma imagem.");
        }

        // Verificar o tamanho do arquivo
        if ($file['size'] > 50000000) { // 50MB
            die("Desculpe, o arquivo é muito grande.");
        }

        // Permitir certos formatos de arquivo
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedFormats)) {
            die("Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.");
        }

        // Trocar o nome da imagem se ela já existir
        while (file_exists($targetFile)) {
            $targetFile = $targetDir . $fileName . '_' . uniqid() . '.' . $imageFileType;
        }

        // Tentar fazer o upload do arquivo
        if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
            die("Desculpe, houve um erro ao fazer o upload do seu arquivo.");
        }

        return '/public/assets/img/profile/' . basename($targetFile);
    }

    // Função para obter todos os usuários
    public function getAllUsers()
    {
        $pdo = getDatabaseConnection();
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    // Função para obter um usuário pelo ID
    public function getUserById($id)
    {
        $pdo = getDatabaseConnection();
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            echo "Erro ao obter o usuário: " . $e->getMessage();
            return null;
        }
    }

    // Função para criar um novo usuário
    public function createUser($name, $email, $password, $image)
    {
        $pdo = getDatabaseConnection();
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password, image) VALUES (:name, :email, :password, :image)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            $stmt->execute();
            echo "Usuário criado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao criar o usuário: " . $e->getMessage();
        }
    }

    // Função para atualizar um usuário existente
    public function updateUser($id, $name, $email, $password, $image = null)
    {
        $pdo = getDatabaseConnection();
        try {
            if ($image) {
                $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, password = :password, image = :image WHERE id = :id");
                $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            } else {
                $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
            }
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            echo "Usuário atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar o usuário: " . $e->getMessage();
        }
    }

    // Função para deletar os posts de um usuário
    public function deletePostsByUserId($userId)
    {
        $pdo = getDatabaseConnection();
        try {
            $stmt = $pdo->prepare("DELETE FROM posts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar os posts do usuário: " . $e->getMessage();
        }
    }

    // Função para verificar se um usuário tem posts
    public function userHasPosts($userId)
    {
        $pdo = getDatabaseConnection();
        try {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM posts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            echo "Erro ao verificar os posts do usuário: " . $e->getMessage();
            return false;
        }
    }

    // Função para deletar um usuário
    public function deleteUser($id)
    {
        $pdo = getDatabaseConnection();
        try {
            // Verificar se o usuário tem posts
            if (userHasPosts($id)) {
                // Deletar os posts do usuário
                deletePostsByUserId($id);
            }

            // Deletar o usuário
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "Usuário deletado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao deletar o usuário: " . $e->getMessage();
        }
    }
}

?>