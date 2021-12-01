<?php 

require "./Route.php";
require "./RouterException.php";


class Router {

    private $routes = [];
    private $url;

    public function __construct($url){
        $this->url = $url;
    }

//      ┌───────┐
//      │  GET  │
//      └───────┘
    public function get($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

//      ┌────────┐
//      │  POST  │
//      └────────┘
    public function post($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

//      ┌───────┐
//      │  PUT  │
//      └───────┘
    public function put($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['PUT'][] = $route;
    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
    public function delete($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['DELETE'][] = $route;
    }

    public function print() {
        // var_dump( $_GET['url'] );
        echo '<pre>';
        echo print_r($this->routes);
        echo '</pre>';
    }

//      ┌──────────┐
//      │  loader  │
//      └──────────┘
    public function loader() {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->path == $this->url){
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }
}