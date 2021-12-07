<?php
    
    if(isset($_POST['del'])){
        
        $company_name = $_POST['company_name'];
        $VATnumber = $_POST['VATnumber'];
        $country = $_POST['country'];

        $request = $bdd -> prepare('DELETE FROM company WHERE company_id =' .$_POST['company_id']);

        $request -> execute(array(
            $company_name,
            $VATnumber,
            $country
        ));
    }
