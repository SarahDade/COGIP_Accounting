<?php

	// request phpMyAdmin
	try{
		// Connect to mysql
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=Copig;charset=utf8', 'kriss', 'Sommation01');
	}
	
	catch(Exception $e){
		//if miss, display error and stop the process
	        die('Erreur : '.$e->getMessage());
	}
	
	
?>