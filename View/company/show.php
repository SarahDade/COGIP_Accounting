<?php 

$title = "List Company";
$css = "../../";

ob_start();
?>

<h1>LIST COMPANY</h1>

<?php 
$content = ob_get_clean();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");

?>

<?php

  $title = 'Companies directory';
  ob_start();
?>
  <h1>Clients</h1>
  <ul>
  <?php foreach ($clients as $client): ?>
  <li>
      <a href="../../../../../../../../../COGIP_Accounting/company <?php echo $client[''] ?>">
      </a>
  </li>
  <?php endforeach; ?>
  </ul>
<?php
  $content = ob_get_clean();

  require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");

?>