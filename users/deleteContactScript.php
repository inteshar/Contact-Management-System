<?php
    include "../db_connect.php";
    
    error_reporting(error_reporting() & ~E_NOTICE);

    $user_id = mysqli_real_escape_string($con, $_POST['userid']);
    $con_id = mysqli_real_escape_string($con, $_POST['con_id']);

    $query1 = "DELETE FROM `contacts` WHERE `user_id`= '$user_id'";
    $submit1 = mysqli_query($con, $query1) or die(mysqli_error($con));

    $query2 = "select * from users where id='$user_id'";
    $submit2 = mysqli_query($con, $query2) or die(mysqli_error($con));
    $row = mysqli_fetch_array($submit2);

    $con_name = $_POST['con_name'];
    $log = $row['name']." has deleted contact $con_name.";
    $msg1 = "INSERT INTO `logs` (`user_id`, `message`) VALUES ('$user_id', '$log')";
    $submit = mysqli_query($con, $msg1) or die(mysqli_error($con));

    $msg2 = "<script>alert('Contact Deleted Successfully!')</script>";
    header('location: ./manageContact.php?userid=' .$user_id. '&msg=' .$msg2);
?>