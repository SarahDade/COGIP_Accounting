<?php 

require (__DIR__ . "./Route.php");

class Router {

    private $routes = [];
    private $url;

//      ┌───────────────────────────┐
//      │  CONSTRUCT - CURRENT URL  │
//      └───────────────────────────┘
    public function __construct($url){
        $array = explode("/", $url);    

        for ($i = 0; $i < 2; $i++) {
            array_shift($array);  
        }
        
        switch (count($array)) {
            case 1:
                if( $array[0] == ''){
                    array_splice( $array, 0, 0, '/' );
                }
                break;
            case 2:
                array_splice( $array, 1, 0, '/' );
                break;
            case 3:
                array_splice( $array, 1, 0, '/' );
                array_splice( $array, 3, 0, '/' );
                break;
            case 4:
                array_splice( $array, 1, 0, '/' );
                array_splice( $array, 3, 0, '/' );
                array_splice( $array, 5, 0, '/' );
                break;
        }
        $array = implode("",$array);
        $this->url = $array;
    }

//      ┌───────┐
//      │  ADD  │
//      └───────┘
    public function add($path, $callable) {

        $array = explode("/", $path); 
        $routesGroup = $array[0];

        if( $routesGroup == '' ){

            $route = new Route($path, $callable);
            $this->routes['homepage'][] = $route;
        }
        else{
            
            $route = new Route($path, $callable);
            $this->routes[$routesGroup][] = $route;
        }
    }

//      ┌─────────┐
//      │  PRINT  │
//      └─────────┘
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

        foreach ($this->routes as $route) {
            foreach ($route as $element) {
                if( $element->path == $this->url ){
                    $element->call($element->callable);
                }
                
            }
        }
        // make à redirect to 404page file
        echo "404 Not Found.";
    }
}