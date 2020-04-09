<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header("Location: dashboard.php");
    }
    session_unset();
    session_destroy();

    header("Location: login.php")
?>