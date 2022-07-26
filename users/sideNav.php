<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Stylings/sideNav.css">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="./users_dashboard.php?userid=<?php echo $_SESSION['userid']; ?>" class="link">Dashboard</a>
        <a href="logs.php?userid=<?php echo $_SESSION['userid'] ?>" class="link">Activity Logs</a>
        <a href="./addContact.php?userid=<?php echo $_SESSION['userid'] ?>" class="link">Add New Contact</a>
        <a href="./manageContact.php?userid=<?php echo $_SESSION['userid'] ?>" class="link">Manage Contacts</a>
        <a href="./manageAccount.php?userid=<?php echo $_SESSION['userid'] ?>" class="link">Manage Account</a>
        <a href="../logout.php" class="link">Logout</a>
      </div>
      
      
      <span onclick="openNav()"><img class="menuList" src="../images/list.svg" alt=""></span>
      
</body>
</html>

<script>

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}


function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  document.body.style.backgroundColor = "white";
}
</script>