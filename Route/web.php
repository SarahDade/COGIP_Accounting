<?php 

require "./Router.php";

$routes = new Router($_GET['url']);


// https://monsupersite.com
$routes->get('/', 'home@index');

// https://monsupersite.com/home
$routes->get('home', 'home@index');

// https://monsupersite.com/contact
$routes->post('contact', 'home@contact');

$routes->print();