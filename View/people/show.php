<?php 

$title = "List People";
$css = "../../";

ob_start();
?>
    <ul>
        <li>
            <a href="../people">Contact page</a>
        </li>
        <li>
            <a href="../people/create">Create contact</a>
        </li>
    </ul>
    <table border='1px solid black'>
        <tr>
            <td>
                Firstname
            </td>
            <td>
                Surname
            </td>
            <td>
                Email
            </td>
            <td>
                Delete
            </td>
            <td>
                Update
            </td>
        </tr>
                <form action="../people/delete/<?php echo $data['people_id'];?>" method="POST">

                    <tr>
                        <td>
                            <?php echo $data['firstname'];?>
                        </td>

                        <td>
                            <?php echo $data['lastname'];?>
                        </td>

                        <td>
                            <?php echo $data['email'];?>
                        </td>

                        <td>
                            <!-- Update -->
                            <a href=<?php echo "../people/edit/".$data['people_id']?>>Update</a>
                        </td>

                        <td>
                            <!-- delete -->
                            <input type="hidden" name="people_id" value=<?php echo $data['people_id'];?>>
                            <input type="submit" name="del" value="delete">
                        </td>
                    </tr> 
                </form>
        </tr>
    </table>

<?php 
$content = ob_get_clean();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");
