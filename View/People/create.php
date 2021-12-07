<?php
    require '../../Model/require.php';
    require '../../controller/Validation.php';

    $requestPeople = $bdd -> query('SELECT * FROM company');

    if(isset($_POST['submit'])){

        if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email'])){

            $firstname = $_POST['firstname']; 
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $company_id = $_POST['company_id'];

            $validation = new Validate();
            $validation->string($firstname);
            $validation->string($lastname);
            $validation->email($email);

            
            $request = $bdd -> prepare('INSERT INTO people(firstname, lastname, email, company_id) VALUES(?, ?, ?, ?)');
    
            $request -> execute(array(
                $firstname,
                $lastname,
                $email,
                $company_id
            ));

            echo "<script>alert(\"Your contact is create\")</script>";
        }
        else{
            echo "No way";
        }
    }
 
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
            <a href="./index.php">Contact page</a>
        </li>
    </ul>
    <form action="" method="POST">

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
