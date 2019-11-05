<?php

namespace App\Controllers;

use PDO;

class HomeController {
    public function __construct(PDO $db){
    }

    public function index($response){
        return $response->setBody('check');
    }
}