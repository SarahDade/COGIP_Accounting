<?php $title = "List Invoice";

$css = "../../public/assets/css/style.css";

ob_start();
?>

    <h1>LIST INVOICE</h1>
<?php 
$content = ob_get_clean();

require("../layout/template.php");
