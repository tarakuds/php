<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthLine: Login</title>
</head>
<body>
    
    <p>
    <?php
    

        include('lib/nav.php');
        require_once('function/alert.php');
        if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
            header("Location: dashboard.php");
        } 
        
    ?>
    </p>

    <p><?php
                if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                    echo "<span style='color:green'>".$_SESSION['error']."</span>";

                   session_destroy();
                }
            ?></p>

    <h1>Login</h1>

    <p> 
            <?php    print_alert();   ?>
    </p>

    <span>Todays date is: <?php echo date("Y/m/d"); ?></span>
    <label for="time">The time now is: <?php echo date("h:i:sa") ?></label>

    <form action="process_login.php" method="post">

            
        <p><label for="mail">Email:</label>
        <input 
                    <?php
                        if(isset($_SESSION['mail'])) {
                            echo "value= " .$_SESSION['mail']; 
                        }
                    ?>
        type="email" name="mail" id="" placeholder="give details of your email" ></p>

        <p><label for="password">Password</label>
        <input type="password" name="password" id=""></p>
        <p><input type="submit" value="submit" ></p>
    </form>     

</body>
</html>