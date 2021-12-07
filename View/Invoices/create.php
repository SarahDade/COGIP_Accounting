<?php
    require '../../Model/require.php';
    require '../../controller/Validation.php';

    if(isset($_POST['submit'])){
        
        if(!empty($_POST['invoice_date'])){

            $invoice_date = $_POST['invoice_date'];

            // sanitize
            $validation = new validate();

            $request = $bdd -> prepare('INSERT INTO invoice (invoice_date) VALUES(?)');

            $request -> execute(array(
                $invoice_date
            ));

            echo "<script> alert(\"Your invoices is create\")</script>";

        }

        else{
            echo "no way";
        }  
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create page</title>
</head>
<body>

    <h1>Create invoices</h1>
    <ul>
        <li>
            <a href="index.php">Invoices page</a>
        </li>
    </ul>

    <form action="" method="POST">
        <input type="date" name="invoice_date" placeholder="Date">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>