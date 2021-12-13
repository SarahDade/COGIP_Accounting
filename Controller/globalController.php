<?php

require (__DIR__ . "./Controller.php");

class globalController extends Controller{


//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
public function index() {
     
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/globalModel.php");
    
    $lastInvoices =  get_lastInvoices();
    $lastContacts = get_lastContacts();
    $lastCompanies = get_lastCompanies();
 
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/index.php"); 

    }
}
