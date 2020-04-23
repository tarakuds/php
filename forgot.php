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
    ?>

    <h2>Forgot Password</h2>
    <p>Provide email details below</p>

    <form action="process_forgot.php" method="POST">

    <p>
        <?php
            print_alert();
            ?>
        </p>

            <p><label for="mail">Email:</label>
                <input 
                    <?php
                     if(isset($_SESSION['mail'])) {
                     echo "value= " .$_SESSION['mail']; }?>
                type="email" name="mail" id="" placeholder="give details of your email" >
            </p>

            <p>
                        <button type="submit">Proceed Reset Request</button>
            </p>
            </form>



</body>
</html>