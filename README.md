

# COGIP - Accounting application

Application for Accounting use, based on Model View Controller architecture & created with :

![Alt text](./assets/php.svg) ![Alt text](./assets/my-sql.svg)  ![Alt text](./assets/mvc-architecture.svg)
![Alt text](./assets/html-5.svg) ![Alt text](./assets/css-3.svg)

## Table of contents 

* [General informations](#general-informations)
* [Organisation](#organisation)
* [Technologies](#technologies)
* [Setup](#setup)

## General informations

### Objectives 

* Crypt password in a database
* Use an MVC structure
* Use a router
* Setup a session
* Allow access to certain page in regards to permissions

### Authors

* [Christophe Buffe](https://github.com/Christophe28) : &nbsp; CRUD / authentification
* [Sarah Dade](https://github.com/SarahDade)  : &nbsp; UML / Models / Database structure
* [Thibaut Fourneaux](https://github.com/FourneauxThibaut)  : &nbsp; Project manager / Router / Middleware / MVC foundations
* [Zaccaria Tabi](https://github.com/tbzaccaria)  : &nbsp; 
Template / Web design / HTML / CSS

## Organisation

### **Database structure**
         
![Alt text](./assets/COGIP-db.png) 
<details>
  <summary>MVC structure</summary>

```

    .
    ├── Controller/                     # Controller folder
    │   ├── Controller.php              # Parent class
    │   ├── companyController.php
    │   ├── globalController.php
    │   ├── invoiceController.php
    │   ├── peopleController.php
    │   ├── userController.php
    │   └── Validation.php              # Form validator
    │
    ├── Model/                          # Controller model
    │   ├── cogip_db.sql
    │   ├── companyModel.php
    │   ├── globalModel.php             # Homepage model
    │   ├── InvoiceModel.php
    │   ├── peopleModel.php
    │   └── require.php                 # Database connection
    │
    ├── public/                         # Public folder
    │   ├── assets/
    │   │   ├── css/ 
    │   │   │   └── style.css   
    │   │   └── js/                     # Not used
    │   └── storage/
    │       └── cogip-logo.svg   
    │
    ├── Route/                          # Router folder
    │   ├── Config
    │   ├── Route.php                   # Route class & middleware
    │   ├── Router.php                  # Router logic
    │   └── web.php
    │
    ├── vendor/                         # [! Gitignore] install with composer install
    │
    ├── View/                           # Views folder
    │   ├── company/
    │   │   ├── create.php
    │   │   ├── edit.php
    │   │   ├── index.php
    │   │   └── show.php
    │   │    
    │   ├── error/                      # Errors folder
    │   │   ├── 404.php
    │   │   └── access_denied.php
    │   │    
    │   ├── invoice/
    │   │   ├── create.php
    │   │   ├── edit.php
    │   │   ├── index.php
    │   │   └── show.php
    │   │    
    │   ├── layout/                     # Template folder
    │   │   ├── template.php
    │   │   └── admin_template.php
    │   │    
    │   ├── people/
    │   │   ├── create.php
    │   │   ├── edit.php
    │   │   ├── index.php
    │   │   └── show.php
    │   │    
    │   ├── user/
    │   │   ├── create.php
    │   │   ├── edit.php
    │   │   ├── index.php
    │   │   └── show.php
    │   └── index.php                   # Homepage
    │
    ├── .env                            # [! Gitignore] duplicated from .env.example
    ├── .env.example
    ├── .gitignore
    ├── .htaccess                       # Redirection logic
    ├── composer.json                   # Composer dependency list
    ├── composer.lock
    ├── index.php                       # Main loader application
    └── README.md                       # --[*Your are here*]--
    .
 
```
</details> 

### **Router** &nbsp;

A new router is executed via the "web.php" file & defines all the routes using a path, a controller and a method. 
the loader method will execute the middleware and the redirection
 
example of use:  
```
router = new Router($url);
router->add('about', 'controller@method')
router->loader();
```

### **Final**

<p align="center">
  <img width="100%" height="auto" src="./assets/Cogip-invoices.png" alt="Cogip invoices">
</p>

## Technologies
&nbsp;
Project is created with:
* PHP version 7.4.9
* MySQL 8.0.21
* HTML 5
* CSS 3
	
## Setup

  **Import your Database before the following operations**

To run this project, install the dependencies using Composer Install :

```
$ cd COGIP_Accounting 
$ Composer install
$ php -S localhost:8080
```

To establish database connection, you can either create a new ".Env" file or modify the existing one.


<p align="right">[<a href="#top">back to top</a>]</p>                                    