<?php
    require 'People.php';

    if(isset($_POST['submit'])){

        if(!empty($_POST['firstname']) AND !empty($_POST['surname']) AND !empty($_POST['email'])){

            $firstname = htmlspecialchars($_POST['firstname']); 
            $surname = htmlspecialchars($_POST['surname']);
            $email = htmlspecialchars($_POST['email']);

            // Sanitize
            $sanit = array(
                'firstname' => FILTER_SANITIZE_STRING,
                'lastname' => FILTER_SANITIZE_STRING,
                'email' => FILTER_SANITIZE_EMAIL
            );

            $result = filter_input_array(INPUT_POST, $sanit);
            if($result != null AND $result != FALSE){
                echo "All fields have been cleaned";
            }
            else{
                echo "A fields is empty or is not correct";
            }
            //End sanitize

            
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

    <form action="" method="POST">

        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="surname" placeholder="surname">
        <input type="email" name="email" placeholder="email">
        <input type="submit" name="submit" value="submit">

    </form>
</body>
</html>