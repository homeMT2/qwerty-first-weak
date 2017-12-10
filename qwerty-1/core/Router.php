<?php

class Router {

    protected $routes = '';

    public static function load( $file ) {
        $router = new static;
        require $file;
        return $router;
    }

    public function define( $routes ) {
        $this->routes = $routes;
    }

    public function direct() {
        return $this->routes;
    }

}