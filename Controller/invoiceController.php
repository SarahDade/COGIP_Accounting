<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../Route/config');
$dotenv->load();

require (__DIR__ . "./Controller.php");

class invoiceController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {        
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd->query('SELECT * FROM invoice ORDER BY invoice_date DESC'); 

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/index.php"); 
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show($id) {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/show.php"); 
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/create.php"); 
    }

//      ┌─────────┐
//      │  STORE  │
//      └─────────┘
public function store() {
    echo 'You need to create the store method to the current view !';
}

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit($id) {
        
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd -> query('SELECT * FROM invoice WHERE invoice_id='. $_GET['invoice_id']);
        $data = $request -> fetch();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/edit.php"); 
    }

//      ┌──────────┐
//      │  UPDATE  │
//      └──────────┘
    public function update($id) {
                
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        if(isset($_POST['invoice_date'])){

            $request = $bdd->prepare("UPDATE invoice SET invoice_date = :invoice_date WHERE invoice_id = :invoice_id");
    
            $request -> execute(array(
                'invoice_date' => $_POST['invoice_date'],
                'invoice_id' => $_POST['invoice_id']
            ));
        }
        header('Location: ../../invoice');
    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
    public function delete($id) {
        
        if(isset($_POST['delete'])){
            
            try{
                require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
                $request = $bdd -> prepare('DELETE FROM invoice WHERE invoice_id = $id');

                $request -> execute(array(
                    $invoice_date
                ));
            }
            catch(Exception $e){

                die('Error : '.$e->getMessage());
            }
        }
        header('Location: ../../invoice');
    }
}
