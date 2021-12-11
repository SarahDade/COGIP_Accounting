<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../Route/config');
$dotenv->load();

require (__DIR__ . "./Controller.php");

class companyController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
public function index() {
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/model.php");

    $clients = get_all_clients();
    $providers = get_all_providers();
    
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/index.php"); 
}

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show($id) {

        $requestCompany = $bdd -> query('SELECT * FROM company WHERE company_id =' .$id);
        $data = $requestCompany -> fetch();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/show.php"); 
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        
        $requestCompanyType = $bdd -> query('SELECT * FROM company join checkouts on company.id = checkouts.company_id 
        join type on checkouts.type_id = type.id');
        // join type and not checkouts
        $data = $requestCompanyType -> fetchAll(PDO::FETCH_ASSOC);

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/company/create.php"); 
    }

//      ┌─────────┐
//      │  STORE  │
//      └─────────┘
public function store() {
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Controller/Validation.php");

        echo '<pre>';
        var_dump($_POST);
        // die();
    if(isset($_POST['submit'])){

        if(!empty($_POST['company_name']) AND !empty($_POST['VAT_number']) AND !empty($_POST['country'])){

            $company_name = $_POST['company_name'];
            $VAT_number = $_POST['VAT_number'];
            $country = $_POST['country'];
            $type = $_POST['type'];

            // check name
            $request = $bdd -> prepare('INSERT INTO company(company_name, VAT_number, country) VALUES(?, ?, ?)');

            $request -> execute(array(
                $company_name,
                $VAT_number,
                $country,
            ));
            $lastId = $bdd->lastInsertId();


            $request = $bdd -> prepare('INSERT INTO checkouts(company_id, type_id) VALUES(?, ?)');
            
            $request -> execute(array(
                $lastId,
                $type
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
                'country' => $_POST['country']
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
