<?php

    require_once('alert.php');
    require_once('redirect.php');


     function send_mail( $subject="", $message="",$mail=""){
        $subject = "Password Reset Link";
        $message = "A password request was made. was this u? if YES visit: localhost/healthline/reset.php".$token;
        $header = "From: no-reply@healthline.com". "\r\n". "CC:me@yahoo.com";

        $try = mail($mail, $subject, $message, $header);
                        

         if($try){
             set_alert('message', "password reset sent to youur email: ".$mail);
                 
                 redirect_to("login.php");
         }else{
            set_alert('error', "something went wrong ".$mail);
                    redirect_to("forgot.php");
                }

     }
     
?>