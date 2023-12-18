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
        <link rel="stylesheet" href="Styles/style_aboutus.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <ul class="menubar">
            <?php if($user["status"]==="c"): ?>
                <a href="coach-homepage.php"><img src="images/SFlogo.png" alt="Our Logo"></a>
                <li><a href="coach-homepage.php"> HOME </a></li>
                <li><a class="active" href="aboutus.php"> ABOUT US </a></li>
            <?php elseif($user["status"]==="s"): ?>
                <a href="staff-homepage.php"><img src="images/SFlogo.png" alt="Our Logo"></a>
                <li><a href="staff-homepage.php"> HOME </a></li>
                <li><a class="active" href="aboutus.php"> ABOUT US </a></li>
            <?php elseif($user["status"]==="m" or $user["status"]==="a"): ?>
                <a href="member-homepage.php"><img src="images/SFlogo.png" alt="Our Logo"></a>
                <li><a href="member-homepage.php"> HOME </a></li>
                <li><a class="active" href="aboutus.php"> ABOUT US </a></li>
            <?php endif; ?>
        </ul>
        <!--OMAR SHOULD CHANGE WHERE THE HOME BUTTON AND LOGO REFDIRECTS-->
        <p style="padding-top: 50px;"></p>
        
        <div class="contain">
            <div class="aboutus_text">
                <h1 class="aboutus_pg">About US</h1>
                <p class="aboutus_pg"> We are passionate people who love sports.</p>
                <p class="aboutus_pg"> We want to spread love and fun through sports.</p>
                <p class="aboutus_pg"> We are Wafic, George, and Omar. We came to love sports when we were in university 
                    sepending our days playing table tennis. Since then, we wanted to open a table tennis cluc of our own, 
                    for when we finish university, we can keep on practicing the sport. And that's how we came up with this club. 
                    We later expanded to include other sports by building other stadiums in our complex, and we hope to expand 
                    our facilities and members even more in the future.
                </p>
                <p class="aboutus_pg">{Disclaimer: This is a project and not a real sports club.}</p>
            </div>

            <div class="footer">
                <div class="icons">
                    <p style="font-size: 10px;">Website was made by Wafic, George, and Omar.</p>
                </div>
            </div>
        </div>
    </body>

</html>