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
            <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                <td>
                    Update
                </td>
                <td>
                    Delete
                </td>
            <?php } ?>

            <?php 
                foreach ($dataInvoice as $invoice) {
            ?>
                <form action="./invoice/delete/<?php echo $invoice['id'];?>" method="POST">
                    <tr>
                        <td>
                            <a href=<?php echo "./invoice/".$invoice['id']?>><?php echo $invoice['invoice_date'];?></a>
                        </td>
                        <td>
                            <?php 
                                foreach ($dataPeoples as $people) {
                                    if($people['id'] == $invoice['people_id']){
                                        echo $people['firstname'].' '.$people['lastname'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                            
                                foreach ($dataCompany as $company) {
                                    if($company['id'] == $invoice['company_id']){
                                        echo $company['company_name'];
                                    }
                                }
                            ?>
                        </td>
                        <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                            <td>
                                <a href="./invoice/edit/<?php echo $invoice['id'];?>">Update</a>
                            </td>
                            <td>
                                <input type="hidden" name="id" value=<?php echo $invoice['id'];?>>
                                <input type="submit" name="del" value="delete">
                            </td>
                        <?php } ?>
                    </tr>
                </form>
            <?php
            }
            ?>
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

