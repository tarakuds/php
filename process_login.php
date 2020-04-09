<?php

    session_start();
    
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

    header("Location: login.php");
}
else{
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

     

    for($counter = 0; $counter < $countAllUsers; $counter++){

         $currentUser = $allUsers[$counter];
        
       if($currentUser == $mail .".json"){
           
            //check supplied password
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);
            //print_r($userObject->fname);//to obtain value of firstname
            $passfromDB = $userObject->password;

            $passfromUSER = password_verify($pass,$passfromDB); 

           
            if($passfromDB == $passfromUSER){
                $_SESSION['loggedin']= $userObject->id;
                $_SESSION['fullname']= $userObject->fname." ".$userObject->lname;
                $_SESSION['role']= $userObject->designation;

               /*  //to define access control
               if($userObject->designation =="Patients"){
                    header("Location: patient.php");
                    die(); 
                }*/

               header("Location: dashboard.php");
               die();
            }
            
        }
        
    
    
}
}
        $_SESSION['error'] = "Invalid Email or Password";
        header("Location: login.php");
        die(); 

    
?>