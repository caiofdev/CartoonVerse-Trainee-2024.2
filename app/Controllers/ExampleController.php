<?php
namespace App\Controllers;

use App\Core\App;
use Exception;

class ExampleController
{

    public function index()
    {
        return view('/app/views/site/index.view.php');
    }
}

?>