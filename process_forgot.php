<?php
    session_start();
    require_once('function/alert.php');
    require_once('function/redirect.php');

    $errorCount= 0;

    $mail=$_POST['mail']!= ""? $_POST['mail']:$errorCount++;

    $_SESSION['mail']=$mail;

    if($errorCount > 0){
            $_SESSION['error']= 'You have '.$errorCount.' error';
    
                if(errorCount > 1){
                    $session_error .="s";
                }

                $session_error .= 'in your form submission. Please review';
                set_alert('error', $session_error);
                
                
                redirect_to("forgot.php");
    }
    else{
            $allUsers = scandir("db/users/");
        

            $countAllUsers = count($allUsers);
            for($counter=0; $counter< $countAllUsers; $counter++){
                    $currentUser=$allUsers[$counter];

                    if($currentUser == $mail.".json"){
                        
                        //generating token
                       $token = generate_token();
                        
                        $subject = "Password Reset Link";
                        $message = "A password request was made. was this u? if YES visit: localhost/healthline/reset.php".$token;
                        $header = "From: no-reply@healthline.com". "\r\n". "CC:me@yahoo.com";
                        
                        file_put_contents("db/token/".$mail. ".json", json_encode(['token' =>$token]) );
                        if (mail($mail, $subject, $message, $headers)) {
                            $sent = true;
                            header("Location: login.php");	
                        }
                send_mail( $subject, $message,$mail);

                die();
        }
            }
                set_alert('error', "Email not registered: ".$mail); 
                redirect_to("forgot.php");

    }

?>