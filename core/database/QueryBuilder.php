<?php
namespace App\Core\Database;

use App\Core\App;
use PDO, Exception;

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function checkAndCreateDefaultUser()
    {
        // Verifica se há usuários no banco de dados
        $sql = "SELECT COUNT(*) FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $userCount = intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        if ($userCount === 0) {
            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $userCount = intval($stmt->fetch(PDO::FETCH_NUM)[0]);

                // Se não houver usuários, cria um usuário padrão
                    $defaultUser = [
                        'name' => 'Usuário Exemplo',
                        'email' => 'default@example.com',
                        'password' => password_hash('password', PASSWORD_DEFAULT),
                        'image' => '/public/assets/img/profile/padrao.jpg'
                    ];

                    $this->insert('users', $defaultUser);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        }
    }

    public function selectAll($table, $inicio = null, $rows_count = null)
    {
        $sql = "SELECT * FROM {$table}";

        if ($inicio >= 0 && $rows_count > 0) {
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectRecentPosts($table, $limit)
    {
        $sql = "SELECT * FROM {$table} ORDER BY created_at DESC LIMIT {$limit}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function countAll($table)
    {
        $sql = "SELECT COUNT(*) FROM {$table}";

        try {

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectOne($table, $parameters)
    {
        $sql = sprintf(
            'SELECT * FROM %s WHERE %s = :%s',
            $table,
            implode(', ', array_keys($parameters)),
            implode(', :', array_keys($parameters))
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            return $stmt->fetch(PDO::FETCH_ASSOC);
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
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getBySimilar($table, $column, $name){
        // $sql = "select * from $table where $column like :name";
        $sql = sprintf('SELECT * FROM %s WHERE %s LIKE ?', $table, $column);
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%$name%");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($table, $id, $parameters){
        $sql = sprintf('UPDATE %s SET %s WHERE id = %s', 
            $table,
            implode(', ', array_map(function($param){
                return $param . ' = :' . $param;
            }, array_keys($parameters))),
            $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Função para deletar um usuário
    public function delete($table, $id)
    {
        try {

            // Verificar se o usuário tem posts
            if ($this->userHasPosts($id) > 0) {
                // Deletar os posts do usuário
                $this->deletePostsByUserId($id);
            }

            // Deletar o usuário
            $sql = sprintf("DELETE FROM %s WHERE id = :id", $table);
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $this->resetAutoIncrement($table);
        }
        catch (Exception $e) {
            echo "Erro ao deletar o usuário: " . $e->getMessage();
        }
    }

    // Função para verificar se um usuário tem posts
    public function userHasPosts($userId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM posts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);
        } catch (Exception $e) {
            echo "Erro ao verificar se o usuário tem posts: " . $e->getMessage();
            return 0;
        }
    }

    // Função para deletar os posts de um usuário
    public function deletePostsByUserId($userId)
{
    try {
        $sql = "DELETE FROM posts WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Erro ao deletar os posts do usuário: " . $e->getMessage();
    }
}

    public function resetAutoIncrement($table)
    {
        try {
            $sql = "ALTER TABLE {$table} AUTO_INCREMENT = 1";
            $this->pdo->exec($sql);
        } catch (Exception $e) {
            echo "Erro ao resetar o auto-increment: " . $e->getMessage();
        }
    }   
}