<?php

    $title = "Error";
    $css = "../../";
    

    ob_start();


    // echo '<pre>';
    // var_dump($invoice);
    // echo '<hr>';
    // var_dump($contactInvoice);
    // echo '</pre>';
    // die();

?>
<h1>Invoice : </h1> <?php echo $invoice[$id]?>
<?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
    <ul>
        <li>
            <a href="../invoice">Invoices page</a>
        </li>
        <li>
            <a href="../invoice/create">Create invoice</a>
        </li>
    </ul>
<?php } ?>
        <h3>Company linked to the invoice</h3>
        <table border="1">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    VAT
                </td>
                <td>
                    Company type
                </td>
                <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                    <td>
                        Update
                    </td>
                    <td>
                        Delete
                    </td>
                <?php } ?>

                <form action="../invoice/delete/<?php echo $invoice['id'];?>" method="POST">
                    <tr>
                        <td>
                            <?php echo $invoice['company_name'];?>
                        </td>
                        <td>
                            <?php echo $invoice['VAT_number']; ?>
                        </td>
                        <td>
                            <?php echo $invoice['category']; ?>
                        </td>
                        <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                            <td>
                                <a href="../invoice/edit/<?php echo $invoice['id'];?>">Update</a>
                            </td>
                            <td>
                                <input type="hidden" name="invoice_id" value=<?php echo $invoice['id'];?>>
                                <input type="submit" name="del" value="delete">
                            </td>
                        <?php } ?>
                    </tr>
                </form>
            </tr>
        </table>
        <h3>Contact person</h3>
        <table border="1">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    Email
                </td>
                <form action="../invoice/delete/<?php echo $contactInvoice['id'];?>" method="POST">
                    <tr>
                        <td>
                            <?php echo $contactInvoice['firstname'].' '.$contactInvoice['lastname']; ?>
                        </td>
                        <td>
                            <?php echo $contactInvoice['email']; ?>
                        </td>
                    </tr>
                </form>
            </tr>
        </table>

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

