<?php

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'config');
$dotenv->load();

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
    
//      ┌──────────────┐
//      │  MIDDLEWARE  │
//      └──────────────┘
    public function middleware($access){

            switch ($access) {
                case "moderator":
                    echo "moderator";
                    echo "<hr>";
            /*                 if($user->rightaccess == 2){
                    // you need to make an SQL REQUEST here (depending on the model probably)
                } */

                break;
            case "admin":
                echo "admin";
                echo "<hr>";
            /*                 if($user->rightaccess == 1){
                    // you need to make an SQL REQUEST here (depending on the model probably)
                } */
            
                break;

        }
    }

//      ┌────────┐
//      │  CALL  │
//      └────────┘
    public function call($controller){

        $file = $controller[0];
        $method = $controller[1];

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Controller/".$file .".php");

        $controller = new $file;
        switch ($method) {
            case "index":
                $controller->index();
                break;
            case "show":
                $controller->show();
                break;
            case "create":
                $controller->create();
                break;
            case "update":
                $controller->update();
                break;
            case "delete":
                $controller->delete();
                break;
        }
    }
}
