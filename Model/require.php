<?php

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cogip_db;charset=utf8', 'kriss', 'Sommation01');
}

catch(Exception $e){
    die('Error : '.$e->getMessage());
}