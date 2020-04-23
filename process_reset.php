<?php

session_start();
require_once('function/users.php');
require_once('function/alert.php');
require_once('function/redirect.php');
require_once('function/token.php');
require_once('function/email.php');

$errorCount= 0;

if(!is_user_loggedIn()){
    $token=$_POST['token'] != ""? $_POST['token']:$errorCount++;
    $_SESSION['token']=$token;
}



$mail=$_POST['mail']!= ""? $_POST['mail']:$errorCount++;
$pass=$_POST['password']!= ""? $_POST['password']:$errorCount++;


$_SESSION['mail']=$mail;

if($errorCount > 0){

    $_SESSION['error']= 'You have '.$errorCount.' error';
    
    if(errorCount > 1){
        $session_error .="s";
    }

    $session_error .= 'in your form submission. Please review';
    set_alert('error'.$session_error);
    
    redirect_to("reset.php");
}
else{
    
    //check email is registered intoken folder
    $checkToken = is_user_loggedIn() ? true: find_token($mail);
    
            if($checkToken){
               
               $userExists = findUser($mail = "");
        
                    if($userExists){
                        $userObject = find_user($mail);
                                      
                        $userObject->password = password_hash($pass, PASSWORD_DEFAULT);
                    //file delete
                        unlink("db/users/".$currentUser);
                        unlink("db/token/".$currentUser);

                        save_user($userObject);
                        set_alert('message', "Password reset successful. you can now login");
                        // inform user of password reset
                        $subject = "Password Reset successful";
                        $message = "A password request was made. was this u? if YES visit: localhost/healthline/reset.php else reset password immediately";
                        
                        send_mail($subject,$messages,$mail);

                        redirect_to("login.php");
                        return;
                        } 
                
            }
            }

            
        }
    }
    set_alert('error', "Password reset failed, token/email invalid or expired");
    redirect_to("login.php");
   
}


?>