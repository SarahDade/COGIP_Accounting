<?php

function connect_db() {

    try {
        $bdd = new PDO('mysql:host=127.0.0.1:3306;dbname=cogip_db;charset=utf8', 'root', '');
    }
    
    catch(Exception $e){
        die('Error : '.$e->getMessage());
    }

}

