<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/demo.php";
    
    $sql = "SELECT * FROM registration
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    $isRole = $user["status"] ==='s';
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sports Facility Homepage</title>
        <link rel="stylesheet" href="Styles/style_staff_home.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <ul class="menubar">
            <a href=""><img src="images/SFlogo.png" alt="Our Logo"></a>
            <li><a class="active" href="staff-homepage.php"> HOME </a></li>
            <li><a href="aboutus.php"> ABOUT US </a></li>
        </ul>

        <p style="padding-top: 50px;"></p>
        <?php if(isset($user) && $isRole): ?>
        <h1 style="margin-left: 50px;"> How's it kickin' <span class="welcome_name"> <?= htmlspecialchars($user["firstName"]) ?></span>?</h1>
        <h1 style="margin-left: 50px;"> <a href="logout.php">Log out</a></h1>

            <div class="menu_select">
                <a href="create-account.php"><div class="row1"><i class='bx bxs-edit-alt'></i><p>Create Account</p></div></a>
                <a href="manage_accounts.php"><div class="row1"><i class='bx bxs-user-account'></i><p>Manage Accounts</p></div></a>
                <a href="manage_bookings"><div class="row1"><i class='bx bx-book'></i><p>Manage Bookings</p></div></a>
                <a href="manage_sessions.php"><div class="row2"><i class='bx bxs-calendar-exclamation' ></i><p>Manage Sessions</p></div></a>
                <a href="settings.php"><div class="row2"><i class='bx bxs-cog'></i><p>My Settings</p></div></a>
            </div>
        <?php else: ?>
        
            <h1 style="margin-left: 50px;"> <a href="login.php">Log in</a></h1>
    
        <?php endif; ?> 
            <div class="footer">
                <div class="icons">
                    <p style="font-size: 10px;">Website was made by Wafic, George, and Omar.</p>
                </div>
            </div>
        
    </body>

</html>