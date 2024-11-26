<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function selectOne($table, $id){
        
        $sql = "select * from {$table} where id = ?";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            // $stmt->execute(['id' => $id]);
            return $stmt->fetchObject();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getBySimilar($table, $column, $name){
        $sql = "select * from $table where $column like :name";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":name", "%$name%");
            $stmt->execute();
            return $stmt->fetchObject();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function insert($table, $parameters){
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
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