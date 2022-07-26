<?php

    include "../db_connect.php";
    
    error_reporting(error_reporting() & ~E_NOTICE);

    $admin_id = $_POST['admin_id'];

    $user_id = $_POST['user_id'];

    $name = mysqli_real_escape_string($con, $_POST['name']);

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);

    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    $address = mysqli_real_escape_string($con, $_POST['address']);

        $query1 = "UPDATE `users` SET `name` = '$name', `email` = '$email', `mobile` = '$mobile', `pass` = '$pass', `address` = '$address' WHERE `users`.`id` = '$user_id'";
        $submit1 = mysqli_query($con, $query1) or die(mysqli_error($con));

        $query2 = "select * from admin where id='$admin_id'";
        $submit2 = mysqli_query($con, $query2) or die(mysqli_error($con));
        $row = mysqli_fetch_array($submit2);

        $log = $row['name']." has updated details of $name";
        $msg1 = "INSERT INTO `logs` (`message`) VALUES ('$log')";
        $submit = mysqli_query($con, $msg1) or die(mysqli_error($con));
        $msg2 = "<script>alert('User Details Updated Successfully!')</script>";

        header('location: ./manageUsers.php?userid=' .$admin_id. '&msg=' .$msg2);

?>