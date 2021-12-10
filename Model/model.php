<?php

require (__DIR__ . "./require.php");

    function get_all_clients ()

    {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        $sql = $bdd -> query ("SELECT * FROM company JOIN checkouts ON company.company_id = checkouts.company_id  WHERE type_id = 1");

        return $clients = $sql -> fetchAll();
    }