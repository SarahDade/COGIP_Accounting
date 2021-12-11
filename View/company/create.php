<?php 

$title = "New Company";
$css = "../../";

ob_start();
?>

    <h1>Create company</h1>
    <ul>
        <li>
            <a href="../company">Company page</a>
        </li>
    </ul>
    <form action="./store" method="POST">
        <input type="text" name="company_name" placeholder="Name country">
        <input type="text" name="VAT_number" placeholder="T.V.A">
        <input type="text" name="country" placeholder="Country">
        <select  name="type">
        <?php 
            foreach ($data as $type) {
                $array = [];
                array_push($array, $type['category']);
                
                foreach ($array as $element) {
                    if( $type['category'] != $element ){
                }
                        echo '<option name="type" value="'.$type['type_id'].'">'.$type['category'].'</option>';
        
                }} ?>
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

