<?php

    $title = "Error";
    $css = "../../";
    

    ob_start();
?>
    <h1>Contact Page</h1>
    <ul>
        <li>
            <a href="./people/create">Create contact</a> 
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
            <?php
                foreach ($dataPeople as $data) {
            ?>
                <form action="./people/delete/<?php echo $data['people_id'];?>" method="POST">

                    <tr>
                        <td>
                            <a href=<?php echo "./people/".$data['people_id']?>><?php echo $data['firstname'];?></a>
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
                            <a href=<?php echo "./people/edit/".$data['people_id']?>>Update</a>
                        </td>

                        <td>
                            <!-- delete -->
                            <input type="hidden" name="people_id" value=<?php echo $data['people_id'];?>>
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

