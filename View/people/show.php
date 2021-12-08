<?php $title = "List People";

$css = "../../public/assets/css/style.css";

ob_start();
?>

    <h1>LIST PEOPLE</h1>

<?php 
$content = ob_get_clean();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");
