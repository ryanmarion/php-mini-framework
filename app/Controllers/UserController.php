<?php

namespace App\Controllers;

use PDO;

class UserController {
    public function __construct(PDO $db){
    }

    public function index($response){
        return $response->withJson([
            'test' => true
        ]);
    }
}