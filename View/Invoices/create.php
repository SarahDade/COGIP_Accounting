<?php
    require '../../Model/require.php';
    require '../../controller/Validation.php';    

    $requestCompany = $bdd -> query('SELECT * FROM company');
    
    $requestPeople = $bdd -> query('SELECT * FROM people');



    if(isset($_POST['submit'])){
        
        if(!empty($_POST['invoice_date'])){

            $invoice_date = $_POST['invoice_date'];
            $company_id = $_POST['company_id'];
            $people_id = $_POST['people_id'];

            // sanitize
            $validation = new validate();

            //Request
            $request = $bdd -> prepare('INSERT INTO invoice (invoice_date, company_id, people_id) VALUES(?, ?, ?)');

            $request -> execute(array(
                $invoice_date,
                $company_id,
                $people_id
            ));

            var_dump($company_id);
            var_dump($people_id);
            
            // echo "<script> alert(\"Your invoices is create\")</script>";

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

        <input type="date" name="invoice_date">

        <select name="company_id">
            <?php while($dataCompany = $requestCompany -> fetch()){?>

                <option name="<?php echo $dataCompany['company_name'];?>" value="<?php echo $dataCompany['company_id']; ?>"> <?php echo $dataCompany['company_name'];?> </option>

            <?php }?>
                 
        </select>

        <select name="people_id">
            <?php while($dataPeople = $requestPeople -> fetch()){?>

                <option name="<?php echo $dataPeople['firstname'];?>" value="<?php echo $dataPeople['people_id'] ?>"><?php echo $dataPeople['email'];?></option>

            <?php }?>
            
        </select>

        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>