<?php 

$title = "List Company";
$css = "../../../";

ob_start();
?>
    <h1>Update company</h1>
    <ul>
        <li>
            <a href="../create">Create company</a>
        </li>
        <li>
            <a href="../../company">Company Page</a>
        </li>
    </ul>
    
    <form action="../update/<?php echo $data['company_id']; ?>" method="POST">

        <input type="hidden" name="company_id" value="<?php echo $data['company_id']; ?>">

        <input type="text" name="company_name" placeholder="Name" value="<?php echo $data['company_name'];?>">

        <input type="text" name="VAT_number" placeholder="T.V.A" value="<?php echo $data['VAT_number'];?>">

        <input type="text" name="country" placeholder="Country" value="<?php echo $data['country'];?>">
    
        <input type="submit" name="submitUpdate" value="Submit">
    </form>

<?php 
$content = ob_get_clean();

require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");