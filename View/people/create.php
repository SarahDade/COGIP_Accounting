<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../../Route/config');
$dotenv->load();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");

$requestPeople = $bdd -> query('SELECT * FROM company'); 
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

    <ul>
        <li>
            <a href="../people">Contact page</a>
        </li>
    </ul>
    <form action="./store" method="POST">

        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="email" name="email" placeholder="email">

        <select  name="company_id">
            <?php while($dataPeople = $requestPeople -> fetch()){?>
                
                <option name="<?php echo $dataPeople['company_name'];?>" value="<?php echo $dataPeople['company_id']; ?>"> <?php echo $dataPeople['company_name'];?> </option>

            <?php }?>
        </select>
        
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
