<?php
session_start();

if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();

    
    header("Location: login_form.php");
    exit();
} else {
   
    header("Location: login_form.php");
    exit();
}
?>
