<?php
    require '../People.php';
    require 'delete.php';

    //----------------------------- UPDATE -----------------------------// 
    if(isset($_POST['companies']) AND isset($_POST['types']) AND isset($_POST['invoicesNumber']) AND isset($_POST['dates'])){

        $request = $bdd->prepare("UPDATE Invoices SET companies = :companies, types = :types, invoicesNumber = :invoicesNumber, dates = :dates WHERE id = :id");

        $request -> execute(array(
            'companies' => $_POST['companies'],
            'types' => $_POST['types'],
            'invoicesNumber' => $_POST['invoicesNumber'],
            'dates' => $_POST['dates'],
            'id' => $_POST['id']
        ));
    }
    else{
        echo "no way";
    }

    $request = $bdd->query('SELECT * FROM Invoices ORDER BY dates DESC'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices page</title>
</head>
<body>
    <h1>Invoices page</h1>
    <ul>
        <li>
            <a href="create.php">Create invoices</a>
        </li>
    </ul>
    <table border="1">
        <tr>
            <td>
                Company
            </td>
            <td>
                Type
            </td>
            <td>
                Invoices
            </td>
            <td>
                Date
            </td>
            <td>
                Delete
            </td>
            <td>
                Update
            </td>

            <?php while($data = $request -> fetch()){?>
                <form action="" method="POST" value="form-"<?php echo $data['id']?>>
                    <tr>
                        <td>
                            <a href=""><?php echo $data['companies'];?></a>
                        </td>
                        <td>
                            <?php echo $data['types'];?>
                        </td>
                        <td>
                            <?php echo $data['invoicesNumber'];?>
                        </td>
                        <td>
                            <?php echo $data['dates'];?>
                        </td>
                        <td>
                            <input type="hidden" name="id" value=<?php echo $data['id'];?>>
                            <input type="submit" name="delete" value="delete">
                        </td>
                        <td>
                            <a href="update.php?id=<?php echo $data['id'];?>">Update</a>
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