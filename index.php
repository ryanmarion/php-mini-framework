<?php

require 'vendor/autoload.php';
use App\Controllers\HomeController;
use App\Controllers\UserController;

$app = new App\App;

$container = $app->getContainer();

$container['errorHandler'] = function(){
    return function($response){
        return $response->setBody('Page not found')->withStatus(404);
    };
};

$container['config'] = function(){
    return [
        'db_driver' => 'mysql',
        'host' => 'localhost',
        'db_name' => 'framework_db',
        'db_user' => 'root',
        'db_pass' => ''
    ];
};

$container['db'] = function($c){
    return new PDO(
        $c->config['db_driver'] . ':host=' . $c->config['host'] . ';dbname=' . $c->config['db_name'],
        $c->config['db_user'],
        $c->config['db_pass']);
};

$app->get('/', [new HomeController($container->db),'index']);
$app->get('/users', [new UserController($container->db),'index']);

$app->get('/signup', function(){
    echo 'signup';
});

// $app->map('/users', function(){
//     echo 'users';
// }, ['GET','POST']);

$app->run();