<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthLine: Reset Password</title>
</head>
<body>
    

    <?php 
        include('lib/nav.php');
        require_once('function/alert.php');
        require_once('function/users.php');
        require_once('function/redirect.php');

        if(!is_user_loggedIn() && !is_token_set()){
            $_SESSION["error"] = "You are not authorized  to view this page";
            redirect_to("login.php");
        }
         ?>

    <h2>Reset Password</h2>
    <p>Reset password associated with your account: [email]</p>

    <form action="process_reset.php" method="POST">

    <p>
        <?php
             print_alert(); 
            ?>
        </p>

        <p>
        <?php if(!is_user_loggedIn()){ ?>
        <input 
            <?php
             if(is_token_set_in_session()) {
                    echo "value= ".$_SESSION['token']. " ";
                   
                }else{
                    echo "value= ".$_GET['token']. " ";
                }
            ?> 
            type="hidden" name="token" >
            <?php } ?>
            </p>

            <p><label for="mail">Email:</label>
                <input
                <?php
             if(isset($_SESSION['mail'])) {
                    echo "value= ".$_SESSION['token'];
                   
                }?> type="email" name="mail" id="" placeholder="Email" />
            </p>

            <p><label for="password">Enter New Password</label>
        <input type="password" name="password" id="" placeholder="password" /></p>

      <!--  <p><label for="password">Confirm new password</label>
        <input 
        <?php
                       /* if(isset($_SESSION['password'])) {
                            echo "value= " .$_SESSION['password']; 
                        }*/
                    ?>
        type="password" name="password" id=""></p>--->

            <p>
                        <button type="submit">Reset Password</button>
            </p>
            </form>



</body>
</html>