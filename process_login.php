<?php

    session_start();
    require_once('function/redirect.php');
    require_once('function/alert.php');
    require_once('function/users.php');
    require_once('function/token.php');
    require_once('function/email.php');
    
    $errorCount= 0;

$mail=$_POST['mail']!= ""? $_POST['mail']:$errorCount++;
$pass=$_POST['password']!= ""? $_POST['password']:$errorCount++;

$_SESSION['mail']=$mail;

if($errorCount > 0){

   $session_error= "You have ".$errorCount." error";

    if($errorCount>1){
        $session_error .= "s";
    }
    $session_error .= ' in your form submission. Please review';

    $_SESSION['error'] = $session_error;
    redirect_to("login.php");
}
else{
    $currentUser = findUser($mail);
    
       if($currentUser){
           
            //check supplied password
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);

            $passfromDB = $userObject->password;
            $passfromUSER = password_verify($pass,$passfromDB); 

           
            if($passfromDB == $passfromUSER){
                $_SESSION['loggedin']= $userObject->id;
                $_SESSION['mail']= $userObject->mail;
                $_SESSION['fullname']= $userObject->fname." ".$userObject->lname;
                $_SESSION['role']= $userObject->designation;
                $_SESSION['dept']=$userObject->departments;

               redirect_to("dashboard.php");
               die();
            }
            
        }
        
    
    
//}
}
        set_alert('eror', "Invalid Email or Password");
        redirect_to("login.php");
        die(); 

    
?>