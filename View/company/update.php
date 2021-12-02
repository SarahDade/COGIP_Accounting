<?php
    require '../../Model/People/People.php';

    $request = $bdd -> query('SELECT * FROM company WHERE id='. $_GET['id']);
    $data = $request -> fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update company</title>
</head>
<body>
    
    <h1>Update company</h1>
    <ul>
        <li>
            <a href="create.php">Create company</a>
        </li>
        <li>
            <a href="index.php">Company Page</a>
        </li>
    </ul>
    
    <form action="index.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <input type="text" name="name" placeholder="Name" value="<?php echo $data['name'];?>">

        <input type="text" name="VATnumber" placeholder="T.V.A" value="<?php echo $data['VATnumber'];?>">

        <input type="text" name="country" placeholder="Country" value="<?php echo $data['country'];?>">
    
        <input type="submit" name="submitUpdate" value="Submit">
    </form>

</body>
</html>
