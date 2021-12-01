<?php

class Route{

    private $path;
    private $callable;
    private $matches;

    public function __construct($path, $callable){
        $this->path = trim($path);
        $array = explode("@", $callable);
        $this->routes[$path] = [];

        foreach ($array as $element) {
            array_push($this->routes[$path], $element);
        }



    }

    public function match($url){
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
    }

    public function call(){
        return call_user_func_array($this->callable, $this->matches);
    }

}