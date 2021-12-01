<?php 

die($_SERVER['REQUEST_URI']);

require "./Router.php";
$routes = new Router($_SERVER['REQUEST_URI']);

//      homepage
$routes->get('/', 'controller@index');                          //index

//      ┌────────────────────┐
//      │  PeopleController  │
//      └────────────────────┘
$routes->get('people', 'peopleController@index');               // index
$routes->get('people/{$id}', 'peopleController@show');          // show
$routes->post('create-people', 'peopleController@create');      // create
$routes->put('edit-people', 'peopleController@update');         // edit
$routes->delete('delete-people', 'peopleController@delete');    // delete

//      ┌─────────────────────┐
//      │  InvoiceController  │
//      └─────────────────────┘
$routes->get('invoice', 'invoiceController@index');               // index
$routes->get('invoice/{$id}', 'invoiceController@show');          // show
$routes->post('create-invoice', 'invoiceController@create');      // create
$routes->put('edit-invoice', 'invoiceController@update');         // edit
$routes->delete('delete-invoice', 'invoiceController@delete');    // delete

//      ┌─────────────────────┐
//      │  CompanyController  │
//      └─────────────────────┘
$routes->get('company', 'companyController@index');               // index
$routes->get('company/{$id}', 'companyController@show');          // show
$routes->post('create-company', 'companyController@create');      // create
$routes->put('edit-company', 'companyController@update');         // edit
$routes->delete('delete-company', 'companyController@delete');    // delete

// $routes->print();
