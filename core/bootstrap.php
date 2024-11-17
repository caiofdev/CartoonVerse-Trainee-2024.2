<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\App;
use App\Core\database\{QueryBuilder, Connection};

App::bind('config', require __DIR__ . '/../config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));