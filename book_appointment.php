
<?php
    include('nav/nav.php');
    include("function/redirect.php");
    require_once("function/error.php");
    

    // if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //     redirect_to("dashboard.php");
    // }
    //forLogin();

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Book Appointment | SNH </title>
</head>
<body>

    <main>
    <div class= "container">
        <div class="row col-6">
            <h2>BOOK YOUR APPOINTMENT WITH A  MEDICAL TEAM</h2>
        </div>
        <div class="row col-6">
            <!-- <P>Welcome, kindly input correct information</P> -->
            <p>All form fields are required</p>
        </div>    
            
        <div class="row col-6">
            <form action="process_appointment.php" method="POST">

                <?php 
                    errorinfo();    
                ?>
                <p>
                    <label for="patient">Name</label>
                    <input  <?php
                            if(isset($_SESSION['patient'])){
                                echo "value=".$_SESSION['patient'];
                             }  
                        ?>  type="text" name="patient" id="">
                </p>
                <p>
                    <label for="appointment_date">Date of Appointment:</label>
                    <input type="date" name="appointment_date" id="">
                </p>

                <p>
                    <label for="appointment_time">Time of Appointment:</label>
                    <input
                    <?php
                            if(isset($_SESSION['appointment_time'])){
                                echo "value=".$_SESSION['appointment_time'];
                             }  
                        ?> type="time" name="appointment_time" id="">
                </p>

                <p>
                <label for="appointment_nature">Nature Of Appointment</label>
                <select class="form-control" name="appointment_nature" id="">
                        <option value="">Select Department</option>
                        <option>Emergency</option>
                        <option>Family clinic</option>
                        <option>General checkup</option>
                        <option>Anti - natal</option>
                        <option>Immunization</option>
                </select>
                </p>

                <p>
                    <label class="label" for="medical_department">Department</label>
                    <select class="form-control" name="medical_department" id="">
                        <option value="">Select Department</option>
                        <option <?php
                            // if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                            //     echo "selected";
                            // }  
                        ?>>Physiotheraphy</option>                        
                        <option>Dentist</option>
                        <option>Optics</option>
                        <option>Dermatology</option>
                        <option>ENT</option>
                    </select>
                </p>
                
                <p for="complaint">
                <label for="complaint">Initial Complaint:</label></p>
                <p><textarea name="complaint" id="" cols="30" rows="5"></textarea></p>
        
                <!-- <p>
                    <label class="label" for="lname">Lastname</label>
                    <input type="text"
                    <?php 
                        // if(isset($_SESSION['lname'])){
                        //     echo "value=".$_SESSION['lname'];
                        //}  ?> class="form-control" name="lname" id="lastname" placeholder="Please input your lastname">
                </p> -->


               
                <button type="submit" name="book_submit" class="btn btn-success">Book Appointment</button><br>
                <!-- <a href="forgot.php">Forgot Password</a>
                <p for="login">Already have an accout?<a href="login.php">Login Here</a> </p>  -->

            </form>
        </div>
    </div>
   </main>
</body>
</html>     