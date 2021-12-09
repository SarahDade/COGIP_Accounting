
<?php

require("model.php");


    function get_all_clients ()

    {
        $connexion=connect_db();
        $clients=Array();
        $sql = "SELECT company_name,vat_number,country 
        FROM company JOIN checkouts ON company.company_id = checkouts.company_id  WHERE type_id = 1";

        foreach ($connexion->query($sql) as $row)
        {
            $clients[]=$row;
        }

        return $clients;
    }

    
  // TO PUT IN CONTROLLER => to check by thibaut //

  require 'modele.php';

  $clients = get_all_clients();

  require 'templates/listamis.php';


?>