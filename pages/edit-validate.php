<?php 
    include("../includes/connection.php");
    
    if(isset($_GET['editId']))
    {
        $eId = $_GET['editId'];
        $ename = $_GET['nameEdit'];
        $emailEdit = $_GET['emailEdit'];
        $passEdit = $_GET['passEdit'];
        $dateCreatedEdit = $_GET['dateCreatedEdit'];
        $lastLoggedEdit = $_GET['lastLoggedEdit'];
        $salary = $_GET['salaryEdit'];
    }

    if(mysqli_connect_error())
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        $UPDATE = "UPDATE user SET firstname = '$ename', email = '$emailEdit', password = '$passEdit', date_created = '$dateCreatedEdit', date_lastLogged = '$lastLoggedEdit', salary = '$salary' WHERE id = '$eId'";

        if(mysqli_query($conn, $UPDATE))
        {
            ?>
            <script>
                alert("User has been updated successfully");
                window.location.href = "../main/index.php";
            </script>
            <?php    
        }
        else
        {
            ?>
            <script>
                alert("Error Updating record: ".<?php mysqli_error($conn)?>);
                window.location.href = "../main/index.php";
            </script>
            <?php
        }
        mysqli_close($conn);     
    }
?>