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
        if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
            header("Location: dashboard.php");
        }

        
        
    ?>
    </p>

    <h1>Login</h1>

    <p>
            <?php

        if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "<span style='color:red'>".$_SESSION['message']."</span>";

            session_destroy();
        }

        ?>
    </p>

    <form action="process_login.php" method="post">

        <p>
            <?php
                if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                    echo "<span style='color:red'>".$_SESSION['error']."</span>";

                   session_destroy();
                }
            ?>

        </p>
        
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