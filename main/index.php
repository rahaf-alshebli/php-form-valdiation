<?php 
    require_once("../includes/connection.php");

     if($_SESSION['role'] == "user")
    {
        header('location: ../user/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Advance Tasks</title>
    
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section id="home" class="homeContainer">
        <div class="welcomeContainer">
            <div class="welcomeTitle">
                <h1>Hello <?php echo $_SESSION['username']; ?></h1>
            </div>
            <div class="welcomeSubTitle">
                <p>Welcome to your Admin Panel</p>
            </div>
            <div class="stats">
                <a href="stats.php">Stats</a>
                <?php if($_SESSION['role'] == "SuperAdmin"): ?>
                    <a href="superadmin.php">Super Admin</a>
                <?php else: ?>
                    
                <?php endif; ?>
           

            </div>
            <?php 
                $fetchDetails = mysqli_query($conn, "SELECT * FROM user WHERE role NOT IN ('Super admin')");
                // $fetchDetails = mysqli_query($conn, "SELECT * FROM user WHERE role = 'user'");
            ?>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>password</th>
                        <th>date created</th>
                        <th>date last login</th>
                        <th>Salary</th>
                        <th>Operation</th>
                    </tr>
                    <?php 
                    while($data = mysqli_fetch_array($fetchDetails))
                    {
                        ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['firstname']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['password']; ?></td>
                            <td><?php echo $data['date_created']; ?></td>
                            <td><?php echo $data['date_lastLogged']; ?></td>
                            <td><?php echo $data['salary']; ?></td>
                            <td>
                                <a href="<?php echo 'index.php?edit='. $data['id']; ?>">Edit</a>
                                <a href="<?php echo 'index.php?delete='. $data['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            
            <?php 
                if(isset($_GET['edit']))
                {
                    $editId = $_GET['edit'];

                    $dataToEdit = mysqli_query($conn, "SELECT * FROM user WHERE id = '$editId'");
                    $toEditData = mysqli_fetch_array($dataToEdit);
                    ?>
                    <form class="editForm" action="../pages/edit-validate.php" method="GET">
                        <h1>Edit Data</h1>
                        <input type="text" name="editId" value="<?php echo $editId; ?>" readonly>
                        <input type="text" name="nameEdit" value="<?php echo $toEditData['firstname']; ?>">
                        <input type="text" name="emailEdit" value="<?php echo $toEditData['email']; ?>">
                        <input type="text" name="passEdit" value="<?php echo $toEditData['password']; ?>">
                        <input type="text" name="dateCreatedEdit" value="<?php echo $toEditData['date_created']; ?>" readonly>
                        <input type="text" name="lastLoggedEdit" value="<?php echo $toEditData['date_lastLogged']; ?>" readonly>
                        <input type="text" name="salaryEdit" value="<?php echo $toEditData['salary']; ?>">
                        <input type="submit" value="Edit Changes" />
                    </form>
                    <?php
                }
            ?>
            
            <?php 
                if(isset($_GET['delete']))
                {
                    $deleteID = $_GET['delete'];

                    $DELETE = "DELETE FROM user WHERE id = '$deleteID'";

                    if(mysqli_query($conn, $DELETE))
                    {
                        ?>
                        <script>
                            alert("User has been Deleted successfully");
                            window.location.href = "index.php";
                        </script>
                        <?php    
                    }
                    else
                    {
                        ?>
                        <script>
                            alert("Error Deleting record: ".<?php mysqli_error($conn)?>);
                            window.location.href = "index.php";
                        </script>
                        <?php
                    }
                }
            ?>
            
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