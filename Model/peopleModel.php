
<?php

require("require.php");

        
    //      ┌─────────┐
    //      │  INDEX  │
    //      └─────────┘

        function get_all_contacts () {
        
            require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    
            $sql = $bdd -> query("SELECT *  FROM people JOIN company ON people.company_id = company.id");

            return $contacts = $sql -> fetchAll();
        
        }

    //      ┌────────┐
    //      │  SHOW  │
    //      └────────┘
        
        function get_contact ($id) {

            require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
          
            $sql = $bdd -> query("SELECT *  FROM people JOIN company ON people.company_id = company.id WHERE people.id = $id");

            return $contact = $sql -> fetch();

        }

        
        function get_contactInvoices ($id) {

          require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

          $sql = $bdd -> query("SELECT *  FROM people LEFT OUTER JOIN invoice ON people.id = invoice.people_id WHERE people.id = $id");

          return $Invoices_contact = $sql -> fetchAll();

      }
