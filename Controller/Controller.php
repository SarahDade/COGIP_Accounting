<?php

// require (__DIR__ . "../Model/");

class Controller{

    protected $model;
    protected $index;
    protected $show;
    protected $create;
    protected $update;
    protected $delete;

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {
        echo "tata";
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show() {
        echo "ffafaf";
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
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
