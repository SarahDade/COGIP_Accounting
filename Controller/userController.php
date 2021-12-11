<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../Route/config');
$dotenv->load();

require (__DIR__ . "./Controller.php");

class userController extends Controller{
    
//      ┌─────────┐
//      │  index  │
//      └─────────┘
    public function index() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/user/index.php"); 
    }

//      ┌────────┐
//      │  show  │
//      └────────┘
    public function show($id) {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/user/show.php"); 
    }

//      ┌─────────┐
//      │  login  │
//      └─────────┘
    public function login() {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/user/login.php"); 
    }

//      ┌───────────┐
//      │  connect  │
//      └───────────┘
    public function connect() {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = array();
    
        if(isset($_POST['submit'])){
            
            if(!empty($email) AND !empty($password)){
    
                $requser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND `password` = ?");
                $requser->execute(array(
                    $email,
                    $password
                ));
                $userexist = $requser->rowCount();
    
                if($userexist == 1 ){
    
                    $userinfo = $requser->fetch();
                    $_SESSION['user_id'] = $userinfo['id'];
                    $_SESSION['email'] = $userinfo['email'];
                    $_SESSION['right_access'] = $userinfo['right_access'];
                    
                    switch ($userinfo['right_access']) {
                        case 2:
                            header('Location: ./');
                            break;
                        case 3:
                            require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/index.php"); 
                            break;
                        default:
                            header('Location: ./');
                            break;
                    }
                }
                else{
                    array_push($errors, "Mail or Password are incorrect");
                    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/user/login.php"); 
                }
            }
            if(empty($email)){
                array_push($errors, "Mail must be completed");
                require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/user/login.php"); 
            }
            if(empty($password)){
                array_push($errors, "Password must be completed");
                require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/user/login.php"); 
            }
        }
    }

//      ┌──────────┐
//      │  logout  │
//      └──────────┘
    public function logout() {
        
        $_SESSION = array();
        session_destroy();

        header('Location: ./');
    }
}