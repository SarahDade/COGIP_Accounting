<?php $title = "Error";

$css = "../../public/assets/css/style.css";

ob_start();
?>

<H1>ERROR 404. Not Found.</H1>

<?php 
$content = ob_get_clean();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");



