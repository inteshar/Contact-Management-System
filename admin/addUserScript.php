<?php

    include "../db_connect.php";
    
    error_reporting(error_reporting() & ~E_NOTICE);

    $admin_id = $_POST['admin_id'];

    $name = mysqli_real_escape_string($con, $_POST['name']);

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);

    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    $address = mysqli_real_escape_string($con, $_POST['address']);

    if(isset($_FILES['doc'])){
        $errors= array();
        $file_name = $_FILES['doc']['name'];
        $file_size =$_FILES['doc']['size'];
        $file_tmp =$_FILES['doc']['tmp_name'];
        $file_type=$_FILES['doc']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['doc']['name'])));
        
        $extensions= array("pdf","doc","docx");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors="File not allowed, please choose a pdf or doc or docx file.";
        }
        
        if($file_size > 3097152){
           $errors='File size should not exceed more than 3 MB';
        }
        
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"documents/".$file_name);
        }else{
           print_r($errors);
        }

        $query1 = "INSERT INTO `users` (`name`, `email`, `mobile`, `pass`, `address`, `id_proof`) VALUES ('$name', '$email', '$mobile', '$pass', '$address', '$file_name')";
        $submit1 = mysqli_query($con, $query1) or die(mysqli_error($con));

        $query2 = "select * from admin where id='$admin_id'";
        $submit2 = mysqli_query($con, $query2) or die(mysqli_error($con));
        $row = mysqli_fetch_array($submit2);

        $log = $row['name']." has added $name";
        $msg1 = "INSERT INTO `logs` (`message`) VALUES ('$log')";
        $submit = mysqli_query($con, $msg1) or die(mysqli_error($con));
        $msg2 = "<script>alert('New User Added Successfully!')</script>";

        header('location: ./addUser.php?userid=' .$admin_id. '&msg=' .$msg2);
     }

?>