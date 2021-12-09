<?php

    $title = "Error";
    $css = "../../../";
    

    ob_start();
?>
    <h1>Update invoices</h1>
    <ul>
        <li>
            <a href="../../invoice">Invoices page</a>
        </li>
    </ul>

    <form action="../update/<?php echo $data['invoice_id'];?>" method="POST">

        <input type="hidden" name="invoice_id" value="<?php echo $data['invoice_id'];?>">

        <input type="text" name="invoice_date" placeholder="Date" value="<?php echo $data['invoice_date'];?>">

        <input type="submit" name="submitUpdate" value="Update">
    </form>
<?php 
    $content = ob_get_clean();
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");