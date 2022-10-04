<?php 
    require_once("includes/connection.php");
    
    if(isset($_SESSION['role']) == "Admin")
    {
        header('location: main/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Advance Tasks</title>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="home" class="homeContainer">
        <div class="welcomeContainer">
            <div class="welcomeTitle">
                <h1>Hello There!</h1>
            </div>
            <div class="welcomeSubTitle">
                <p>Automatic identity verification which enable you to verify your identity</p>
            </div>
            <div class="welcomeImage">
                <img src="images/welcome.png" alt="">
            </div>
            <div class="welcomeBtns">
                <div class="btns">
                    <?php if(isset($_SESSION['login'])): ?>
                        <a style="margin: 0 0 0 180px; position: relative; top: 100px;" class="login" href="pages/logout.php">Logout</a>
                    <?php else: ?>
                        <a class="login" href="pages/login.php">Login</a>
                        <a class="signup" href="pages/signup.php">Signup</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>