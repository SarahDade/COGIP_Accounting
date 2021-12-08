<!DOCTYPE html>

<?php

$homepage = redirect("homepage");
$company =  redirect("company");
$people = redirect("people");
$invoice = redirect("invoice");
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

        <div class="content2"> <a href="<?=$homepage?>" >Home</a></div>

        <div class="content3"> <a href=<?= $invoice ?>>Invoice</a></div>

        <div class="content4"> <a href=<?=$company?>>Company</a></div>

        <div class="content5"><a href=<?=$people?>>People</a></div>

        <div class="content6"><a href="../company/show.php">Login</a></div>

        <div class="content7"></div>
    </section> 
    <main class="wrapper">
        
        <div class="bloc1">Hello</div>
        <div class="bloc2">
        <?= $content ?>
        <?php 


        function redirect($link){

            $array = explode("/", $_SERVER["REQUEST_URI"]);
            
            $url = array("homepage" => array("" , "cogipaccounting"),
            "people" => array("", "cogipaccounting", "people"),
            "invoice" => array("", "cogipaccounting", "invoice"),
            "company" => array("", "cogipaccounting", "company"));

            $inpath = count($array);

            $outpath = count($url[$link]);

            if ($outpath < $inpath){

                $number = $inpath - $outpath;
                
                return (str_repeat("../", $number) . $url[$link][$number]);
                // return str_repeat("../", $number) . $url[$link][$number];
            }

            elseif($outpath == $inpath){
                
                $number = $outpath - $inpath;
                
                return("./" . $url[$link][$number+2]);

            }

            

        }
        
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