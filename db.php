<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

function getDatabaseConnection() {

    //Pegando config do banco 
    $config = require './config.php';

    //Pegando o array do banco bonitinho
    $dbConfig = $config['database'];

    try {
        return new PDO(
            "{$dbConfig['connection']};dbname={$dbConfig['name']}",
            $dbConfig['username'],
            $dbConfig['password'],
            $dbConfig['options'],
        );
        echo "Conexão bem sucedida";
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
}

/* 
use App\Core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
 */