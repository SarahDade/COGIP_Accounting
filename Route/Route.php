<?php

class Route{

    private $path;
    private $callable;

    public function __construct($path, $callable){

        $this->path = trim($path);
        $this->$path = $path;

        $array = explode("@", $callable);
        $this->callable = $array;
    }

    public function call(){
        require('../Controller/'.$this->callable[0]); 
    } 
}