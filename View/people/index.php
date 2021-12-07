<?php

    $title = "Error";
    $css = "../../public/assets/css/style.css";

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
            <td>
                Delete
            </td>
            <td>
                Update
            </td>
        </tr>
            <?php
                while($data = $request -> fetch()){
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

                        <td>
                            <!-- Update -->
                            <a href=<?php echo "./people/edit/".$data['people_id']?>>Update</a>
                        </td>

                        <td>
                            <!-- delete -->
                            <input type="hidden" name="people_id" value=<?php echo $data['people_id'];?>>
                            <input type="submit" name="del" value="delete">
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