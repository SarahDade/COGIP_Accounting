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

        $requestInvoice = $bdd->query('SELECT * FROM invoice ORDER BY invoice_date DESC'); 
        $requestPeople = $bdd->query('SELECT * FROM people'); 
        $requestCompany = $bdd -> query('SELECT * FROM company'); 

        $dataInvoice = $requestInvoice -> fetchAll();
        $dataPeoples = $requestPeople -> fetchAll();
        $dataCompany = $requestCompany -> fetchAll();  

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

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $requestPeople = $bdd->query('SELECT * FROM people'); 
        $requestCompany = $bdd -> query('SELECT * FROM company'); 

        $dataPeoples = $requestPeople -> fetchAll();
        $dataCompany = $requestCompany -> fetchAll();      
        
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/invoice/create.php"); 
    }

//      ┌─────────┐
//      │  STORE  │
//      └─────────┘
public function store() {
    
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Controller/Validation.php");
    
    if(isset($_POST['submit'])){
        if(!empty($_POST['invoice_date'])){

            $invoice_date = $_POST['invoice_date'];
            $company_id = $_POST['company_id'];
            $people_id = $_POST['people_id'];

            echo '<pre>';
            var_dump($_POST);
            echo '</pre>';
            echo '<hr>';

            $request = $bdd -> prepare('INSERT INTO invoice (invoice_date, company_id, people_id) VALUES(?, ?, ?)');

            echo '<pre>';
            var_dump($request);
            echo '</pre>';
            // die();


            $request -> execute(array(
                $invoice_date,
                $company_id,
                $people_id
            ));
        
            header('Location: ../invoice');

        }
        else{
            // need to create an error/message system for this
            header('Location: ../invoice/create');
        }  
    }
    else{
        // need to create an error/message system for this
        header('Location: ../invoice/create');
    }
    header('Location: ../invoice');
}

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit($id) {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd -> query('SELECT * FROM invoice WHERE invoice_id='. $id);
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

        echo '<pre>';
        var_dump($_POST);
        echo '</pre><br><br>';
        var_dump($id);

        // die();

        if(isset($_POST['del'])){
            try{
                require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
                $request = $bdd -> prepare('DELETE FROM invoice WHERE invoice_id ='. $id);

                $request -> execute(array(
                    $invoice_id,
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