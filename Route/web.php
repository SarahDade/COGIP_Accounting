<?php 

require (__DIR__ . "./Router.php");
$routes = new Router($_SERVER['REQUEST_URI']);

//      homepage
$routes->add('/', 'controller@index');                          //index

//      ┌────────────────────┐
//      │  PeopleController  │
//      └────────────────────┘
$routes->add('people', 'peopleController@index');               // index
$routes->add('people/{$id}', 'peopleController@show');          // show
$routes->add('people/create', 'peopleController@create');      // create
$routes->add('people/edit', 'peopleController@update');         // edit
$routes->add('people/delete', 'peopleController@delete');    // delete

//      ┌─────────────────────┐
//      │  InvoiceController  │
//      └─────────────────────┘
$routes->add('invoice', 'invoiceController@index');               // index
$routes->add('invoice/{$id}', 'invoiceController@show');          // show
$routes->add('invoice/create', 'invoiceController@create');      // create
$routes->add('invoice/edit', 'invoiceController@update');         // edit
$routes->add('invoice/delete', 'invoiceController@delete');    // delete

//      ┌─────────────────────┐
//      │  CompanyController  │
//      └─────────────────────┘
$routes->add('company', 'companyController@index');               // index
$routes->add('company/{$id}', 'companyController@show');          // show
$routes->add('company/create', 'companyController@create');      // create
$routes->add('company/edit', 'companyController@update');         // edit
$routes->add('company/delete', 'companyController@delete');    // delete

$routes->loader();