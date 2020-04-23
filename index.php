<html>
<head>
        <title>Welcome to health Line</title>
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                    <script src="js/script.js"></script>
                    <link rel="stylesheet" href="css/style.css">   -->
</head>

    <body>
    <?php
        include('lib/nav.php');
        
    ?> 
        <p><?php
        require_once('function/alert.php'); 
        print_alert(); ?></p>
            
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Welcome to healthLine</h1>
  <p class="lead">There is no better place to be than here.</p>
</div>
            
   
    </body>

</html>



