<?php

    $title = "Error";
    $css = "../../";
    

    ob_start();
?>
    <h1>Invoices page</h1>
    <ul>
        <li>
            <a href="../invoice">Invoices page</a>
        </li>
        <li>
            <a href="../invoice/create">Create invoices</a>
        </li>
    </ul>
    <table border="1">
        <tr>
            <td>
                Date
            </td>
            <td>
                People
            </td>
            <td>
                Company
            </td>
            <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                <td>
                    Update
                </td>
                <td>
                    Delete
                </td>
            <?php } ?>

                <form action="../invoice/delete/<?php echo $dataInvoice['id'];?>" method="POST">
                    <tr>
                        <td>
                            <?php echo $dataInvoice['invoice_date'];?>
                        </td>
                        <td>
                            <?php echo $dataPeoples['firstname'].' '.$dataPeoples['lastname']; ?>
                        </td>
                        <td>
                            <?php echo $dataCompany['company_name']; ?>
                        </td>
                        <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                            <td>
                                <a href="../invoice/edit/<?php echo $dataInvoice['id'];?>">Update</a>
                            </td>
                            <td>
                                <input type="hidden" name="invoice_id" value=<?php echo $dataInvoice['id'];?>>
                                <input type="submit" name="del" value="delete">
                            </td>
                        <?php } ?>
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

