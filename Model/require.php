<?php


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
$dotenv->load();

try {
    $bdd = new PDO("mysql:host=".$_ENV['host'].";dbname=".$_ENV['database'].";charset=utf8", $_ENV['username'] , $_ENV['password']);
}
catch(Exception $e){
    die('Error : '.$e->getMessage());
}
/* 
function connect_db() {

    try {
        $bdd = new PDO('mysql:host=127.0.0.1:3306;dbname=cogip_db;charset=utf8', 'root', '');
    }

    catch(Exception $e){
        die('Error : '.$e->getMessage());
    }

} */