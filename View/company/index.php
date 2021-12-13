
    <?php

$title = "Homepage" ;
$css = "../";

ob_start();
?>
<h1>Company page</h1>
<?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >=2) {?>
    <ul>
        <li>
            <a href="./company/create">Create company</a>
        </li>
    </ul>
<?php } ?>

<table border="1px solid black">
<tr>
    <td>
        Name
    </td>
    <td>
        VAT
    </td>
    <td>
        Country
    </td>
    <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
        <td>
            Update
        </td>
        <td>
            Delete
        </td>
    <?php } ?>
</tr>
<h2>Clients</h2>
<?php 
    foreach ($clients as $data) {
?>
    <form action="./company/delete/<?php echo $data['id'] ?>" method="POST" name=form-<?php echo $data['id'] ?>>
        <tr>
            <td>
                <a href="./company/<?php echo $data['id'] ?>"><?php echo $data['company_name']; ?></a>
            </td>
            <td>
                <?php echo $data['VAT_number']; ?>
            </td>
            <td>
                <?php echo $data['country']; ?>
            </td>
            <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                <td>
                    <a href="./company/edit/<?php echo $data['id'] ?>">Update</a>
                </td>
                <td>
                <input type="hidden" name="company_id" value=<?php echo $data['id'];?>>
                <input type="submit" name="del" value="delete">
                </td>
            <?php }?>
        </tr>
    </form>
<?php
    }
?>
</table>
<h2>Providers</h2>
<table border="1px solid black">
<tr>
    <td>
        Name
    </td>
    <td>
        VAT
    </td>
    <td>
        Country
    </td>
    <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
        <td>
            Update
        </td>
        <td>
            Delete
        </td>
    <?php } ?>
</tr>
<?php 
    foreach ($providers as $data) {
?>
    <form action="./company/delete/<?php echo $data['company_id'] ?>" method="POST" name=form-<?php echo $data['company_id'] ?>>
        <tr>
            <td>
                <a href="./company/<?php echo $data['company_id'] ?>"><?php echo $data['company_name']; ?></a>
            </td>
            <td>
                <?php echo $data['VAT_number']; ?>
            </td>
            <td>
                <?php echo $data['country']; ?>
            </td>
            <?php if( isset($_SESSION['right_access']) && $_SESSION['right_access'] >2) {?>
                <td>
                    <a href="./company/edit/<?php echo $data['company_id'] ?>">Update</a>
                </td>
                <td>
                <input type="hidden" name="company_id" value=<?php echo $data['company_id'];?>>
                <input type="submit" name="del" value="delete">
                </td>
            <?php } ?>
        </tr>
    </form>
<?php
    }
?>
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