<?php $title = "Edit People";

$css = "../../public/assets/css/style.css";

ob_start();
?>

    <h1>EDIT PEOPLE</h1>

<?php 
$content = ob_get_clean();

require("../layout/template.php");