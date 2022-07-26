<?php

    error_reporting(error_reporting() & ~E_NOTICE);
    echo $_GET['msg'];

    include "../db_connect.php";

        echo $_GET['msg'];

        $_SESSION['userid'] = $_GET['userid'];

        $user_id = $_SESSION['userid'];

        $sql_query = "select * from users where id='".$_SESSION['userid']."'";
        $result = mysqli_query($con, $sql_query);
        
        $row = mysqli_fetch_array($result);

        include "./sideNav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylings/manageUsers.css">
    <title>Manage Contacts</title>
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

            ?>
    </div>

    <table>   
        <thead>
        <tr>
          <th>Contact ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Address</th>
          <th>Registered On</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
                $query = "select * from contacts where user_id='$user_id' ORDER BY contactName ASC";
                $result = mysqli_query($con, $query);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['contactName']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['createDate']; ?></td>
            <td>
                <form class="edit" action="editContactDetails.php" method="POST">
                        <button>Edit Details</button>
                        <input class="inputs" type="text" name="con_id" value="<?php echo $row['id']; ?>">
                        <input class="inputs" type="text" value="<?php echo $_SESSION['userid']; ?>" name="userid">
                </form>
                <form class="delete" action="deleteContactScript.php" method="POST">
                        <button>Delete</button>
                        <input class="inputs" type="text" name="con_id" value="<?php echo $row['id']; ?>">
                        <input class="inputs" type="text" name="con_name" value="<?php echo $row['contactName']; ?>">
                        <input class="inputs" type="text" value="<?php echo $_SESSION['userid']; ?>" name="userid">
                </form> 
            </td>
        </tr>
            <?php
                    }
                }else{
                    echo '<h3 class="msg">No user found!</h3>';
                }
            ?>
      </tbody>
    </table>
</body>
</html>