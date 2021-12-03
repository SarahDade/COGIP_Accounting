<?php
    require '../../Model/People/People.php';
    require '../../controller/Validation.php';

    if(isset($_POST['submit'])){

        if(!empty($_POST['name']) AND !empty($_POST['VATnumber']) AND !empty($_POST['country'])){

            $name = $_POST['name'];
            $VATnumber = $_POST['VATnumber'];
            $country = $_POST['country'];

            $validation = new validate();
            $validation->string($name);
            // validation tva string and number don't know how to do this
            $validation->string($country);

            // check name
            $request = $bdd -> prepare('INSERT INTO company(name, VATnumber, country) VALUES(?, ?, ?)');

            $request -> execute(array(
                $name,
                $VATnumber,
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
        <input type="text" name="name" placeholder="Name country">
        <input type="text" name="VATnumber" placeholder="T.V.A">
        <input type="text" name="country" placeholder="Country">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
