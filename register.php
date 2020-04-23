<?php
   require_once("function/redirect.php");

    if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
        redirect_to("dashboard.php");
    }
    

    include("lib/nav.php");
    require_once('function/alert.php');

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthLine: Register</title>
</head>
<body>
<h1>Register</h1>
    <h2>Welcome, Kindly proceed with Registration Here</h2>
    <p><b>All forms are required</b></p>
       
        <form action="process_register.php" method="post">
        
        <p>
            <?php
              print_alert();
            ?>
        </p>

        <p><label for="fname">Firstname:</label>
        <input type="text" <?php if(isset($_SESSION['fname'])) { echo "value= " .$_SESSION['fname']; } ?> name="fname"  id="" placeholder="please enter your firstname" >
        <?php if(isset($fname_error)){  ?>
            <p><?php echo $fname_error; ?></p>
            <?php } ?>
                    
        </p>

        <p><label for="lname">lastname:</label>
        <input 
                    <?php
                       /* if(isset($_SESSION['lname'])) {
                            echo "value= " .$_SESSION['lname']; 
                        }*/
                    ?>
        type="text" name="lname" id="" placeholder="please enter your lastname" ></p>

        <p><label for="mail">email:</label>
        <input 
                    <?php
                       /* if(isset($_SESSION['mail'])) {
                            echo "value= " .$_SESSION['mail']; 
                        }*/
                    ?>
        type="email" name="mail" id="" placeholder="give details of your email" ></p>

        <p><label for="password">Password</label>
        <input 
        <?php
                       /* if(isset($_SESSION['password'])) {
                            echo "value= " .$_SESSION['password']; 
                        }*/
                    ?>
        type="password" name="password" id=""></p>
        
        <p><label for="gender">Gender:</label>
       <!-- <input type="radio" name="gender" id="" value="Male">Male
        <input type="radio" name="gender" id="" value="Female">Female -->

        <select name="gender" id="" >
            <option>what is your gender</option>
            <option value="female">
                    <?php
                    /* if(isset($_SESSION['gender']) && $_SESSION['gender']=='Female') {
                          echo "selected"; 
                       }*/
                   ?>
        
            Female</option>
            <option value="Male">
                    <?php
                     /*if(isset($_SESSION['gender']) && $_SESSION['gender']=='Male') {
                          echo "selected"; 
                       }*/
                   ?>
            Male</option>
            <option value="rathernot">
            <?php
                    /* if(isset($_SESSION['gender']) && $_SESSION['gender']=='Rather not say') {
                          echo "selected"; 
                       }*/
                   ?>
            Rather not say</option>
        </select>
        </p>

        <p><label for="designation">Designation</label>
        <select name="designation" id="" >
            <option value="SD">select a designation</option>
            <option value="Medical Team"
                    <?php
                     if(isset($_SESSION["designation"]) && $_SESSION["designation"]=='Medical Team(MT)') {
                          echo "selected"; 
                       }
                   ?>
            >Medical Team(MT)</option>
            <option value="Super Admin"
                    <?php
                     if(isset($_SESSION["designation"]) && $_SESSION["designation"]=='Super Admin') {
                          echo "selected"; 
                       }
                   ?>
           > Super Admin</option>
            <option value="Patient"
                    <?php
                     if(isset($_SESSION["designation"]) && $_SESSION["designation"]=='Patient') {
                          echo "selected"; 
                       }
                   ?>
           > Patient</option>
        </select></p>

        <p><label for="departments">Department</label>
        <input         
                <?php
                                if(isset($_SESSION['departments'])) {
                                    echo "value= " .$_SESSION['departments']; 
                                }
                            ?>
        
        type="text" name="departments" id="" placeholder="lets know your department"></p>

        <button type="submit" name="submit" >Register</button>

        </form>

    
</body>
</html>