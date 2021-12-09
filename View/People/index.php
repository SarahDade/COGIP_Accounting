<?php
    require '../../Model/require.php';
    require 'delete.php';

    // Update
    if(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['email'])){

        $request = $bdd -> prepare('UPDATE people SET firstname = :firstname, lastname = :lastname, email = :email WHERE people_id = :people_id');

        $request -> execute(array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'people_id' => $_POST['people_id']
        ));
    }

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
    <ul>
        <li>
            <a href="./create.php">Create contact</a> 
        </li>
    </ul>
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
            <td>
                Update
            </td>
        </tr>
            <?php
                while($data = $request -> fetch()){
            ?>
                <form action="" method="POST" name=form-<?php echo data['people_id'] ?>>

                    <tr>
                        <td>
                            <a href="./peopleDetails.php" value =<?php echo $data['people_id']?>><?php echo $data['firstname'];?></a>
                        </td>

                        <td>
                            <?php echo $data['lastname'];?>
                        </td>

                        <td>
                            <?php echo $data['email'];?>
                        </td>

                        <td>
                            <!-- delete -->
                            <input type="hidden" name="people_id" value=<?php echo $data['people_id'];?>>
                            <input type="submit" name="del" value="delete">
                        </td>
                        <td>
                            <!-- Update -->
                            <a href="update.php?people_id=<?php echo $data['people_id']; ?>">Update</a>
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