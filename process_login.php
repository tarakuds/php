<?php
    session_start();
    include("function/redirect.php");

    $errorCount= 0;
    
    $mail= $_POST['mail']!=""?$_POST['mail']:$errorCount++;
    $pass = $_POST['password']!=""?$_POST['password']:$errorCount++;
    $default = $_POST['password'] = 12345;

    $_SESSION['mail']=$mail;

    

    

    
    if($errorCount>0){
        $session_error ='Caution! Error';
        if($errorCount>1){
            $session_error .= 's';
        }

        $_SESSION['error']=$session_error;
        redirect_to("login.php");
    }else{

        $allUsers = scandir("db/users/");
        $countUser=count($allUsers);

        for($counter=0; $counter < $countUser; $counter++){
            $currentUser = $allUsers[$counter];

            if($currentUser == $mail.".json"){
            
                $lastLogin = date("Y/m/d "."h:i:sa");
               
                $userObject = json_decode(file_get_contents("db/users/".$currentUser)); 
                
                
                $passFromDB =$userObject->password;
                $passFromUser=password_verify($pass, $passFromDB);

                          

                if($passFromUser == $passFromDB){
                    $_SESSION['loggedIn'] =$userObject ->id;
                    $_SESSION['name'] =$userObject ->fname. " ".$userObject->lname;
                    $_SESSION['role'] =$userObject ->designation;
                    $_SESSION['dept'] =$userObject ->department;
                    $_SESSION['regdate']=$userObject ->registration_date;

                    array_push($a,"blue","yellow");

                $userObject =[
                    'login_time'=>$lastLogin,
             ];
             array_push($userObject);
             fwrite(json_encode($userObject,JSON_UNESCAPED_UNICODE));
                    $_SESSION['login_time']= $lastLogin;

                   

                    //$lastLoginTime=$userObject ->$lastLogin;
                    //$addObject_push($lastLogin);
                    
                // file_put_contents("db/users/", json_encode($addObject));

                    if($_SESSION['role']==='Super Admin'){
                        redirect_to("dashboard.php");
                        die();
                    }elseif($_SESSION['role']==='Patient'){
                        redirect_to("dashboard_patient.php");
                        die();
                    }elseif($_SESSION['role']==='Medical Team(MT)'){
                        redirect_to("dashboard_mt.php");
                        die();
                    }
                    
                    
                }
            }else{
                $_SESSION['info']="Invalid Email or Password";
                redirect_to("login.php");
            }
        }

       
    }
    

?>