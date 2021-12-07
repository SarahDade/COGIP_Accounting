<?php
    require '../../Model/require.php';

    $request = $bdd -> query('SELECT * FROM invoice WHERE invoice_id='. $_GET['invoice_id']);
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

        <input type="hidden" name="invoice_id" value="<?php echo $data['invoice_id'];?>">

        <input type="text" name="invoice_date" placeholder="Date" value="<?php echo $data['invoice_date'];?>">

        <input type="submit" name="submitUpdate" value="Update">
    </form>
</body>
</html>