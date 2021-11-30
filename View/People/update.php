<?php
    require '../../Model/People';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update a contact</h1>
    <ul>
        <li>
            <a href="./index.php">Contact page</a>
        </li>
        <li>
            <a href="./create.php">Create contact</a>
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