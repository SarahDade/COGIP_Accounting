<?php
    require '../../Model/require.php';

    $request = $bdd -> query('SELECT * FROM people WHERE people_id=' .$_GET['people_id']);
    $data = $request -> fetch();
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

    <form action="index.php" method="POST">

        <input type="hidden" name="people_id" value="<?php echo $data['people_id'] ;?>">

        <input type="text" name="firstname" placeholder="firstname" value="<?php echo $data['firstname'];?>">

        <input type="text" name="lastname" placeholder="lastname" value="<?php echo $data['lastname'];?>">

        <input type="email" name="email" placeholder="email" value="<?php echo $data['email'];?>">
        
        <input type="submit" name="submitUpdate" value="submit">

    </form>
</body>
</html>