<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../Route/config');
$dotenv->load();

require (__DIR__ . "./Controller.php");

class companyController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $requestCompany = $bdd -> query('SELECT * FROM company ORDER BY company_name ASC');
        $dataCompany = $requestCompany -> fetchAll();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/index.php"); 
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show($id) {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/show.php"); 
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/create.php"); 
    }

//      ┌─────────┐
//      │  STORE  │
//      └─────────┘
public function store() {
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Controller/Validation.php");

    if(isset($_POST['submit'])){

        if(!empty($_POST['company_name']) AND !empty($_POST['VAT_number']) AND !empty($_POST['country'])){

            $company_name = $_POST['company_name'];
            $VAT_number = $_POST['VAT_number'];
            $country = $_POST['country'];

            $validation = new validate();
            $validation->string($company_name);
            // validation tva string and number don't know how to do this
            $validation->string($country);

            // check name
            $request = $bdd -> prepare('INSERT INTO company(company_name, VAT_number, country) VALUES(?, ?, ?)');

            $request -> execute(array(
                $company_name,
                $VAT_number,
                $country
            ));

            
            header('Location: ../company');
        }
        else{
            header('Location: ../company/create');
        }
    }
    header('Location: ../company');
    
}

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit($id) {
    
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd -> query('SELECT * FROM company WHERE company_id='. $id);
        $data = $request -> fetch();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/edit.php"); 
    }

//      ┌──────────┐
//      │  UPDATE  │
//      └──────────┘
    public function update($id) {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");


        if(isset($_POST['company_name']) AND isset($_POST['VAT_number']) AND isset($_POST['country'])){
            
            $company_name = $_POST['company_name'];
            $tva = $_POST['VAT_number'];
            $country = $_POST['country'];

            $request = $bdd->prepare("UPDATE company SET company_name = :company_name, VAT_number = :VAT_number, country = :country WHERE company_id = $id");

            $request -> execute(array(
                'company_name' => $_POST['company_name'],
                'VAT_number' => $_POST['VAT_number'],
                'country' => $_POST['country'],
                'company_id' => $_POST['company_id']
            ));
        }
        header('Location: ../../company');

    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
    public function delete($id) {

        if(isset($_POST['del'])){
            
            try{
                require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
                $request = $bdd -> prepare('DELETE FROM company WHERE company_id =' .$id);
        
                $request -> execute(array(
                    $company_name,
                    $VATnumber,
                    $country
                ));
            }
            catch(Exception $e){

                die('Error : '.$e->getMessage());
            }
        }
        header('Location: ../../company');
    }
}
