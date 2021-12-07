<?php $title = "New People";

$css = "../../public/assets/css/style.css";

ob_start();
?>

    <h1>NEW PEOPLE</h1>

<?php 
$content = ob_get_clean();

require("../layout/template.php");