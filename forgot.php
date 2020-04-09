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
    ?>

    <h2>Forgot Password</h2>
    <p>Provide email details below</p>

    <form action="process_forgot.php" method="post">

    <p>
        <?php
             if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                    echo "<span style='color:red'>".$_SESSION['error']."</span>";
                   session_destroy();
                }
            ?>
        </p>

            <p><label for="mail">email:</label>
                <input 
                    <?php
                     if(isset($_SESSION['mail'])) {
                     echo "value= " .$_SESSION['mail']; }?>
                type="email" name="mail" id="" placeholder="give details of your email" >
            </p>

            <p>
                        <button type="reset">Proceed Reset</button>
            </p>
            </form>



</body>
</html>