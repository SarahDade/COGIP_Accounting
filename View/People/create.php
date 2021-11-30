<?php
    require '../../Model/People';
    require './controller/Validation.php';

    if(isset($_POST['submit'])){

        if(!empty($_POST['firstname']) AND !empty($_POST['surname']) AND !empty($_POST['email'])){

            $firstname = $_POST['firstname']; 
            $surname = $_POST['surname'];
            $email = $_POST['email'];

            $validation = new Validate();
            $validation->string($firstname);
            $validation->string($surname);
            $validation->email($email);

            
            $request = $bdd -> prepare('INSERT INTO people(firstname, surname, email) VALUES(?, ?, ?)');
    
            $request -> execute(array(
                $firstname,
                $surname,
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
        <li>
            <a href="./update.php">Update contact</a>
        </li>
    </ul>
    <form action="" method="POST">

        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="surname" placeholder="surname">
        <input type="email" name="email" placeholder="email">
        <input type="submit" name="submit" value="submit">

    </form>
</body>
</html>