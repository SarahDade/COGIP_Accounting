<?php 

$title = "List People";
$css = "../../";

ob_start();

?>
      <h1>Contact : </h1> <?php echo $contact['firstname'].' '.$contact['lastname'] ?>
        <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
            <ul>
                <li>
                    <a href="../people/create">Create contact</a> 
                </li>
            </ul>
        <?php } ?>
            <ul> 
                <li>
                    Contact : <?php echo $contact['firstname'].' '.$contact['lastname'] ?>
                </li>
                <li>
                    Company : <?php echo $contact['company_name'] ?>
                </li>
                <li>
                    Email :  <?php echo $contact['email'] ?>
                </li>
            </ul>
            <h3>Contact person for these invoices : </h3>
            <table border='1px solid black'>
            <tr>
                <td>
                    Invoice number
                </td>
                <td>
                    Date
                </td>
                <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                    <td>
                        Update
                    </td>
                    <td>
                        Delete
                    </td>
                <?php } ?>
            </tr>    

            <?php foreach ($contactInvoices as $data) { ?>

            <form action="../people/delete/<?php echo $contact[$id];?>" method="POST">

                <tr>
                    <td>
                        <?php echo $data[0];?>      

                        <!-- JE CROIS QUE C'EST   ['0'] ici -->
                    </td>

                    <td>
                        <?php echo $data['invoice_date'];?>                  
                    </td>

                    <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                        <td>
                            <!-- Update -->
                            <a href=<?php echo "../people/edit/".$contact[$id]?>>Update</a>
                        </td>

                        <td>
                            <!-- delete -->
                            <input type="hidden" name="people_id" value=<?php echo $contact[$id];?>>
                            <input type="submit" name="del" value="delete">
                        </td>

                    <?php } ?>
                </tr> 

            </form>

        <?php } ?>

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

