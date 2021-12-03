<?php
    require '../../Model/People/People.php';
    require 'delete.php';

        //----------------------------------------------------- UPDATE -----------------------------------------------------//
    if(isset($_POST['name']) AND isset($_POST['VATnumber']) AND isset($_POST['country'])){
        
        $names = $_POST['name'];
        $tva = $_POST['VATnumber'];
        $country = $_POST['country'];

        // $validationUpdate = new Validation();
        // $validationUpdate->string($names);
        // $validationUpdate->string($country);

        $request = $bdd->prepare("UPDATE company SET name = :name, VATnumber = :VATnumber, country = :country WHERE id = :id");

        $request -> execute(array(
            'name' => $_POST['name'],
            'VATnumber' => $_POST['VATnumber'],
            'country' => $_POST['country'],
            'id' => $_POST['id']
        ));
    }
    $request = $bdd -> query('SELECT * FROM company ORDER BY name ASC');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read company</title>
</head>
<body>
    <h1>Company page</h1>
    <ul>
        <li>
            <a href="create.php">Create company</a>
        </li>
        <li>
            <a href="update.php">Update company</a>
        </li>
    </ul>

    <table border="1px solid black">
        <tr>
            <td>
                Name
            </td>
            <td>
                TVA
            </td>
            <td>
                Country
            </td>
            <td>
                Delete
            </td>
        </tr>
        <?php while($data = $request -> fetch()){ ?>
            <form action="" method="POST" name=form-<?php echo $data['id'] ?>>
                <tr>
                    <td>
                        <a href="#"><?php echo $data['name']; ?></a>
                    </td>
                    <td>
                        <?php echo $data['VATnumber']; ?>
                    </td>
                    <td>
                        <?php echo $data['country']; ?>
                    </td>
                    <td>
                    <input type="hidden" name="id" value=<?php echo $data['id'];?>>
                    <input type="submit" name="del" value="delete">
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $data['id'];?>">Update</a>
                    </td>
                </tr>
            </form>
        <?php
        }
        ?>
    </table>
</body>
</html>
