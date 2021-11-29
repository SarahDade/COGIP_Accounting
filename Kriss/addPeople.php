<?php
    require 'require.php';

    if(isset($_POST['firstname']) AND isset($_POST['surname']) AND isset($_POST['email'])){
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];

        $request = $bdd -> prepare('INSERT INTO people(firstname, surname, email) VALUES(?, ?, ?)');

        $request -> execute(array(
            $firstname,
            $surname,
            $email
        ));
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
    <form action="addPeople.php" method="POST">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="surname" placeholder="surname">
        <input type="text" name="email" placeholder="email">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>