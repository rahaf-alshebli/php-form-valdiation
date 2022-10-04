<?php 
    require_once("../includes/connection.php");

    if($_SESSION['role'] == "user")
    {
        header('location: ../user/index.php');
    }

    else if($_SESSION['role'] == "Admin")
    {
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin</title>

    <link href="../css/style.css" rel="stylesheet">
    
</head>
<body>
<section id="home" class="homeContainer">
        <div class="welcomeContainer">
            <div class="welcomeTitle">
                <h1>Hello <?php echo $_SESSION['username']; ?></h1>
            </div>
            <div class="welcomeSubTitle">
                <p>Welcome to your Super Admin Panel</p>
            </div>
            <div class="stats">
                <a href="stats.php">Stats</a>
                <a href="superadmin.php?user=all">All Users</a>
                <a href="superadmin.php">Only Admins</a>
            </div>
            <?php 
                
                $fetchDetailsAll = mysqli_query($conn, "SELECT * FROM user WHERE role NOT IN ('Super admin')");

                if(isset($_GET['user']))
                {
                    $user = $_GET['user'];

                    if($user == "all")
                    {
                        
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
                                    <th>Role</th>
                                    <th>Operation</th>
                                </tr>
                                <?php 
                                while($data = mysqli_fetch_array($fetchDetailsAll))
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
                                        <td><?php echo $data['role']; ?></td>
                                        <td>
                                            <a href="<?php echo 'superadmin.php?edit='. $data['id']; ?>">Edit</a>
                                            <a href="<?php echo 'index.php?delete='. $data['id']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <?php
                    }

                }

                $fetchDetails = mysqli_query($conn, "SELECT * FROM user where role = 'Admin'");
                
                if(!isset($_GET['user']))
                {
                ?>
                <div id="adminOne" class="tableContainer">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>password</th>
                            <th>date created</th>
                            <th>date last login</th>
                            <th>Salary</th>
                            <th>Role</th>
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
                                <td><?php echo $data['role']; ?></td>
                                <td>
                                    <a href="<?php echo 'superadmin.php?edit='. $data['id']; ?>">Edit</a>
                                    <a href="<?php echo 'index.php?delete='. $data['id']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
                }  
            ?>
            
            
            <?php 
                if(isset($_GET['edit']))
                {
                    $editId = $_GET['edit'];

                    $dataToEdit = mysqli_query($conn, "SELECT * FROM user WHERE id = '$editId'");
                    $toEditData = mysqli_fetch_array($dataToEdit);
                    ?>
                    <form class="editForm" action="" method="GET">
                        <h1>Edit Data</h1>
                        <input type="text" name="editId" value="<?php echo $editId; ?>" readonly>
                        <input type="text" name="nameEdit" value="<?php echo $toEditData['firstname']; ?>">
                        <input type="text" name="emailEdit" value="<?php echo $toEditData['email']; ?>">
                        <input type="text" name="passEdit" value="<?php echo $toEditData['password']; ?>">
                        <input type="text" name="dateCreatedEdit" value="<?php echo $toEditData['date_created']; ?>" readonly>
                        <input type="text" name="lastLoggedEdit" value="<?php echo $toEditData['date_lastLogged']; ?>" readonly>
                        <input type="text" name="salaryEdit" value="<?php echo $toEditData['salary']; ?>">
                        <input type="text" name="roleEdit" value="<?php echo $toEditData['role']; ?>">
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

            <?php 
                if(isset($_GET['editId']))
                {
                    $eId = $_GET['editId'];
                    $ename = $_GET['nameEdit'];
                    $emailEdit = $_GET['emailEdit'];
                    $passEdit = $_GET['passEdit'];
                    $dateCreatedEdit = $_GET['dateCreatedEdit'];
                    $lastLoggedEdit = $_GET['lastLoggedEdit'];
                    $salary = $_GET['salaryEdit'];
                    $role = $_GET['roleEdit'];
                
            
                    if(mysqli_connect_error())
                    {
                        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
                    }
                    else
                    {
                        $UPDATE = "UPDATE user SET firstname = '$ename', email = '$emailEdit', password = '$passEdit', date_created = '$dateCreatedEdit', date_lastLogged = '$lastLoggedEdit', salary = '$salary', role = '$role' WHERE id = '$eId'";
                
                        if(mysqli_query($conn, $UPDATE))
                        {
                            ?>
                            <script>
                                alert("User has been updated successfully");
                                window.location.href = "superadmin.php";
                            </script>
                            <?php    
                        }
                        else
                        {
                            ?>
                            <script>
                                alert("Error Updating record: ".<?php mysqli_error($conn)?>);
                                window.location.href = "superadmin.php";
                            </script>
                            <?php
                        }
                        mysqli_close($conn);     
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