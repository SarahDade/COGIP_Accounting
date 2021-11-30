<?php 

require "./Route.php";
require "./RouterException.php";


class Router {

//      ┌────────────────┐
//      │  Var => Array  │
//      └────────────────┘
    private $routes = [];

//      ┌─────────────────┐
//      │  Var => String  │
//      └─────────────────┘
    private $url;

//      ┌────────────────────┐
//      │  Construct Method  │
//      └────────────────────┘
    public function __construct($url){
        $this->url = $url;
    }

//      ┌─────────────────┐
//      │  Construct GET  │
//      └─────────────────┘
    public function get($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

//      ┌──────────────────┐
//      │  Construct POST  │
//      └──────────────────┘
    public function post($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function print() {
        // var_dump( $_GET['url'] );
        echo '<pre>';
        echo print_r($this->routes);
        echo '</pre>';
    }

    public function run() {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
        
    }
}