<?php $title = "Homepage" ;
$css = "../";

ob_start();
?>
    <h1>Welcome to the COGIP</h1>
    <p>bonjour</p>
<section>
    <h2>Last Invoice:</h2>
    <table>
        <thead>
            <tr>
                <td>Invoice Number</td>
                <td>Dates</td>
                <td>Company</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($lastInvoices as $data) {
            ?>
            <tr>
                <td><?php echo $data[0] ?></td>
                <td><?php echo $data['invoice_date'] ?></td>
                <td><?php echo $data['company_name'] ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</section>

<section>
    <h2>Last contact:</h2>
    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>e-mail</td>
                <td>Company</td>
            </tr>
        </thead>
        </tbody>
            <?php
                foreach ($lastContacts as $data) {
            ?>
            <tr>
                <td><?php echo $data['firstname'].' '.$data['lastname'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['company_name'] ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</section>

<section>
    <h2>Last company:</h2>
    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>TVA</td>
                <td>Country</td>
                <td>Type</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($lastCompanies as $data) {
            ?>
            <tr>
                <td><?php echo $data['company_name'] ?></td>
                <td><?php echo $data['VAT_number'] ?></td>
                <td><?php echo $data['country'] ?></td>
                <td><?php echo $data['category'] ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</section>
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

