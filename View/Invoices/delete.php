<?php

    if(isset($_POST['delete'])){
        
        $companies = $_POST['companies'];
        $types = $_POST['types'];
        $invoicesNumber = $_POST['invoicesNumber'];
        $dates = $_POST['dates'];

        $request = $bdd -> prepare('DELETE FROM Invoices WHERE id =' .$_POST['id']);

        $request -> execute(array(
            $companies,
            $types,
            $invoicesNumber,
            $dates
        ));
    }
?>