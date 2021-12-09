<?php
    $title = "Homepage" ;
    $css = "../";

    ob_start();
?>
    <h1>Company page</h1>
    <ul>
        <li>
            <a href="./company/create">Create company</a>
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
        <?php 
            foreach ($dataCompany as $data) {
        ?>
            <form action="./company/delete/<?php echo $data['company_id'] ?>" method="POST" name=form-<?php echo $data['company_id'] ?>>
                <tr>
                    <td>
                        <a href="./company/<?php echo $data['company_id'] ?>"><?php echo $data['company_name']; ?></a>
                    </td>
                    <td>
                        <?php echo $data['VAT_number']; ?>
                    </td>
                    <td>
                        <?php echo $data['country']; ?>
                    </td>
                    <td>
                    <input type="hidden" name="company_id" value=<?php echo $data['company_id'];?>>
                    <input type="submit" name="del" value="delete">
                    </td>
                    <td>
                        <a href="./company/edit/<?php echo $data['company_id'] ?>">Update</a>
                    </td>
                </tr>
            </form>
        <?php
            }
        ?>
    </table>
    <?php
$content = ob_get_clean();
require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");