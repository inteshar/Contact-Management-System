<?php

    include "../db_connect.php";
    
    error_reporting(error_reporting() & ~E_NOTICE);

    $user_id = $_POST['userid'];

    $name = mysqli_real_escape_string($con, $_POST['name']);

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);

    $address = mysqli_real_escape_string($con, $_POST['address']);

        $query1 = "INSERT INTO `contacts` (`user_id`, `contactName`, `email`, `mobile`, `address`) VALUES ('$user_id', '$name', '$email', '$mobile', '$address')";
        $submit1 = mysqli_query($con, $query1) or die(mysqli_error($con));

        $query2 = "select * from users where id='$user_id'";
        $submit2 = mysqli_query($con, $query2) or die(mysqli_error($con));
        $row = mysqli_fetch_array($submit2);

        $log = $row['name']." has added new contact named $name";
        $msg1 = "INSERT INTO `logs` (`user_id`, `message`) VALUES ('$user_id', '$log')";
        $submit = mysqli_query($con, $msg1) or die(mysqli_error($con));
        $msg2 = "<script>alert('New Contact Added Successfully!')</script>";

        header('location: ./addContact.php?userid=' .$user_id. '&msg=' .$msg2);
?>