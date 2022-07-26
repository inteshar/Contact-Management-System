<?php

    include "./db_connect.php";

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $userType = $_POST['userType'];

    $sql_query = "select * from ".$userType." where email='".$email."' and pass='".$pass."'";
    $result = mysqli_query($con, $sql_query);
    $num = mysqli_num_rows($result);
    if($num == 0){
        $error = "<script>alert('Invalid Email or Password!')</script>";
        header('location: index.php?error=' . $error);
    }else{
        $row = mysqli_fetch_array($result);
        $user_id = $row['id'];
        $_SESSION['id'] = $row['id'];
        header('location: ./'.$userType.'/'.$userType.'_dashboard.php?userid=' .$user_id);
    }
?>