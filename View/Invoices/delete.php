<?php

    if(isset($_POST['delete'])){
        
        $invoice_date = $_POST['invoice_date'];

        $request = $bdd -> prepare('DELETE FROM invoice WHERE invoice_id =' .$_POST['invoice_id']);

        $request -> execute(array(
            $invoice_date
        ));
    }
?>