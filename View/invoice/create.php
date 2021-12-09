<?php

    $title = "Error";
    $css = "../../";
    

    ob_start();
?>

    <h1>Create invoices</h1>
    <ul>
        <li>
            <a href="../invoice">Invoices page</a>
        </li>
    </ul>

    <form action="./store" method="POST">
        <select  name="people_id">
        <?php 
            foreach ($dataPeoples as $dataPeople) {
        ?>
            <option name="people_id" value="<?php echo $dataPeople['people_id']; ?>"> <?php echo $dataPeople['firstname'].' '.$dataPeople['lastname'];?> </option>
        
        <?php } ?>
        </select>

        <input type="date" name="invoice_date" placeholder="Date">

        <select  name="company_id">
        <?php 
            foreach ($dataCompany as $company) {
        ?>
            <option name="company_id" value="<?php echo $company['company_id']; ?>"> <?php echo $company['company_name'];?> </option>
        
        <?php } ?>
        </select>

        <input type="submit" name="submit" value="submit">
    </form>
<?php 
    $content = ob_get_clean();
    require($_SERVER['DOCUMENT_ROOT']."/".$_ENV['directory']."/View/layout/template.php");