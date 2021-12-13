
<?php

    //      ┌─────────┐
    //      │  INDEX  │
    //      └─────────┘
    function get_all_clients ()

    {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        
        $sql = $bdd -> query ("SELECT * FROM company JOIN checkouts ON company.id = checkouts.company_id  WHERE type_id = 1");

        return $clients = $sql -> fetchAll();
    }

    
    function get_all_providers ()

    {
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        
        $sql = $bdd -> query ("SELECT * FROM company JOIN checkouts ON company.id = checkouts.company_id  WHERE type_id = 2");

        return $providers = $sql -> fetchAll();
    }


    //      ┌────────┐
    //      │  SHOW  │
    //      └────────┘
    function get_company ($id) {
     
        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

        $sql = $bdd -> query ("SELECT * FROM company JOIN people ON company.id = people.company_id 
                                      JOIN invoice ON people.id = invoice.people_id 
            where company.id = $id");

        return $company = $sql -> fetchAll();
    }

    function get_company_type ($id) {


        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
        
        $sql = $bdd -> query ("SELECT * FROM company JOIN checkouts ON company.id = checkouts.company_id 
        JOIN type ON checkouts.type_id = type.id 
        WHERE company.id = $id");

        return $company_type = $sql -> fetch();
    }



  