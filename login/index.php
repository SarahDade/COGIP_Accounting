<?php
    require 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu login</title>
</head>
<body>
    <h1>Login</h1>

    <form name="formConnexion" action="" method="POST">

        <input type="text" name="email" value="<?php echo $mail; ?>" placeholder="Mail">
        <input type="text" name="password" placeholder="password">
        <input type="submit" name="submit" value="submit">

        <?php echo display_error(); ?>
    </form>
</body>
</html>