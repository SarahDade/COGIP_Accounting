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

        require($_SERVER['DOCUMENT_ROOT']."/COGIP_Accounting/Controller/".$file .".php");

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
