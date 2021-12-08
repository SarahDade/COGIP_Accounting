<?php
    session_start();
    if(!$_SESSION['compteModerator'] AND !$_SESSION['compteAdmin']){
        header('Location: index.php');
    }

    require 'logout.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu moderator</title>
</head>
<body>
    <h1>Menu moderator</h1>
    <ul>
        <li>
            <a href="">People menu</a>
        </li>
        <li>
            <a href="">Company menu</a>
        </li>
        <li>
            <a href="">Invoices menu</a>
        </li>
    </ul>
    
    <form action="" method="POST">
        <input type="submit" value="disconnect" name="disconnect">
    </form>
    
</body>
</html>