<?php 

$title = "New Company";
$css = "../../";

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create company</title>
</head>
<body>
    <h1>Create company</h1>
    <ul>
        <li>
            <a href="../company">Company page</a>
        </li>
    </ul>
    <form action="./store" method="POST">
        <input type="text" name="company_name" placeholder="Name country">
        <input type="text" name="VAT_number" placeholder="T.V.A">
        <input type="text" name="country" placeholder="Country">
        <input type="submit" name="submit" value="submit">
    </form>
<?php 
$content = ob_get_clean();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");