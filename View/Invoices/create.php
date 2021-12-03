<?php
    require '../People.php';
    require '../controller/Validation.php';

    if(isset($_POST['submit'])){
        
        if(!empty($_POST['companies']) AND !empty($_POST['types']) AND !empty($_POST['invoicesNumber']) AND !empty($_POST['dates'])){

            $companies = $_POST['companies'];
            $types = $_POST['types'];
            $invoicesNumber = $_POST['invoicesNumber'];
            $dates = $_POST['dates'];

            // sanitize
            $validation = new validate();
            $validation->string($companies);
            $validation->string($types);
            // $validation->($invoicesNumber) don't know how
            

            $request = $bdd -> prepare('INSERT INTO Invoices (companies, types, invoicesNumber, dates) VALUES(?, ?, ?, ?)');

            $request -> execute(array(
                $companies,
                $types,
                $invoicesNumber,
                $dates
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
        <input type="text" name="companies" placeholder="Company">
        <input type="text" name="types" placeholder="Type">
        <input type="text" name="invoicesNumber" placeholder="Invoices Number">
        <input type="date" name="dates" placeholder="Date">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>