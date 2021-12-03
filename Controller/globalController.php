<?php

require (__DIR__ . "./Controller.php");

class globalController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/index.php"); 
    }
}
