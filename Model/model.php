<?php

require (__DIR__ . "./require.php");

    
    function get_all_clients (){
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $sql = $bdd -> query ("SELECT * FROM company JOIN checkouts ON company.id = checkouts.company_id  WHERE type_id = 1");

        return $clients = $sql -> fetchAll();
    }


    function get_all_providers (){
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $sql = $bdd -> query ("SELECT * FROM company JOIN checkouts ON company.id = checkouts.company_id  WHERE type_id = 2");

        return $providers = $sql -> fetchAll();
    }