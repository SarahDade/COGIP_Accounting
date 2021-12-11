<?php

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'config');
$dotenv->load();

class Route{

    // how to turn it private?
    public $path;
    public $callable;
    public $id;
    public $access = true;

//      ┌───────────────────────────────┐
//      │  CONSTRUCT - PATH & CALLABLE  │
//      └───────────────────────────────┘
    public function __construct($path, $callable, $id = null){

        $this->path = trim($path);
        $this->path = $path;
        $this->id = $id;

        $array = explode("@", $callable);
        $this->callable = $array;
    }
    
//      ┌──────────────┐
//      │  MIDDLEWARE  │
//      └──────────────┘
    public function middleware($access){

            switch ($access) {
                case "moderator":
                    if( isset($_SESSION['right_access'])){
                        if( $_SESSION['right_access'] >= 2){

                        }else{
                            $this->access = false;
                        }
                    }else{
                        $this->access = false;
                    }
                break;
            case "admin":
                if( isset($_SESSION['right_access'])){
                    if( $_SESSION['right_access'] >= 3){

                    }else{
                        $this->access = false;
                    }
                }else{
                    $this->access = false;
                }
                break;
        }
    }

//      ┌────────┐
//      │  CALL  │
//      └────────┘
    public function call($controller, $id = null){
        $file = $controller[0];
        $method = $controller[1];

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Controller/".$file .".php");

        $controller = new $file;
        $controller->$method($id);
    }
}
