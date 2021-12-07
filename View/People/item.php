<?php
    require '../../Model/People';
    
    $request = $bdd -> query('SELECT * FROM people WHERE id = '. $_POST['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details <?php echo $data['firstname'];?></title>
</head>
<body>
    
<table border="1px solid black">
    <tr>
        <td>
            firstname
        </td>
        <td>
            surname
        </td>
        <td>
            email
        </td>
    </tr>
</table>
</body>
</html>