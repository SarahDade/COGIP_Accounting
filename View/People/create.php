<?php
    require '../../Model/require.php';
    require '../../controller/Validation.php';

    if(isset($_POST['submit'])){

        if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email'])){

            $firstname = $_POST['firstname']; 
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            $validation = new Validate();
            $validation->string($firstname);
            $validation->string($lastname);
            $validation->email($email);

            
            $request = $bdd -> prepare('INSERT INTO people(firstname, lastname, email) VALUES(?, ?, ?)');
    
            $request -> execute(array(
                $firstname,
                $lastname,
                $email
            ));

            echo "<script>alert(\"Your contact is create\")</script>";
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
    <title>Add people</title>
</head>
<body>
    <h1>Create a new contact</h1>

    <ul>
        <li>
            <a href="./index.php">Contact page</a>
        </li>
    </ul>
    <form action="" method="POST">

        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="email" name="email" placeholder="email">
        <input type="submit" name="submit" value="submit">

    </form>
</body>
</html>
