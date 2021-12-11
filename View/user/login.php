<?php $title = "Homepage" ;
$css = "../";

ob_start();
?>
    <h1>Login</h1>

    <form name="formConnexion" action="./connect" method="POST">

        <input type="email" name="email" placeholder="Mail">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php 
        if( isset($errors) ){
            foreach ($errors as $error) {
                echo $error.'<br>';
            }
        }
    ?>
<?php
$content = ob_get_clean();

if( isset($_SESSION['right_access'])){
    switch ($_SESSION['right_access']) {
        case 2: case 3:
            require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/admin_template.php");
            break;
        default:
            require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");
            break;
    }
}else{
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");
}

