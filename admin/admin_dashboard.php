<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylings/adminDash.css">
    <title>Dashboard</title>
</head>
<body>
    
    <?php
        include "../db_connect.php";

        error_reporting(error_reporting() & ~E_NOTICE);

        $_SESSION['userid'] = $_GET['userid'];

        $sql_query = "select * from admin where id='".$_SESSION['userid']."'";
        $result = mysqli_query($con, $sql_query);
        
        $row = mysqli_fetch_array($result);
        
        include "sideNav.php";

    ?>

    <div class="welcome">
        <?php
         if (isset($_SESSION['userid'])) {
            echo "<h1>Welcome ".$row['name']."!</h1>";
        } else {
            $error = "<script>alert('Login First!')</script>";
            header('location: ../index.php?error=' .$error);
        }
        ?>
    </div>

    <div class="contacts">
            <?php
                $totalContact_query = "select * from contacts";
                $result = mysqli_query($con, $totalContact_query)or die($mysqli_error($con));
                $num = mysqli_num_rows($result);
            ?>
        <h1>Total Contacts</h1>
        <img src="../images/contact.png" alt="Contacts">
        <p><?php echo $num;?></p>
    </div>

    <div class="users">
        <?php
            $totalUser_query = "select * from users";
            $result = mysqli_query($con, $totalUser_query)or die($mysqli_error($con));
            $num = mysqli_num_rows($result);
        ?>
        <h1>Total Users</h1>
        <img src="../images/user.png" alt="Users">
        <p><?php echo $num;?></p>
    </div>
</body>
</html>