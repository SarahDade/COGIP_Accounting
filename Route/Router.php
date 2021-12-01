<?php 

require "./Route.php";
require "./RouterException.php";


class Router {

    private $routes = [];
    private $url;

    public function __construct($url){
        $this->url = $url;
    }

    public function get($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    public function post($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function put($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes['PUT'][] = $route;
    }

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