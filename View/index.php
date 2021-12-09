<?php $title = "Homepage" ;
$css = "../";

ob_start();
?>
    <h1>HOMEPAGE</h1>
<?php
$content = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");