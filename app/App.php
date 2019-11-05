<?php

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Exceptions\MethodNotAllowedException;

class App {
    protected $container;

    public function __construct(){
        $this->container = new Container([
            'router' => function(){
                return new Router;
            }
        ]);
    }

    public function getContainer(){
        return $this->container;
    }

    public function get($uri,$handler){
        $this->container->router->addRoute($uri,$handler,['GET']);
    }
    
    public function post($uri,$handler){
        $this->container->router->addRoute($uri,$handler,['POST']);
    }

    public function map($uri,$handler,array $methods){
        $this->container->router->addRoute($uri, $handler, $methods);
    }

    public function run(){
        $router = $this->container->router;
        $router->setPath($_SERVER['PATH_INFO'] ?? '/');

        try {
            $response = $router->getResponse();
        } catch (RouteNotFoundException $e){
            if($this->container->has('errorHandler')){
                $response = $this->container->errorHandler;
            } else {
                return;
            }
        } catch(MethodNotAllowedException $e){
            if($this->container->has('errorHandler')){
                $response = $this->container->errorHandler;
            } else {
                return;
            }
        }

        return $this->process($response);
    }

    protected function process($callable){
        return $callable();
    }
}