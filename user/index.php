<?php 
    require_once("../includes/connection.php");

    if(isset($_SESSION['login']) || isset($_SESSION['role']) == "user")
    {
        
    }
    else{
        header('location: ../index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<section id="home" class="homeContainer">
    <div class="welcomeContainer">
        <div class="welcomeTitle">
            <h1>Hello <?php echo $_SESSION['username']; ?></h1>
        </div>
        <div class="welcomeSubTitle">
            <p>Welcome to your User Panel</p>
        </div>
        <div class="mainContainer" style="width: 90%; margin: 0 auto;">
            <h3 style="text-align: center;">Your Email Address is: <?php echo $_SESSION['login']; ?></h3>
        </div>
        <div class="welcomeBtns">
            <div class="btns">
                <?php if(isset($_SESSION['login'])): ?>
                    <a style="margin: 0 0 0 180px; position: relative; top: 100px;" class="login" href="../pages/logout.php">Logout</a>
                <?php else: ?>
                    <a class="login" href="../pages/login.php">Login</a>
                    <a class="signup" href="../pages/signup.php">Signup</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
</body>
</html>
