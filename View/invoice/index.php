<?php

    $title = "Error";
    $css = "../../";
    

    ob_start();
?>
    <h1>Invoices page</h1>
    <ul>
        <li>
            <a href="./invoice/create">Create invoices</a>
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

            <?php 
                foreach ($dataInvoice as $invoice) {
            ?>
                <form action="./invoice/delete/<?php echo $invoice['invoice_id'];?>" method="POST">
                    <tr>
                        <td>
                            <?php echo $invoice['invoice_date']; ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($dataPeoples as $people) {
                                    if($people['people_id'] == $invoice['people_id']){
                                        echo $people['firstname'].' '.$people['lastname'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                            
                                foreach ($dataCompany as $company) {
                                    if($company['company_id'] == $invoice['company_id']){
                                        echo $company['company_name'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <input type="hidden" name="invoice_id" value=<?php echo $invoice['invoice_id'];?>>
                            <input type="submit" name="delete" value="delete">
                        </td>
                        <td>
                            <a href="./invoice/edit/<?php echo $invoice['invoice_id'];?>">Update</a>
                        </td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </tr>
    </table>

<?php 
    $content = ob_get_clean();
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");