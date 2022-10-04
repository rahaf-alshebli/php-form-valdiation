<?php 
    require_once("../includes/connection.php");

    if(isset($_SESSION['login']))
    {
        header('location: ../index.php');
    }
    else{}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
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
</body>
</html>
