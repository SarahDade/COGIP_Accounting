<?php
    session_start();
    if(!$_SESSION['compteAdmin']){
        header('Location: index.php');
    }

    require('logout.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu admin</title>
</head>
<body>
    <h1>Menu admin</h1>
    <ul>
        <li>
            <a href="../View/company/index.php">Company</a>
        </li>
        <li>
            <a href="../View/Invoices/index.php">Invoices</a>
        </li>
        <li>
            <a href="../View/People/index.php">People</a>
        </li>
    </ul>
    
    <form action="" method="POST">
        <input type="submit" name="disconnect" value="Disconnect">
    </form>
    
</body>
</html>