<?php 

require (__DIR__ . "./Router.php");
$routes = new Router($_SERVER['REQUEST_URI']);

//      homepage
$routes->add('/', 'globalController@index');                                            // index

//      ┌────────────────────┐
//      │  PeopleController  │
//      └────────────────────┘
$routes->add('people', 'peopleController@index');                                       // index
$routes->add('people/$id', 'peopleController@show');                                    // show
$routes->add('people/create', 'peopleController@create')->middleware('moderator');      // create
$routes->add('people/edit/$id', 'peopleController@update')->middleware('admin');        // edit
$routes->add('people/delete/$id', 'peopleController@delete')->middleware('admin');      // delete

//      ┌─────────────────────┐
//      │  InvoiceController  │
//      └─────────────────────┘
$routes->add('invoice', 'invoiceController@index');                                     // index
$routes->add('invoice/$id', 'invoiceController@show');                                  // show
$routes->add('invoice/create', 'invoiceController@create')->middleware('moderator');    // create
$routes->add('invoice/edit/$id', 'invoiceController@update')->middleware('admin');      // edit
$routes->add('invoice/delete/$id', 'invoiceController@delete')->middleware('admin');    // delete

//      ┌─────────────────────┐
//      │  CompanyController  │
//      └─────────────────────┘
$routes->add('company', 'companyController@index');                                     // index
$routes->add('company/$id', 'companyController@show');                                  // show
$routes->add('company/create', 'companyController@create')->middleware('moderator');    // create
$routes->add('company/edit/$id', 'companyController@update')->middleware('admin');      // edit
$routes->add('company/delete/$id', 'companyController@delete')->middleware('admin');    // delete

$routes->loader();