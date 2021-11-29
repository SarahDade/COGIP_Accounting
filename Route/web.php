<?php 

require "./Router.php";

$routes = new Router();

$routes->add('home', 'home@index');
$routes->add('contact', 'home@contact');



