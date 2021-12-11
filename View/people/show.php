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
            <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                <td>
                    Update
                </td>
                <td>
                    Delete
                </td>
            <?php } ?>
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

                        <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
                            <td>
                                <!-- Update -->
                                <a href=<?php echo "../people/edit/".$data['people_id']?>>Update</a>
                            </td>

                            <td>
                                <!-- delete -->
                                <input type="hidden" name="people_id" value=<?php echo $data['people_id'];?>>
                                <input type="submit" name="del" value="delete">
                            </td>
                        <?php } ?>
                    </tr> 
                </form>
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

