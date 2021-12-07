<!DOCTYPE html>

<?php
function redirect($link){
    $array = explode("/", $_SERVER["REQUEST_URI"]);

    $numb = count($array);
    var_dump($numb);


    $link = $link;
    
    $redirect = implode('/', $array);
    if (in_array("index", $array)){
        $redirect = "localhost" . $redirect .  $link;

    } 
    else{
        var_dump("ok");
        $redirect = "localhost" . $redirect. "/" . $link;

    } 
    
    var_dump($redirect);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href=<?= $css?>>
</head>
<body>
    <section class="container">

        <div class="content1"><p>COGIP</p></div>

        <div class="content2"> <a href="#">Home</a></div>

        <div class="content3"> <a href="#">Invoice</a></div>

        <div class="content4"> <a href="#">Company</a></div>

        <div class="content5"><a href="#">People</a></div>

        <div class="content6"><a href="#">Login</a></div>

        <div class="content7"></div>
    </section> 
    <main class="wrapper">
        
        <div class="bloc1"></div>
        <div class="bloc2">
        <?= $content ?>
        <?php 
        redirect("invoice");
        ?>
        </div>
        <div class="bloc3"></div>
        <div class="bloc4"></div>
    </main>
    <p class="white"></p>
    <footer class="footer">
        
        <p>Cogip</p>

    </footer>
</body>
</html>