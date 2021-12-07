<?php
    require '../../Model/require.php';
    require 'delete.php';

    //----------------------------- UPDATE -----------------------------// 
    if(isset($_POST['invoice_date'])){

        $request = $bdd->prepare("UPDATE invoice SET invoice_date = :invoice_date WHERE invoice_id = :invoice_id");

        $request -> execute(array(
            'invoice_date' => $_POST['invoice_date'],
            'invoice_id' => $_POST['invoice_id']
        ));
    }

    $request = $bdd->query('SELECT * FROM invoice ORDER BY invoice_date DESC'); 
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
                Date
            </td>
            <td>
                Delete
            </td>
            <td>
                Update
            </td>

            <?php while($data = $request -> fetch()){?>
                <form action="" method="POST" value="form-"<?php echo $data['invoice_id']?>>
                    <tr>
                        <td>
                            <?php echo $data['invoice_date'];?>
                        </td>
                        <td>
                            <input type="hidden" name="invoice_id" value=<?php echo $data['invoice_id'];?>>
                            <input type="submit" name="delete" value="delete">
                        </td>
                        <td>
                            <a href="update.php?invoice_id=<?php echo $data['invoice_id'];?>">Update</a>
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