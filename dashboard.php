<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once('lib/nav.php');
        if(!isset($_SESSION['loggedin'])){
            header("Location: login.php");
        }
    ?>

   <h1>DASHBOARD</h1> 
   <h4>YOU logged in at : <?php echo date("h:i:sa") ?></h4>
   
   Welcome, <?php echo $_SESSION['fullname'] ?>, You are Logged in as: <b><?php echo $_SESSION['role']; ?></b> and your ID is <?php echo $_SESSION['loggedin'] ?>

   <h3>Your Department is: <?php echo $_SESSION['dept'] ?></h3>

   <p>You just logged in on  <?php echo date("Y/m/d"); ?></p>
</body>
</html>