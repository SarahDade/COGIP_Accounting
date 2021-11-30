<?php
    require 'People.php';
    require 'delete.php';

    $request = $bdd -> query('SELECT * FROM people ORDER BY firstname ASC');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People table</title>
</head>
<body>
    <h1>Contact Page</h1>
    <table border='1px solid black'>
        <tr>
            <td>
                Firstname
            </td>
            <td>
                Surname
            </td>
            <td>
                Email
            </td>
            <td>
                Delete
            </td>
        </tr>
            <?php
                while($data = $request -> fetch()){
            ?>
                <form action="" method="POST">

                    <tr>
                        <td>
                            <a href="./peopleDetails.php" value =<?php echo $data['id']?>><?php echo $data['firstname'];?></a>
                        </td>
                        
                        <td>
                            <?php echo $data['surname'];?>
                        </td>
                        
                        <td>
                            <?php echo $data['email'];?>
                        </td>
                        
                        <td>
                            <!-- delete -->
                            <input type="hidden" name="id" value=<?php echo $data['id'];?>>
                            <input type="submit" name="del" value="delete">
                        </td>
                    </tr> 
                </form>
                <?php
                }
                ?>
        </tr>
    </table>
</body>
</html>