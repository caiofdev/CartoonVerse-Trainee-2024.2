<?php

require '/core/bootstrap.php';
require __DIR__ . '/vendor/autoload.php';

function getDatabaseConnection() {
    $config = require __DIR__ . '/config.php';
    $dbConfig = $config['database'];
    try {
        return new PDO(
            "{$dbConfig['connection']};dbname={$dbConfig['name']}",
            $dbConfig['username'],
            $dbConfig['password'],
            $dbConfig['options']
        );
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
}
?>

/* 
use App\Core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
 */