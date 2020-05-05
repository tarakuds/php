<?php
    session_start();
    include("function/redirect.php");
 
    //REGISTRATION FORM VALIDATION
    $errorCount= 0;
    $fname = $_POST['fname'] != ""? $_POST['fname']:$errorCount++;
    $lname = $_POST['lname'] != ""? $_POST['lname']:$errorCount++;
    $mail= $_POST['mail'] != ""? $_POST['mail']:$errorCount++;
    $pass = $_POST['password'] != ""?$_POST['password']: $errorCount++;
    $gender = $_POST['gender'] != ""? $_POST['gender']:$errorCount++;
    $designation =$_POST['designation'] != ""? $_POST['designation']:$errorCount++;
    $department = $_POST['department'] != ""? $_POST['department']:$errorCount++;

    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['mail']=$mail;
    $_SESSION['gender']=$gender;
    $_SESSION['designation']=$designation;
    $_SESSION['department']=$department; 

    $registrationDate = date("Y/m/d");
    //date("h:i:sa")
                       

    if($errorCount>0){
        $sessionError =' You have '.$errorCount.' error';

        if($errorCount>1){
            $sessionError .= "s";
        }
        $sessionError .= ' in your submission. You should review';
        $_SESSION['error'] = $sessionError;
        redirect_to("reg.php");
    }
    else{
        //specifying location to store data
        $allUsers = scandir("db/users/");

        //counting users and assigning IDs 
        $countUser = count($allUsers);
        $userId = ($countUser -1);

        //declaring array objects
        $userObject= [
            'id'=>$userId,
            'fname' => $fname,
            'lname' => $lname,
            'mail' =>$mail,
            'password' =>password_hash($pass, PASSWORD_DEFAULT),
            'gender'=>$gender,
            'designation'=>$designation,
            'department'=>$department,
            'registration_date'=>$registrationDate,
            'login_time'
            
        ];

        for($counter=0; $counter < $countUser; $counter++){
            $currentUser = $allUsers[$counter];
            if($currentUser === $mail.".json"){
                $_SESSION['info']= 'User already exists! Try again with correct values';
                redirect_to("reg.php");
                die();
            }
        }

        file_put_contents("db/users/".$mail.".json",json_encode($userObject));
        $_SESSION['message'] = 'Your registration was successful '.$fname;
        redirect_to("login.php"); 
    }


?>