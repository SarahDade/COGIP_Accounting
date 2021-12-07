<?php $title = "New Company";

$css = "../../public/assets/css/style.css";

ob_start();
?>

<h1>NEW COMPANY</h1>

<?php 
$content = ob_get_clean();

require("../layout/template.php");