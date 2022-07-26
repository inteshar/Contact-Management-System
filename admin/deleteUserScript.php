<?php
    include "../db_connect.php";
    
    error_reporting(error_reporting() & ~E_NOTICE);

    $admin_id = $_POST['userid'];

    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $query1 = "DELETE FROM `users` WHERE `users`.`id` = '$user_id'";
    $submit1 = mysqli_query($con, $query1) or die(mysqli_error($con));

    $query2 = "select * from admin where id='$admin_id'";
    $submit2 = mysqli_query($con, $query2) or die(mysqli_error($con));
    $row = mysqli_fetch_array($submit2);

    $user_name = $_POST['user_name'];
    $log = $row['name']." has deleted $user_name with user ID $user_id";
    $msg1 = "INSERT INTO `logs` (`message`) VALUES ('$log')";
    $submit = mysqli_query($con, $msg1) or die(mysqli_error($con));

    $msg2 = "<script>alert('User Deleted Successfully!')</script>";
    header('location: ./manageUsers.php?userid=' .$admin_id. '&msg=' .$msg2);
?>