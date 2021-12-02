<?php

class Route{

    // how to turn it private?
    public $path;
    public $callable;

//      ┌───────────────────────────────┐
//      │  CONSTRUCT - PATH & CALLABLE  │
//      └───────────────────────────────┘
    public function __construct($path, $callable){

        $this->path = trim($path);
        $this->$path = $path;

        $array = explode("@", $callable);
        $this->callable = $array;
    }

//      ┌────────┐
//      │  CALL  │
//      └────────┘
    public function call($controller){
        print_r( $controller );
        echo '<hr>';


        // if else function => 404
        require_once('./controller/'.$controller[0].'.php');
    } 
}