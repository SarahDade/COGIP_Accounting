<?php

require (__DIR__ . "./Controller.php");

class invoiceController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/index.php"); 
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/show.php"); 
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/create.php"); 
    }

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/edit.php"); 
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
