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
            <td>
                Delete
            </td>
            <td>
                Update
            </td>
        </tr>
            <form action="../company/delete/<?php echo $data['company_id'] ?>" method="POST" name=form-<?php echo $data['company_id'] ?>>
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
                    <td>
                        <a href="../company/edit/<?php echo $data['company_id'] ?>">Update</a>
                    </td>
                    <td>
                        <input type="hidden" name="company_id" value=<?php echo $data['company_id'];?>>
                        <input type="submit" name="del" value="delete">
                    </td>
                </tr>
            </form>
    </table>
    <?php
$content = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");