<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylings/addContact.css">
    <title>Add New Contact</title>
</head>
<body>

<?php
        include "../db_connect.php";

        error_reporting(error_reporting() & ~E_NOTICE);
        echo $_GET['msg'];

        $_SESSION['userid'] = $_GET['userid'];

        $sql_query = "select * from users where id='".$_SESSION['userid']."'";
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

    <div class="form">
        <h1>Add New User</h1>
        <form action="addContactScript.php" method="POST" enctype="multipart/form-data">

            <div class="name">
                <label for="name">Full Name</label><br>
                <input type="text" name="name">
            </div>

            <div>
                <label for="email">Email Address</label><br>
                <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
            </div>

            <div>
                <label for="mobile">Mobile</label><br>
                <input type="text" name="mobile" pattern="\d{2}\d{4}\d{4}">
            </div>

            <div>
                <label for="address">Address</label><br>
                <input type="text" name="address">
            </div>

            <button>SUBMIT</button>
            <input class="userid" type="text" name="userid" value="<?php echo $row['id'];?>">

        </form>
    </div>
</body>
</html>