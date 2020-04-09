<?php
    session_start();

    $errorCount= 0;

    $mail=$_POST['mail']!= ""? $_POST['mail']:$errorCount++;

    $_SESSION['mail']=$mail;

    if($errorCount > 0){
            $_SESSION['error']= 'You have '.$errorCount.' error';
    
                if(errorCount > 1){
                    $session_error .="s";
                }

                $session_error .= 'in your form submission. Please review';

                $_SESSION['error'] = $session_error ;
                
                
                header("Location: forgot.php");
    }
    else{
            $allUsers = scandir("db/users/");
        

            $countAllUsers = count($allUsers);
            for($counter=0; $counter< $countAllUsers; $counter++){
            $currentUser=$allUsers[$counter];
            if($currentUser == $mail.".json"){
                //sending email and redirecting to reset password page
                $subject = "Password Reset Link";
                $txt = "A password request was made. was this u? if YES visit: localhost/healthline/reset.php";

                $header = "From: no reply@healthline.com". "\r\n". "CC:me@yahoo.com";
                

                $try = mail($mail, $subject, $txt, $header);
                print_r($try);
                die();

                if($try){
                    $_SESSION["error"] = "password reset sent to youur email ".$mail;
                    header("Location: login.php");
                }else{
                    $_SESSION["error"] = "something went wrong ";
                    header("Location: forgot.php");
                }

                die();
        }
            }

            $_SESSION["error"] = "Email not registered ".$mail;
            header("Location: forgot.php");

    }

?>