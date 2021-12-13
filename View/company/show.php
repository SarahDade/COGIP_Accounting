
<?php
    $title = "company" ;
    $css = "../../";

    ob_start();
?>
    <h1>Company : </h1> <?php echo $company[0]['company_name']?>
    <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
        <ul>
            <li>
                <a href="./create">Create company</a>
            </li>
            <li>
                <a href="../company">Company Page</a>
            </li>
        </ul>
    <?php } ?>
    <h3>VAT :</h3><?php echo $company[0]['VAT_number']?>
    <h3>TYPE :</h3><?php echo $company_type['category']?>

    <h3>Contact Persons</h3>

    <table border="1px solid black">
        <tr>
            <td>
                Firstname
            </td>
            <td>
                Lastname
            </td>
            <td>
                Email
            </td>
        </tr>
    <?php
        foreach ($company as $data) {
    ?>
            <form action="../company/delete/<?php echo $data['company_id'] ?>" method="POST" name=form-<?php echo $data['company_id'] ?>>
                <tr>
                    <td>
                        <?php echo $data['firstname']; ?>
                    </td>
                    <td>
                        <?php echo $data['lastname']; ?>
                    </td>
                    <td>
                        <?php echo $data['email']; ?>
                    </td>
                </tr>
            </form>
        <?php
           }
        ?>
    </table>
    
    <h3>Invoices</h3>

    <table border="1px solid black">
        <tr>
            <td>
                Invoice number
            </td>
            <td>
                Date
            </td>
            <td>
                Firstname
            </td>
            <td>
                Lastname
            </td>
            <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                <td>
                    Update
                </td>
                <td>
                    Delete
                </td>
            <?php } ?>
        </tr><?php
        foreach ($company as $data) {
        ?>
            <form action="../company/delete/<?php echo $data['company_id'] ?>" method="POST" name=form-<?php echo $data['company_id'] ?>>
                <tr>
                    <td>
                        <?php echo $data['id']; ?>
                    </td>
                    <td>
                        <?php echo $data['invoice_date']; ?>
                    </td>
                    <td>
                        <?php echo $data['firstname']; ?>
                    </td>
                    <td>
                        <?php echo $data['lastname']; ?>
                    </td>
                    <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                        <td>
                            <a href="../company/edit/<?php echo $data['company_id'] ?>">Update</a>
                        </td>
                        <td>
                            <input type="hidden" name="company_id" value=<?php echo $data['company_id'];?>>
                            <input type="submit" name="del" value="delete">
                        </td>
                    <?php } ?>
                </tr>
            </form>
        <?php
           }
        ?>
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
    ?>

    