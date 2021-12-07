<?php

    if(isset($_POST['del'])){
        
        $people_id = $_POST['people_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];

        
        $request = $bdd -> prepare("DELETE FROM people WHERE people_id = " .$_POST['people_id']);

        $request -> execute(array(
            $people_id,
            $firstname,
            $lastname,
            $email
        ));
    }
?>