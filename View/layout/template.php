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

        <div class="content2"> <a href="/cogipaccounting" >Home</a></div>

        <div class="content3"> <a href="/cogipaccounting/invoice">Invoice</a></div>

        <div class="content4"> <a href="">Company</a></div>

        <div class="content5"><a href="<?=$people?>">People</a></div>

        <div class="content6"><a href="../cogipaccounting">Login</a></div>

        <div class="content7"></div>
    </section> 
    <main class="wrapper">
        
        <div class="bloc1">Hello</div>
        
        <div class="bloc2">
        <?= $content ?>
        <?php 


        function redirect($link){
            
            $array = explode("/", "/cogipaccounting/people/edit");
            $option = $link;
            $url = array("homepage" => array("" , "cogipaccounting"),
            "people" => array("", "cogipaccounting", "people", array("edit", "create", "store", "update", "delete" )),
            "invoice" => array("", "cogipaccounting", "invoice", array("edit", "create", "store", "update", "delete")),
            "company" => array("", "cogipaccounting", "company", array("edit", "create", "store", "update", "delete")),
            $option => $array);

            print_r($url[$option]);

            // $url = $link => $url[$array[2]];
            

            print_r($url[$link]);
            

            var_dump(count($url["people"]));

            $inpath = count($array);

            $outpath = count($url[$link]);



            if ($outpath < $inpath){

                $number = $inpath - $outpath;
                
                var_dump([$number]);
                var_dump(str_repeat("../", $number) . $url[$link][$number]);
                // return str_repeat("../", $number) . $url[$link][$number];
            }

            elseif($outpath > $inpath){
                
                $number = $outpath - $inpath;
                
                var_dump("./" . $url[$link][$number+1]);

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