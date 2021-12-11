<?php
    $title = "Homepage" ;
    $css = "../../";

    ob_start();
?>
    <h1>Company page</h1>
    <ul>
        <li>
            <a href="./create">Create company</a>
        </li>
        <li>
            <a href="../company">Company Page</a>
        </li>
    </ul>

    <table border="1px solid black">
        <tr>
            <td>
                Name
            </td>
            <td>
                TVA
            </td>
            <td>
                Country
            </td>
            <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                <td>
                    Delete
                </td>
                <td>
                    Update
                </td>
            <?php } ?>
        </tr>
            <form action="../company/delete/<?php echo $data['id'] ?>" method="POST" name=form-<?php echo $data['id'] ?>>
                <tr>
                    <td>
                        <?php echo $data['company_name']; ?>
                    </td>
                    <td>
                        <?php echo $data['VAT_number']; ?>
                    </td>
                    <td>
                        <?php echo $data['country']; ?>
                    </td>
                    <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                        <td>
                            <a href="../company/edit/<?php echo $data['id'] ?>">Update</a>
                        </td>
                        <td>
                            <input type="hidden" name="company_id" value=<?php echo $data['id'];?>>
                            <input type="submit" name="del" value="delete">
                        </td>
                    <?php } ?>
                </tr>
            </form>
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

