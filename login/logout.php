<?php

    if(isset($_POST['disconnect'])){
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }
    
?>