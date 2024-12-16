<?php
namespace App\Core\database;

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

    public function verificaLogin($email, $senha)
    {
        $sql = sprintf('SELECT * FROM users WHERE email = :email AND password = :password');
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'password' => $senha
            ]);

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            return $user;
        } catch (Exception $e) {
            die($e->getMessage());
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

    public function delete($table, $id){
        $sql = "DELETE FROM {$table} WHERE id = ?";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}