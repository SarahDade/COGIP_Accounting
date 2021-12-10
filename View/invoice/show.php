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
            <td>
                Delete
            </td>
            <td>
                Update
            </td>

                <form action="../invoice/delete/<?php echo $dataInvoice['invoice_id'];?>" method="POST">
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
                        <td>
                            <a href="../invoice/edit/<?php echo $dataInvoice['invoice_id'];?>">Update</a>
                        </td>
                        <td>
                            <input type="hidden" name="invoice_id" value=<?php echo $dataInvoice['invoice_id'];?>>
                            <input type="submit" name="del" value="delete">
                        </td>
                    </tr>
                </form>
        </tr>
    </table>

<?php 
    $content = ob_get_clean();
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");