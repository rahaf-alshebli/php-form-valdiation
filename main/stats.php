<?php 
    require_once("../includes/connection.php");

    $noEmp = mysqli_query($conn, "SELECT COUNT(id) AS Emp_Count FROM user");
    $totalSal = mysqli_query($conn, "SELECT SUM(salary) AS Total_Salary FROM user");
    $highestSal = mysqli_query($conn, "SELECT MAX(salary) AS Max_Salary FROM user");
    $lowestSal = mysqli_query($conn, "SELECT MIN(salary) AS Min_Salary FROM user");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="../css/style.css" rel="stylesheet">
    <title>Stats</title>


</head>
<body>
    <div class="centerPanel">
        <div class="cardBox">
            <div class="card">
                <div>
                    <?php 
                        $data = mysqli_fetch_array($noEmp);
                    ?>
                    <div class="numbers"><?php echo $data['Emp_Count']; ?></div>
                    <div class="cardName"># of Employees</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php 
                        $data = mysqli_fetch_array($totalSal);
                    ?>
                    <div class="numbers">$<?php echo $data['Total_Salary']; ?></div>
                    <div class="cardName">Total Salary</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php 
                        $data = mysqli_fetch_array($highestSal);
                    ?>
                    <div class="numbers">$<?php echo $data['Max_Salary']; ?></div>
                    <div class="cardName">Highest Salary</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <?php 
                        $data = mysqli_fetch_array($lowestSal);
                    ?>
                    <div class="numbers">$<?php echo $data['Min_Salary']; ?></div>
                    <div class="cardName">Lowest Salary</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>