                      <?php

                    session_start();

            ?>
            
            <p>
            <a href="./index.php">Home</a> |
            <?php if(!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin'])){ ?>

            <a href="login.php">Login</a> |
            <a href="register.php">Register</a> |
            <a href="forgot.php">Forgot Password</a>

            <?php }else{?>
            <a href="logout.php">Logout</a>
            <a href="reset.php">Reset Password</a>

                        <?php if(isset($_SESSION['role']) && ($designation="Super Admin")){ ?>
                        <a href="new.php">ADD NEW USER</a>
                        <?php }?>

            <?php } ?>
            
            </p>
