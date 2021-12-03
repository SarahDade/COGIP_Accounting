<?php
    
    if(isset($_POST['del'])){
        
        $name = $_POST['name'];
        $VATnumber = $_POST['VATnumber'];
        $country = $_POST['country'];

        $request = $bdd -> prepare('DELETE FROM company WHERE id =' .$_POST['id']);

        $request -> execute(array(
            $name,
            $VATnumber,
            $country
        ));
    }
