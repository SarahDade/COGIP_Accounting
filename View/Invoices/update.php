<?php
    require '../People.php';

    $request = $bdd -> query('SELECT * FROM Invoices WHERE id='. $_GET['id']);
    $data = $request -> fetch();
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update invoices</title>
</head>
<body>
    <h1>Update invoices</h1>
    <ul>
        <li>
            <a href="index.php">Invoices page</a>
        </li>
    </ul>

    <form action="index.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $data['id'];?>">

        <input type="text" name="companies" placeholder="Company" value="<?php echo $data['companies'];?>">

        <input type="text" name="types" placeholder="Type" value="<?php echo $data['types'];?>">

        <input type="text" name="invoicesNumber" placeholder="invoicesNumber" value="<?php echo $data['invoicesNumber'];?>">

        <input type="date" name="dates" placeholder="Date" value="<?php echo $data['dates'];?>">

        <input type="submit" name="submitUpdate" value="Update">
    </form>
</body>
</html>