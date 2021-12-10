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
$routes->add('people/create', 'peopleController@create');                               // create
$routes->add('people/store', 'peopleController@store');                                 // store
$routes->add('people/edit/$id', 'peopleController@edit');                               // edit
$routes->add('people/update/$id', 'peopleController@update');                           // update
$routes->add('people/delete/$id', 'peopleController@delete');                           // delete

//      ┌─────────────────────┐
//      │  InvoiceController  │
//      └─────────────────────┘
$routes->add('invoice', 'invoiceController@index');                                     // index
$routes->add('invoice/$id', 'invoiceController@show');                                  // show
$routes->add('invoice/create', 'invoiceController@create');                             // create
$routes->add('invoice/store', 'invoiceController@store');                               // store
$routes->add('invoice/edit/$id', 'invoiceController@edit');                             // edit
$routes->add('invoice/update/$id', 'invoiceController@update');                         // update
$routes->add('invoice/delete/$id', 'invoiceController@delete');                         // delete

//      ┌─────────────────────┐
//      │  CompanyController  │
//      └─────────────────────┘
$routes->add('company', 'companyController@index');                                     // index
$routes->add('company/$id', 'companyController@show');                                  // show
$routes->add('company/create', 'companyController@create');                             // create
$routes->add('company/store', 'companyController@store');                               // store
$routes->add('company/edit/$id', 'companyController@edit');                             // edit
$routes->add('company/update/$id', 'companyController@update');                         // update
$routes->add('company/delete/$id', 'companyController@delete');                         // delete

//      ┌──────────────────┐
//      │  userController  │
//      └──────────────────┘
$routes->add('dashboard', 'userController@index');                                      // index
$routes->add('login', 'userController@login');                                          // login
$routes->add('logout', 'userController@logout');                                        // logout

$routes->loader();
