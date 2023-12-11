<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/demo.php";
    
    $sql = sprintf("SELECT * FROM registration
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            if($user["status"] === 'c'){
                header("Location: coach-homepage.php");
                exit;
            } elseif($user["status"] === 'm'){
                header("Location: member-homepage.php");
                exit;
            } elseif($user["status"] === 's'){
                header("Location: staff-homepage.php");
                exit;
            }
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Facility Member Log-in</title>
    <link rel="stylesheet" href="Styles/style_login_member.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <div class="box">

    
    <h1>Log-in</h1>
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

        <form method = "post">
            <div class="input">
                <input type="text" placeholder="E-mail" required id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"/>
                <i class='bx bx-envelope' ></i>
            </div>
            <div class="input">
                <input type="password" placeholder="Password" required id="password" name="password"/>
                <i class='bx bx-lock-alt' ></i>
            </div>
            <div class="remember">
                <label><input type="checkbox">Remember Me</label>
            </div>
            <button type="submit" class="btn">Log-in</button>

        </form>
    </div>
    
    <div class="footer">
        <div class="icons">
            <p style="font-size: 10px;">Website was made by Wafic, George, and Omar.</p>
        </div>
    </div>


</html>