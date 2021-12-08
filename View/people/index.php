<?php $title = "People";

$css = "./public/assets/css/style.css";

ob_start();
?>

    <h1>PEOPLE</h1>
    <p>ma bite en bois !!!!!!!!</p>

<?php
$content = ob_get_clean();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");
