<?php
    session_start();
    require_once('function/users.php');
    require_once('function/redirect.php');

$errorCount= 0;

$fname=$_POST['fname'] != ""? $_POST['fname']:$errorCount++;
$lname=$_POST['lname'] != ""? $_POST['lname']:$errorCount++;
$mail=$_POST['mail']!= ""? $_POST['mail']:$errorCount++;
$pass=$_POST['password']!= ""? $_POST['password']:$errorCount++;
$gender=$_POST['gender'] != ""? $_POST['gender']:$errorCount++;
$designation=$_POST['designation'] != ""? $_POST['designation']:$errorCount++;
$dept=$_POST['departments'] != ""? $_POST['departments']:$errorCount++;

if(empty($fname)){
    $fname_error = "please use a valid input";
}elseif(strlen($fname) <2){
    $fname_error = "username should have a min of six letters";
}
/*elseif(!preg_match("/^[a-zA-z\s]+$/", $fname){
    $fname_error = "username must be numbers";
}*/

if(empty($lname)){
    $lname_error= "use a valid input";
}
if(empty($mail)){
    $mail_error= "use a valid input";
}


$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['mail']=$mail;
$_SESSION['gender']=$gender;
$_SESSION['designation']=$designation;
$_SESSION['departments']=$dept;


//redirecting page
if($errorCount > 0){
     
    redirect_to("register.php");
}
else{
    
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
    $userExists= findUser($mail);
    
        if($userExists){
            $_SESSION['error']= "Registration Failed. User already exists ";
            redirect_to("register.php");
            die();
        }
    }

    save_user($userObject);
    $_SESSION['message']= 'You can now login '.$fname;
    redirect_to("login.php");
?>