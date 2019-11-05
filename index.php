<?php

require 'vendor/autoload.php';

$app = new App\App;

$container = $app->getContainer();

$container['config'] = function(){
    return [
        'db_driver' => 'mysql',
        'host' => 'localhost',
        'db_name' => 'framework_db',
        'db_user' => 'root',
        'db_pass' => 'root'
    ];
};

$container['db'] = function($c){
    return new PDO(
        $c->config['db_driver'] . ':host=' . $c->config['host'] . ';dbname=' . $c->config['db_name'],
        $c->config['db_user'],
        $c->config['db_pass']);
};

$app->get('/', function(){
    echo 'home';
});

$app->post('/signup', function(){
    echo 'signup';
});

$app->map('/users', function(){
    echo 'users';
}, ['GET','POST']);

$app->run();