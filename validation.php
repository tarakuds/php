<?php
    //test run for validation
$fname_error = $lname_error = "";
$fname = $lname = $mail = $pass = "";

if($_SESSION['error']=""){
   if (empty($_POST["fname"])) {
    $fname_error= "enter correct name";
    }
else{
    if(!preg_match("/^[a-zA-z\s]+$/", $name)){
        $fname_error= "input alphacbets";
    }
     if(strlen($name)<7){
    echo "name too short";
     }
}
}




?>