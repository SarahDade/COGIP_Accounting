<?php

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'config');
$dotenv->load();

class Route{

    // how to turn it private?
    public $path;
    public $callable;
    public $id;

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
                    echo "moderator";
                    echo "<hr>";
            /*                 if($user->rightaccess >= 1){
                    // you need to make an SQL REQUEST here (depending on the model probably)
                } */

                break;
            case "admin":
                echo "admin";
                echo "<hr>";
            /*                 if($user->rightaccess > 1){
                    // you need to make an SQL REQUEST here (depending on the model probably)
                } */
            
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
