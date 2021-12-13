
<?php

require("require.php");


    //      ┌─────────┐
    //      │  INDEX  │
    //      └─────────┘


    function get_lastInvoices() {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
        $sql = $bdd -> query("SELECT * FROM invoice JOIN company ON invoice.company_id = company.id
        ORDER BY invoice_date desc limit 5");

        return $lastInvoices = $sql -> fetchAll();

    }

    function get_lastContacts() {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
        $sql = $bdd -> query("SELECT * FROM people JOIN company ON people.company_id = company.id 
                                                   JOIN invoice ON people.id = invoice.people_id 
                                        ORDER BY invoice_date desc limit 5");

        return $lastContacts = $sql -> fetchAll();

    }

    function get_lastCompanies() {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
        $sql = $bdd -> query("SELECT * from company JOIN invoice ON company.id = invoice.company_id 
                                                    JOIN checkouts ON company.id = checkouts.company_id 
                                                    JOIN type ON checkouts.type_id = type.id 
                                        ORDER BY invoice_date desc limit 5");

        return $lastCompanies = $sql -> fetchAll();

    }

