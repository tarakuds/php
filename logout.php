<?php
    session_start();
    require_once("function/redirect.php");
    
    if(!isset($_SESSION['loggedin'])){
        redirect_to("dashboard.php");
    }
    session_unset();
    session_destroy();

    redirect_to("login.php");
?>