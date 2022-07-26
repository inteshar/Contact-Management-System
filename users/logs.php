<?php
    include "../db_connect.php";

    error_reporting(error_reporting() & ~E_NOTICE);
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
    <link rel="stylesheet" href="../Stylings/logs.css">
    <title>Activity Logs</title>
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
          <th>Log ID</th>
          <th>Description</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
      <?php
                $query = "select * from logs where user_id='$user_id' ORDER BY time DESC";
                $result = mysqli_query($con, $query);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
        <tr>
            <td><?php echo $row['log_id']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['time']; ?></td>
        </tr>
            <?php
                    }
                }else{
                    echo '<h3 class="msg">No activity found!</h3>';
                }
            ?>
      </tbody>
    </table>
</body>
</html>