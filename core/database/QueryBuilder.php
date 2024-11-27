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
    
}