<?php
    require '../../Model/require.php';

    $request = $bdd -> query('SELECT * FROM company WHERE company_id='. $_GET['company_id']);
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

        <input type="hidden" name="company_id" value="<?php echo $data['company_id']; ?>">

        <input type="text" name="company_name" placeholder="Name" value="<?php echo $data['company_name'];?>">

        <input type="text" name="VAT_number" placeholder="T.V.A" value="<?php echo $data['VAT_number'];?>">

        <input type="text" name="country" placeholder="Country" value="<?php echo $data['country'];?>">
    
        <input type="submit" name="submitUpdate" value="Submit">
    </form>

</body>
</html>
