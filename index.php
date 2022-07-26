<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Stylings/index.css">
    <title>Contact Management System</title>
</head>
<body>
    
    <h1 class="project_name">Contact Management System</h1>
      <div class="form">
            <form method="POST" action="login.php">
            
                <img src="./images/user.png" alt="Login">

                <div class="email">
                    <label for="email">Email</label><br>
                    <input type="text" name="email" required>
                </div>

                <div class="pass">
                    <label for="pass">Password</label><br>
                    <input type="password" name="pass" required>
                </div>

                <div class="userType">
                    <label for="userType">Are you an Admin?</label>
                    <select name="userType" required="true">
                        <option value="NULL">Select User Type</option>
                        <option value="admin">YES</option>
                        <option value="users">NO</option>
                    </select>
                </div>

                <?php error_reporting(error_reporting() & ~E_NOTICE); echo $_GET['error']; ?>

                <button class="submit">LOGIN</button>
            </form>
        </div>  

        <div class="about">
            <h1>About</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A rerum dignissimos vel 
                aperiam repellendus obcaecati tempore eligendi, voluptate beatae ipsa libero. 
                Debitis commodi quod laborum eaque cumque exercitationem laudantium, modi, 
                voluptates consectetur magni rem id non a ratione error facilis omnis laboriosam! 
                Necessitatibus omnis modi sunt voluptate rem, deserunt nobis facilis nesciunt 
                reiciendis ducimus quam placeat.
            </p>
        </div>
</body>
</html>