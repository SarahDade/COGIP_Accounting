<?php
    require '../../Model/require.php';
    require 'delete.php';

        //----------------------------------------------------- UPDATE -----------------------------------------------------//
    if(isset($_POST['company_name']) AND isset($_POST['VAT_number']) AND isset($_POST['country'])){
        
        $company_name = $_POST['company_name'];
        $tva = $_POST['VAT_number'];
        $country = $_POST['country'];

        // $validationUpdate = new Validation();
        // $validationUpdate->string($company_name);
        // $validationUpdate->string($country);

        $request = $bdd->prepare("UPDATE company SET company_name = :company_name, VAT_number = :VAT_number, country = :country WHERE company_id = :company_id");

        $request -> execute(array(
            'company_name' => $_POST['company_name'],
            'VAT_number' => $_POST['VAT_number'],
            'country' => $_POST['country'],
            'company_id' => $_POST['company_id']
        ));
    }
    
    $request = $bdd -> query('SELECT * FROM company ORDER BY company_name ASC');

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
            <td>
                Update
            </td>
        </tr>
        <?php while($data = $request -> fetch()){ ?>
            <form action="" method="POST" name=form-<?php echo $data['company_id'] ?>>
                <tr>
                    <td>
                        <a href="#"><?php echo $data['company_name']; ?></a>
                    </td>
                    <td>
                        <?php echo $data['VAT_number']; ?>
                    </td>
                    <td>
                        <?php echo $data['country']; ?>
                    </td>
                    <td>
                    <input type="hidden" name="company_id" value=<?php echo $data['company_id'];?>>
                    <input type="submit" name="del" value="delete">
                    </td>
                    <td>
                        <a href="update.php?company_id=<?php echo $data['company_id'];?>">Update</a>
                    </td>
                </tr>
            </form>
        <?php
        }
        ?>
    </table>
</body>
</html>
