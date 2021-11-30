<?php

    if(isset($_POST['del'])){
        
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];

        
        $request = $bdd -> prepare("DELETE FROM people WHERE id = " .$_POST['id']);

        $request -> execute(array(
            $id,
            $firstname,
            $surname,
            $email
        ));
    }
?>