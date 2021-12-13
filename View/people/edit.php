<?php 
    $title = "Edit People";
    $css = "../../../";

    ob_start();
?>

<h1>Update a contact</h1>
    <ul>
        <li>
            <a href="../../people">Contact page</a>
        </li>
        <li>
            <a href="../../people/create">Create contact</a>
        </li>
    </ul>

    <form action="../update/<?php echo $data['id'];?>" method="POST">

        <input type="hidden" name="people_id" value="<?php echo $data['id'] ;?>">

        <input type="text" name="firstname" placeholder="firstname" value="<?php echo $data['firstname'];?>">

        <input type="text" name="lastname" placeholder="lastname" value="<?php echo $data['lastname'];?>">

        <input type="email" name="email" placeholder="email" value="<?php echo $data['email'];?>">
        
        <input type="submit" name="submitUpdate" value="submit">

    </form>

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

