<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $mysqli = require __DIR__ . "/demo.php";
    
        $sql = "SELECT * FROM registration
            WHERE id = {$_SESSION["user_id"]}";
            
        $result = $mysqli->query($sql);
    
        $user = $result->fetch_assoc();
    } else{
        header("Location: member-homepage.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sports Facility Homepage</title>
        <link rel="stylesheet" href="Styles/style_settings.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <?php if($user["status"]==="c"): ?>
            <a href="coach-homepage.php">
                <div class="back_button">
                    Back
                </div>
            </a>
        <?php elseif($user["status"]==="s"): ?>
            <a href="staff-homepage.php">
                <div class="back_button">
                    Back
                </div>
            </a>
        <?php elseif($user["status"]==="m" or $user["status"]==="a"): ?>
        <a href="member-homepage.php">
            <div class="back_button">
                Back
            </div>
        </a>
        <?php endif; ?>
        <div class="container">
            <form action="change_fname.php" method="post" class="fnamechange">
                <h3>Change First Name:</h3>
                    <input type="text" placeholder="New First Name" name="FirstName" class="NewFN"/><br>
                    <input name="form" type="submit" class="submit"/><br>
                </p>
            </form>

            <br><br>

            <form action="change_lname.php" method="post" class="lnamechange">
                <h3>Change Last Name:</h3>
                    <input type="text" placeholder="New Last Name" name="LastName" class="NewLN"/><br>
                    <input name="form" type="submit" class="submit"/><br>
                </p>
            </form>

            <br><br>

            <form action="change_password.php" method="post" class="change_password">
                <h3>Change Password:</h3>
                    <input type="password" placeholder="New Password" name="Password" class="NewPW"/><br>
                    <input name="form" type="submit" class="submit"/><br>
                </p>
            </form>


        </div>
            
    </body>

</html>