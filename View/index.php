<?php $title = "Homepage" ;
$css = "./public/assets/css/style.css";

ob_start();
?>
    <h1>HOMEPAGE</h1>
<?php
$content = ob_get_clean();

require("layout/template.php");