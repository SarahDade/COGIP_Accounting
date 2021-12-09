<?php
    session_start();
    require '../Model/require.php';

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
                $_SESSION['user_id'] = $userinfo['user_id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                $_SESSION['right_access'] = $userinfo['right_access'];

                if($userinfo['right_access'] == 1){
                    header("Location: admin.php");
                }
                if($userinfo["right_access"] == 2){
                    header("Location: admin.php");
                }
            }
            else{
                array_push($errors, "Wrong id");
            }
        }
        if(empty($email)){
            array_push($errors, "Mail must be completed");
        }
        if(empty($password)){
            array_push($errors, "Password must be completed");
        }
    }
    

    function display_error(){
        global $errors;

        if(count($errors) > 0){
            echo '<div class="error">';
            
            foreach($errors as $error){
                echo $error .'<br>';
            }
            echo '</div>';
        }
    }
?>