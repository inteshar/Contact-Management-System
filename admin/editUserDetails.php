<?php

    include "../db_connect.php";
    include "./sideNav.php";
    
    error_reporting(error_reporting() & ~E_NOTICE);

    $_SESSION['userid'] = $_POST['userid'];

    $admin_id = $_SESSION['userid'];

    $user_id = $_POST['user_id'];
    
    $query = "select * from admin where id='$admin_id'";
        $submit = mysqli_query($con, $query) or die(mysqli_error($con));
        $row = mysqli_fetch_array($submit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylings/editUserDetails.css">
    <title>Edit User Detials</title>
</head>
<body>

    <div class="welcome">
            <?php
            if (isset($_SESSION['userid'])) {
                echo "<h1>Welcome ".$row['name']."!</h1>";
            } else {
                $error = "<script>alert('Login First!')</script>";
                header('location: ../index.php?error=' .$error);
            }

            $query2 = "select * from users where id='$user_id'";
            $submit2 = mysqli_query($con, $query2) or die(mysqli_error($con));
            $row = mysqli_fetch_array($submit2);

            ?>
    </div>

    <div class="form">
        <h1>Edit User Details</h1>
        <form action="updateUserScript.php" method="POST">

            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>">

            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>">

            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>">

            <label for="pass">Password</label>
            <input type="text" name="pass" value="<?php echo $row['pass']; ?>">

            <label for="address">Address</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>">

            <button>SUBMIT</button>
            <input class="userid" type="text" name="user_id" value="<?php echo $user_id;?>">
            <input class="userid" type="text" name="admin_id" value="<?php echo $_SESSION['userid'];?>">
        </form>
    </div>
</body>
</html>