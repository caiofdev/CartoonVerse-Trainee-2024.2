<?php
namespace App\Core\database;

use PDO;
use Exception;

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM {$table}";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parameters){
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            echo "Usuário criado com sucesso!";
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Função para atualizar um usuário existente
    public function update($table, $id, $parameters)
    {

        $sql = sprintf("UPDATE %s SET %s WHERE id = %s",
            $table,
            implode(', ', array_map(function($parameters) {
                return $parameters . ' = :' . $parameters;
            }, array_keys($parameters))),
            $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            echo "Usuário atualizado com sucesso!";
        } catch (Exception $e) {
            echo "Erro ao atualizar o usuário: " . $e->getMessage();
        }
    }

    // Função para deletar um usuário
    public function delete($table, $id)
    {
        try {
           /*  // Verificar se o usuário tem posts
            if (userHasPosts($id)) {
                // Deletar os posts do usuário
                deletePostsByUserId($id);
            } */

            // Deletar o usuário
            $sql = sprintf("DELETE FROM %s WHERE %s",
                $table, 
                'id = :id'
            );
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(compact('id'));
            echo "Usuário deletado com sucesso!";
        } catch (Exception $e) {
            echo "Erro ao deletar o usuário: " . $e->getMessage();
        }
    }

    // Função para obter todos os usuários
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    // Função para obter um usuário pelo ID
    public function getUserById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (Exception $e) {
            echo "Erro ao obter o usuário: " . $e->getMessage();
            return null;
        }
    }

    // Função para verificar se um usuário tem posts
    public function userHasPosts($userId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM posts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            echo "Erro ao verificar os posts do usuário: " . $e->getMessage();
            return false;
        }
    }

    // Função para deletar os posts de um usuário
    public function deletePostsByUserId($userId)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM posts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar os posts do usuário: " . $e->getMessage();
        }
    }
}

