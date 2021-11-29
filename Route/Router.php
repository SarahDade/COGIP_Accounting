<?php 

class Router {

//      ┌────────────────┐
//      │  Var => Array  │
//      └────────────────┘
    private $routes = [];

//      ┌──────────────────────────────────────────┐
//      │  explode $path to get pushed in $routes  │
//      └──────────────────────────────────────────┘
    public function add($url, $path) {

        $array = explode("@", $path);
        $this->routes[$url] = [];
        
        foreach ($array as $element) {
            array_push($this->routes[$url], $element);
        }
    }

//      ┌────────────────────────────────────────────────────┐
//      │  Redirect to function in controller on url change  │
//      └────────────────────────────────────────────────────┘
    public function run() {

        foreach ($routes as $key => $value) {
            if($_GET["page"] == $key){
                //redirect with $value[0] et $value[1]
            }
        }
    }
}