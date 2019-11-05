<?php

namespace App;

class Response{
    protected $body;
    protected $status = 200;
    protected $headers = [];

    public function setBody($body){
        $this->body = $body;
        return $this;
    }

    public function getBody(){
        return $this->body;
    }

    public function withStatus($statusCode){
        $this->status = $statusCode;
        return $this;
    }

    public function getStatus(){
        return $this->status;
    }

    public function withJson($body){
        $this->withHeader('Content-Type','application/json');
        $this->body = json_encode($body);

        return $this;
    }

    public function withHeader($name, $value){
        $this->headers[] = [$name, $value];
        return $this;
    }

    public function getHeaders(){
        return $this->headers;
    }
}