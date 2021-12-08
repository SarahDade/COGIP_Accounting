<?php
    session_start();
    require '../Model/require.php';

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    if(isset($_POST['submit'])){

        if(isset($mail) AND !empty($mail) AND isset($password) AND !empty($password)){

            // ------------------------|
            // check if the user existe|
            // ------------------------|
            $requser = $bdd -> prepare('SELECT * FROM user WHERE mail = ? AND `password` = ?');
            $requser -> execute(array(
                $mail,
                $password
            ));
            $userExist = $requser -> rowCount();

            if($userExist == 1){

            }
            else{
                echo 'Wrong ID';
            }
            
            // --------------|
            // if ID are good|
            // --------------|
            if($mail === "Jean-Christian@gmail.com" AND $password === "Ranu" ){

                $_SESSION['compteAdmin'] = $password;
                header('Location: admin.php');        
            }

            if($mail === "Muriel@gmail.com" AND $password === "Perrache"){

                $_SESSION['compteModerator'] = $password;
                header('Location: moderator.php');
            }

        }

        else{
            if(empty($mail)){
                echo "Mail is empty ";
            }
            if(empty($password)){
                echo "Password is empty ";
            }
        }
    }
    

    
?>