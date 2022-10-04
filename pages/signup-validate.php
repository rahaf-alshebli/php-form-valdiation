<?php
    require_once("../includes/connection.php");

    if(isset($_POST['email'])) 
    {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $fmname = $_POST['fmname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $dob = date('Y-m-d', strtotime($_POST['dob']));
        $dateCreation = date('Y-m-d');
        $datelastLog = "0";
        $role = "user";
    }

    if(mysqli_connect_error())
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        $SELECT = "SELECT email FROM user WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO user (firstname, middlename, lastname, familyname, email, password, phone, dob, date_created, date_lastLogged, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    }

    // Prepare Statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0)
    {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssssissss", $fname, $mname, $lname, $fmname, $email, $pass, $phone, $dob, $dateCreation, $datelastLog, $role);
        $stmt->execute();
        
        ?>
        <script>
            window.alert("Registered Successfully");
            window.location.href = "./login.php";
        </script>
        <?php
    }
    
    else 
    {
        ?>
        <script>
            window.alert("Someone already have with this email, please Try an different email");
            setTimeout(function(){ window.location.href = "signup.php"; }, 2000);           
        </script>

        <?php
    } 
    $stmt->close();
    $conn->close();
?>