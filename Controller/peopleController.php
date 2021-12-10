<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../Route/config');
$dotenv->load();

require (__DIR__ . "./Controller.php");


class peopleController extends Controller{

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index() {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd -> query('SELECT * FROM people ORDER BY firstname ASC');
        $dataPeople = $request -> fetchAll();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/index.php"); 
    }

//      ┌────────┐
//      │  SHOW  │
//      └────────┘
    public function show($id) {
        
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd -> query('SELECT * FROM people WHERE people_id=' .$id);
        $data = $request -> fetch();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/show.php"); 
    }

//      ┌──────────┐
//      │  CREATE  │
//      └──────────┘
    public function create() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        $requestPeople = $bdd -> query('SELECT * FROM company'); 
        
        $dataPeoples = $requestPeople -> fetchAll();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/create.php"); 
    }

//      ┌─────────┐
//      │  STORE  │
//      └─────────┘
    public function store() {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Controller/Validation.php");

        $requestPeople = $bdd -> query('SELECT * FROM company');

        if(isset($_POST['submit'])){
            if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email'])){

                $firstname = $_POST['firstname']; 
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $company_id = $_POST['company_id'];
                
                $request = $bdd -> prepare('INSERT INTO people(firstname, lastname, email, company_id) VALUES(?, ?, ?, ?)');
        
                $request -> execute(array(
                    $firstname,
                    $lastname,
                    $email,
                    $company_id
                ));

                header('Location: ../people');
            }
            else{
                // need to create an error/message system for this
                header('Location: ../people/create');
            }
        }
        // need to create an error/message system for this
        header('Location: ../people');
    }

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit($id) {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd -> query('SELECT * FROM people WHERE people_id=' .$id);
        $data = $request -> fetch();

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/people/edit.php"); 
    }

//      ┌──────────┐
//      │  UPDATE  │
//      └──────────┘
    public function update($id) {
        
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $request = $bdd -> query('SELECT * FROM people WHERE people_id=' .$id);
        $data = $request -> fetch();
        

        // Update
        if(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['email'])){

            $request = $bdd -> prepare('UPDATE people SET firstname = :firstname, lastname = :lastname, email = :email WHERE people_id = :people_id');

            $request -> execute(array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'people_id' => $_POST['people_id']
            ));
        }

        header('Location: ../../people');
    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
    public function delete($id) {   
        
        if( isset($_POST['del']) ){

            try{
                require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
                $request = $bdd -> prepare('DELETE FROM people WHERE people_id ='. $id);
            
                $request -> execute(array(
                    $people_id,
                    $firstname,
                    $lastname,
                    $email
                ));
            }
            catch(Exception $e){

                die('Error : '.$e->getMessage());
            }
        }
        header('Location: ../../people');
    }
}
