<?php 
    require_once("../includes/connection.php");

    if(isset($_SESSION['login']))
    {
        header('location: ../index.php');
    }
    else{
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PHP Advance Tasks</title>
    
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section id="loginHome">
        <div class="loginContainer">
            <div class="loginTitle">
                <h1>Login</h1>
            </div>
            <div class="loginSubTitle">
                <p>Welcome back! Login with your Credentials</p>
            </div>
            <div class="formContainer">
                <form action="" class="loginForm" method="POST">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <label for="password">Password</label>
                    <input type="password" name="pass" placeholder="Enter your Password" required />
                    <button>Login</button>
                </form>
            </div>
            <div class="signup">
                <p>Don't have an account? <a href="signup.php">&nbsp;Sign Up</a></p>
            </div>
        </div>
    </section>

    <?php 
        if(isset($_POST['email']))
        {
            $email = $_POST['email'];
            $password = $_POST['pass'];

            if(mysqli_connect_error())
            {
                die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
            }
            else
            {
                $SELECT = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
                $result = $conn->query($SELECT);
                if( $result -> num_rows >0) 
                {
                    while($row = $result->fetch_assoc()) 
                    {
                        //echo "id: " . $row["Role"] ."<br>";
                        $_SESSION["role"]=$row["role"];
                        if($row["role"] =="Admin")
                        {
                            $_SESSION['login']=$_POST['email'];
                            $_SESSION['username']=$row["firstname"]." ".$row["lastname"];
                            header("Location: ../main/index.php");
                            die();
                        }
                        if($row["role"] == "SuperAdmin")
                        {
                            $_SESSION['login']=$_POST['email'];
                            $_SESSION['username']=$row["firstname"]." ".$row["lastname"];
                            header("Location: ../main/superadmin.php");
                            die();
                        }
                        if($row["role"]=="user")
                        {
                            $_SESSION['login']=$_POST['email'];
                            $_SESSION['username']=$row["firstname"]." ".$row["lastname"];
                            header("Location: ../user/");
                            die();
                        }
                    } 
                    // output data of each row
                } 
                else
                {
                    if(isset($_POST['email']))
                    {
                        echo "<script>alert('Invalid Email and / or password');</script>";
                        $extra="./login.php";
                        exit();
                    }
                }
            }
        }
    ?>
</body>
</html>