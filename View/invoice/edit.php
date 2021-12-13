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

    <form action="../update/<?php echo $data['id'];?>" method="POST">

        <input type="hidden" name="id" value="<?php echo $data['id'];?>">

        <input type="text" name="invoice_date" placeholder="Date" value="<?php echo $data['invoice_date'];?>">

        <input type="submit" name="submitUpdate" value="Update">
    </form>
<?php 
    $content = ob_get_clean();
    
if( isset($_SESSION['right_access'])){
    switch ($_SESSION['right_access']) {
        case 2: case 3:
            require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/admin_template.php");
            break;
        default:
            require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");
            break;
    }
}else{
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");
}

