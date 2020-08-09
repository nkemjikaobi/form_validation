<?php

session_start();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <!--Links to bootstrap-->
    <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap-theme.min.css'>
    <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>

    <link rel="stylesheet" href="style.css">
</head>
<body style='background-color:<?php echo $_SESSION['colour']; ?>'>
    <div class="container">
        <h3>Welcome <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ;?></h3>
        <span>Your favourite colour is displayed as the background colour</span>

        <div class="card">
            <div class="card-title">
                <h4>Your Details</h4><hr>
            </div>
            <div class="card-body">
                Email: <?php  echo $_SESSION['email']; ?><br><hr>
                Date of birth: <?php  echo $_SESSION['dob']; ?><br><hr>
                Department: <?php  echo $_SESSION['department']; ?><br><hr>
            </div>
        </div>
    </div>
    
</body>
</html>