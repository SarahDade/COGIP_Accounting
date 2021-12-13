
<?php

require("require.php");


    //      ┌─────────┐
    //      │  INDEX  │
    //      └─────────┘


        function get_all_invoices () {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
        $sql = $bdd -> query("SELECT * from invoice join people on people.id = invoice.people_id
                                                    join company on invoice.company_id = company.id 
                                                    join checkouts on company.id = checkouts.company_id 
                                                    join type on checkouts.type_id = type.id");

        return $invoices = $sql -> fetchAll();

        }


    //      ┌────────┐
    //      │  SHOW  │
    //      └────────┘


        function get_invoice ($id) {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
        $sql = $bdd -> query("SELECT * from invoice join company on invoice.company_id = company.id 
                                                    join checkouts on company.id = checkouts.company_id 
                                                    join type on checkouts.type_id = type.id
                                                    WHERE invoice.id =$id");

        return $invoice = $sql -> fetch();

        }

        
        function get_contactInvoice ($id) {

        require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
        $sql = $bdd -> query ("SELECT * from invoice join people on invoice.people_id = people.id 
                                                    WHERE invoice.id =$id");

        return $contactInvoice = $sql -> fetch();

        }

        