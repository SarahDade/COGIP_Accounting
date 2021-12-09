<?php

    $title = "Error";
    $css = "../../";
    

    ob_start();
?>
    <h1>Invoices page</h1>
    <ul>
        <li>
            <a href="create.php">Create invoices</a>
        </li>
    </ul>
    <table border="1">
        <tr>
            <td>
                Date
            </td>
            <td>
                Delete
            </td>
            <td>
                Update
            </td>

            <?php while($data = $request -> fetch()){?>
                <form action="./invoice/delete/<?php echo $data['invoice_id'];?>" method="POST">
                    <tr>
                        <td>
                            <?php echo $data['invoice_date'];?>
                        </td>
                        <td>
                            <input type="hidden" name="invoice_id" value=<?php echo $data['invoice_id'];?>>
                            <input type="submit" name="delete" value="delete">
                        </td>
                        <td>
                            <a href="update.php?invoice_id=<?php echo $data['invoice_id'];?>">Update</a>
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