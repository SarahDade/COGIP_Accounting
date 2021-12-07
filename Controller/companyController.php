<?php

require (__DIR__ . "./Controller.php");

class companyController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/index.php"); 
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show($id) {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/show.php"); 
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/create.php"); 
    }

//      ┌─────────┐
//      │  STORE  │
//      └─────────┘
public function store() {
    echo 'You need to create the store method to the current view !';
}

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit($id) {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/edit.php"); 
    }

//      ┌──────────┐
//      │  UPDATE  │
//      └──────────┘
    public function update($id) {
    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
    public function delete($id) {
    }
}
