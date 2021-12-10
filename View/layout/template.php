<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../../Route/config');
$dotenv->load();

function redirect($link){
    $array = explode("/", $_SERVER["REQUEST_URI"]);

    $numb = count($array);
    // var_dump($numb);


    $link = $link;
    
    $redirect = implode('/', $array);
    if (in_array("index", $array)){
        $redirect = "localhost" . $redirect .  $link;

    } 
    else{
        // var_dump("ok");
        $redirect = "localhost" . $redirect. "/" . $link;

    } 
    
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/Model/require.php");
    // var_dump($redirect);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href=<?= $css.$_ENV['directory'].'/public/assets/css/style.css' ?>>
</head>
<body>
    <header>
        <ul>
            <li class="logo"><img src="<?= $css.$_ENV['directory'].'/public/storage/cogip-logo.svg' ?>" alt="logo"></li>
            <li><a href="/COGIP_Accounting">Home</a></li>
            <li><a href="/COGIP_Accounting/invoice">Invoice</a></li>
            <li><a href="/COGIP_Accounting/company">Company</a></li>
            <li><a href="/COGIP_Accounting/people">People</a></li>
            <li><a href="/COGIP_Accounting/login">Login</a></li>
        </ul>
    </header>
    
    <main class="wrapper">
        <div class="bloc1"><?= $content ?></div>
    </main>
    <p class="white"></p>
    <footer class="footer">
        
        <p>Cogip</p>

    </footer>
</body>
</html>