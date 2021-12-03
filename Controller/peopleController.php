<?php

require (__DIR__ . "./Controller.php");

class peopleController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/index.php"); 
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/show.php"); 
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/create.php"); 
    }

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/edit.php"); 
    }

//      ┌──────────┐
//      │  UPDATE  │
//      └──────────┘
    public function update() {
    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
    public function delete() {
    }
}
