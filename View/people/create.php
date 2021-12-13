<?php

$css = "../../";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../../Route/config');
$dotenv->load();


$title = "List People";
$css = "../../";

ob_start();
?>
    <h1>Create a new contact</h1>

    <ul>
        <li>
            <a href="../people">Contact page</a>
        </li>
    </ul>
    <form action="./store" method="POST">

        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="email" name="email" placeholder="email">

        <select  name="company_id">
        <?php 
            foreach ($dataPeoples as $dataPeople) {
        ?>
            <option name="<?php echo $dataPeople['company_name'];?>" value="<?php echo $dataPeople[0]; ?>"> <?php echo $dataPeople['company_name'];?> </option>
        
        <?php } ?>
        </select>
        
        <input type="submit" name="submit" value="submit">
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

