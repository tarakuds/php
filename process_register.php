<?php
    session_start();

//collecting data
/*$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mail=$_POST['mail'];
$pass=$_POST['password'];
$gender=$_POST['gender'];
$designation=$_POST['designation'];
$dept=$_POST['departments'];


//doing validation - done n the reg page or here
$error=[];

if ($fname ==""){
    $error='firstname must be provided';
}
if ($lname ==''){
    $error='lastname must be provided';
}
if ($mail ==''){
    $error='Please provide a valid email';
}
if ($pass ==''){
    $error='Confirm password is correct';
}
if ($gender ==''){
    $error='select your gender';
}
if ($designation ==''){
    $error='select designation';
}
if ($dept ==''){
    $error='what department are you';
}

print_r($error);*/


//verifying data and validation

$errorCount= 0;

$fname=$_POST['fname'] != ""? $_POST['fname']:$errorCount++;
$lname=$_POST['lname'] != ""? $_POST['lname']:$errorCount++;
$mail=$_POST['mail']!= ""? $_POST['mail']:$errorCount++;
$pass=$_POST['password']!= ""? $_POST['password']:$errorCount++;
$gender=$_POST['gender'] != ""? $_POST['gender']:$errorCount++;
$designation=$_POST['designation'] != ""? $_POST['designation']:$errorCount++;
$dept=$_POST['departments'] != ""? $_POST['departments']:$errorCount++;

$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['mail']=$mail;
//$_SESSION['password']=$pass;//password needs no reset
$_SESSION['gender']=$gender;
$_SESSION['designation']=$designation;
$_SESSION['departments']=$dept;


//redirecting page

if($errorCount > 0){
    //header("Location: register.php?message=something went wrong with the submission");//redirecting for $_GET
    $_SESSION['error']= 'You have '.$errorCount.' error';
    
    if(errorCount > 1){
        $session_error .="s";
    }

    $session_error .= 'in your form submission. Please review';

    $_SESSION['error'] = $session_error ;
    
    
    header("Location: register.php");
}
else{

    //assigning a unique ID by counting users
    $allUsers = scandir("db/users/");
    

    $countAllUsers = count($allUsers);
    
    $newUserId= ($countAllUsers-1);


    //To save to database
    $userObject= [
        'id'=>$newUserId,
        'fname'=>$fname,
        'lname'=>$lname,
        'mail'=>$mail,
        'password'=>password_hash($pass, PASSWORD_DEFAULT),
        'gender'=>$gender,
        'designation'=>$designation,
        'departments'=>$dept

    ];

    for($counter=0; $counter< $countAllUsers; $counter++){
        $currentUser=$allUsers[$counter];
        if($currentUser == $mail.".json"){
            $_SESSION['error']= "Registration Failed. User already exists ";
            header("Location: register.php");
            die();
        }
    }

    //using loops to verify if email address already exist in db
    file_put_contents("db/users/".$mail. ".json", json_encode($userObject) );
    $_SESSION['message']= 'You can now login '.$fname;
    header("Location: login.php");
   // echo "successful";
}

//saving

//return back to page
?>