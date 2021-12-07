<?php $title = "Edit Company";

$css = "../../public/assets/css/style.css";

ob_start();
?>

<h1>Company</h1>

<?php 
$content = ob_get_clean();

require("../layout/template.php");

