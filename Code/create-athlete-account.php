<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/demo.php";
    
    $sql = "SELECT * FROM registration
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $sql2 = "SELECT * FROM coach
            WHERE id = {$_SESSION["user_id"]}";
            
    $result2 = $mysqli->query($sql2);

    $user = $result->fetch_assoc();

    $coach = $result2->fetch_assoc();

    $isRole = $user["status"] ==='c';
} else {
    header("Location: member-homepage.php");
    exit;
}
if($isRole!='c') {
    header("Location: member-homepage.php");
    exit;
} elseif($coach["inTeam"] == 0) {
    header("Location: coach-homepage.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Facility Sign-in</title>
    <link rel="stylesheet" href="Styles/style_createathacc.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</head>

<body>
        <a href="coach-homepage.php">
            <div class="back_button">
                Back
            </div>
        </a>

        <div class="box">
        <?php if($isRole!='c'): ?>
            <h1 style="margin-left: 50px;"> Restricted Access
            <?php if($isRole=='m'): ?>
                <h2 style="margin-left: 50px;"> <a href="member-homepage.php">Return</a></h2>
            <?php elseif($isRole=='s'): ?>
                <h2 style="margin-left: 50px;"> <a href="staff-homepage.php">Return</a></h2>
            <?php endif; ?>
        </h1>
            
    <?php else: ?>
            <form action="athlete-signup.php" method="post">
                <h1>Create Athlete Account</h1>
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
                    <input type="text" placeholder="First Name" required title="First Name" id="firstName" name="firstName"/>
                    <i class='bx bx-user'></i>
                </div>

                <div class="input">
                    <input type="text" placeholder="Last Name" required title="Last Name" id="lastName" name="lastName"/>
                    <i class='bx bx-user'></i>
                </div>

                <div class="input">
                    <input type="numder" placeholder="Height (Meters)" required title="Height" id="height" name="height"/>
                    <i class='bx bx-up-arrow-alt'></i>
                </div>

                <div class="input">
                    <input type="number" placeholder="Weight (KG)" required title="Weight" id="weight" name="weight"/>
                    <i class='bx bx-scan'></i>
                </div>

                <div class="input">
                    <input type="text" placeholder="Position" title="Position" id="position" name="position"/>
                    <i class='bx bx-cross'></i>
                </div>
                
                <div class="input">
                    <input type="text" placeholder="E-mail" required title="E-mail" id="email" name="email"/>
                    <i class='bx bx-envelope' ></i>
                </div>

                <div class="input">
                    <input type="password" placeholder="Password" required id="password" name="password"/>
                    <i class='bx bx-lock-alt' ></i>
                </div>

                <div class="input">
                    <input type="number" placeholder="Phone Number" required title="Phone Number" id="number" name="number"/>
                    <i class='bx bx-phone' ></i>
                </div>

                <div class="input">
                    <input type="date" placeholder="Date Of Birth" required id="dob" name="dob"/>
                    <i class='bx bxs-calendar' ></i>
                </div>


                <button type="submit" class="btn">Create Account</button>
                

            </form>
        </div>
    <?php endif; ?>

</body>

</html>