<?php
    require '../../Model/require.php';
    require '../../controller/Validation.php';

    if(isset($_POST['submit'])){

        if(!empty($_POST['company_name']) AND !empty($_POST['VAT_number']) AND !empty($_POST['country'])){

            $company_name = $_POST['company_name'];
            $VAT_number = $_POST['VAT_number'];
            $country = $_POST['country'];

            $validation = new validate();
            $validation->string($company_name);
            // validation tva string and number don't know how to do this
            $validation->string($country);

            // check name
            $request = $bdd -> prepare('INSERT INTO company(company_name, VAT_number, country) VALUES(?, ?, ?)');

            $request -> execute(array(
                $company_name,
                $VAT_number,
                $country
            ));

            
            echo "<script>alert(\"Your company is create\")</script>";
        }
        else{
            echo "No way";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create company</title>
</head>
<body>
    <h1>Create company</h1>
    <ul>
        <li>
            <a href="index.php">Company page</a>
        </li>
    </ul>
    <form action="" method="POST">
        <input type="text" name="company_name" placeholder="Name company">
        <input type="text" name="VAT_number" placeholder="T.V.A">
        <input type="text" name="country" placeholder="Country">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
