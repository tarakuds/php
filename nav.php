            <?php

                    session_start();

            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                    <script src="js/script.js"></script>
                    <link rel="stylesheet" href="css/style.css">    
        </head>
            <body>
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  
  <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
<nav class="my-2 my-md-0 mr-md-3">
<a class="p-2 text-dark" href="./index.php">HOME</a>|
<?php if(!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin'])){ ?>
<a class="p-2 text-dark" href="./login.php">LOGIN</a>|
<a class="btn btn-outline-primary" href="./register.php">REGISTER</a>|
<a class="p-2 text-dark" href="./forgot.php">FORGOT PASSWORD</a>

<?php }else{?>
  <a class="p-2 text-dark" href="reset.php">Reset Password</a>
  <a class="p-2 text-dark" href="logout.php">Logout</a>

              <?php if(isset($_SESSION['role']) && ($designation="Super Admin")){ ?>
              <a class="p-2 text-dark" href="new.php">ADD NEW USER</a>
              <?php }?>

  <?php } ?>
</nav>

</div>
            <!-- <p>
            <a href="./index.php">Home</a> |
        

            <a href="login.php">Login</a> |
            <a href="register.php">Register</a> |
            <a href="forgot.php">Forgot Password</a>

            
            <a href="reset.php">Reset Password</a>
            <a href="logout.php">Logout</a>

                        
                        <a href="new.php">ADD NEW USER</a>
                
            
            </p> -->
       
                    
            </body>
            </html>
            
           