<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Facility Sign-in</title>
    <link rel="stylesheet" href="Styles/style_createacc.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function divshow(x) {
            if(x==0){
                document.getElementById("team").style.display = "block";
            }else{
                document.getElementById("team").style.display = "none";
            }
            return;
        }
    </script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/github%20repos/Database-Course-Repo/Code/validation.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
        <a href="staff-homepage.php">
            <div class="back_button">
                Back
            </div>
        </a>

    <div class="box">
        <form action="signup.php" method="post" id="signup" novalidate>
            <h1>Create Account</h1>
            <?php 
    
                if(isset($_SESSION['message']))
                {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong></strong> <?= $_SESSION['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php 
                unset($_SESSION['message']);
            }
            ?>
            <div class="input">
                <input type="text" placeholder="First Name"  id="firstName" name="firstName"/>
                <i class='bx bx-user'></i>
            </div>
            <div class="input">
                <input type="text" placeholder="Last Name"  id="lastName" name="lastName"/>
                <i class='bx bx-user'></i>
            </div>
            
            
            <div class="status" id="radioGroup">
                <label for="Staff" class="radio-inline">
                  <input type="radio" name="Status" value="s" id="staff" name="rad1" onclick="divshow(1)" required/>Staff</label>
                <label for="Memeber" class="radio-inline">
                  <input type="radio" name="Status" value="m" id="memeber" name="rad1" onclick="divshow(1)" required/>Member</label>
                <label for="Coach" class="radio-inline">
                    <input type="radio" name="Status" value="c" id="coach-radio" name="rad1" onclick="divshow(0)" required/>Coach</label>
            </div>
            
            <div id='team' style="font-size: 16px; font-weight: 600; display: none;" >
                <br>
                <label for="sport">Choose a sport: </label>
                    <select id="sport" name="sport" >
                        <option value="football" class="FT">Football Team</option>
                        <option value="basketball">Basketball Team</option>
                        <option value="tabletennis">Table Tennis Team</option>
                    </select>
            </div>

              <div class="input">
                <input type="text" placeholder="E-mail"  id="email" name="email"/>
                <i class='bx bx-envelope' ></i>
            </div>
            <div class="input">
                <input type="password" placeholder="Password"  id="password" name="password"/>
                <i class='bx bx-lock-alt' ></i>
            </div>
            <div class="input">
                <input type="number" placeholder="Phone Number"  id="number" name="number"/>
                <i class='bx bx-phone' ></i>
            </div>
            <button type="submit" class="btn">Create Account</button>
            

        </form>
    </div>

</body>

</html>