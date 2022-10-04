<?php 
    require_once("../includes/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - PHP Advance Tasks</title>
    
    <link rel="stylesheet" href="../css/style.css">

    <script type="text/javascript">
		function pass()
		{
			var firstpass = document.form.pass.value;
			var secondpass = document.form.confirmpass.value;
			if(firstpass == secondpass)
			{
				return true;
			}
			else
			{
				alert("Passwords doesn't match.\n Please check and Re-Enter the password");
				return false;
			}
		}
	</script>
</head>
<body>
    <section id="signupHome">
        <div class="signupContainer">
            <div class="signupTitle">
                <h1>Sign up</h1>
            </div>
            <div class="signupSubTitle">
                <p>Create an Account, it's Free</p>
            </div>
            <div class="formContainer">
                <form action="signup-validate.php" class="signupForm" method="POST">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" placeholder="Enter your First Name" pattern="[a-zA-Z0-9]+" minlength="4" maxlength="10" required />
                    <label for="mname">Middle Name</label>
                    <input type="text" name="mname" placeholder="Enter your Middle Name" pattern="[a-zA-Z0-9]+" minlength="4" maxlength="10" required />
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" placeholder="Enter your Last Name" pattern="[a-zA-Z0-9]+" minlength="4" maxlength="10" required />
                    <label for="fmname">Family Name</label>
                    <input type="text" name="fmname" placeholder="Enter your Family Name" pattern="[a-zA-Z0-9]+" minlength="4" maxlength="10" required />
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" pattern=".+@yahoo\.com|.+@gmail\.com" required />
                    <label for="password">Password</label>
                    <input type="password" name="pass" placeholder="Enter your Password" minlength="8" required />
                    <label for="pasconfirm">Confirm Password</label>
                    <input type="password" name="confirmpass" placeholder="Confirm your Password" required />
                    <label for="mobile">Mobile</label>
                    <input type="number" name="phone" placeholder="Enter your Phone Number" pattern="[7-9]{1}[0-9]{9}" required />
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" placeholder="Enter your Date of Birth" required />
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="login">
                <p>Already have an account? <a href="login.php">&nbsp;Log In</a></p>
            </div>
        </div>
    </section>
</body>
</html>