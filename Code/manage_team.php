<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli1 = require __DIR__ . "/demo.php";
    
    $sql1 = "SELECT * FROM registration
            WHERE id = {$_SESSION["user_id"]}";
            
    $result1 = $mysqli1->query($sql1);

    $sql2 = "SELECT * FROM coach
            WHERE id = {$_SESSION["user_id"]}";
            
    $result2 = $mysqli1->query($sql2);
    
    $user = $result1->fetch_assoc();

    $coach = $result2->fetch_assoc();

    $isRole = $user["status"] ==='c';
} else{
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

require_once('demo.php');
require_once('delete-ath.php');

$query = sprintf('SELECT * FROM athlete A NATURAL JOIN registration R WHERE teamID IN (SELECT teamID FROM teams WHERE coachID= %d);', $user["id"]);
$result = mysqli_query($mysqli, $query);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sports Facility Manage Accounts</title>
        <link rel="stylesheet" href="Styles/style_manage_accounts.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <ul class="menubar">
            <a href="coach-homepage.php"><img src="images/SFlogo.png" alt="Our Logo"></a>
            <li><a href="coach-homepage.php"> HOME </a></li>
            <li><a class="" href="aboutus.php"> ABOUT US </a></li>
        </ul>

        <div class="container">
            <div class = "title">Manage Accounts</div>
            <div class="table-div">
                <table class="table">
                    <tr class="table_title">
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Weight</td>
                        <td>Height</td>
                        <td>Position</td>
                        <td>DOB</td>
                        <td>Phone Number</td>
                        <td>Delete Account</td>
                    </tr>
                    <tr>
                    <?php
                        while($rows=mysqli_fetch_assoc($result))
                        {
                    ?>
                        <td hidden><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['firstName']; ?></td>
                        <td><?php echo $rows['lastName']; ?></td>
                        <td><?php echo $rows['weight']; ?></td>
                        <td><?php echo $rows['height']; ?></td>
                        <td><?php echo $rows['position']; ?></td>
                        <td><?php echo $rows['dob']; ?></td>
                        <td><?php echo $rows['number']; ?></td>
                        <td><a href="delete-ath.php?id=<?php echo $rows['id'];?>" class="del_button">Delete</a></td>
                    </tr>

                    <?php
                        }
                    ?>
                    

                </table>
            </div>
        </div>


        <div class="footer">
            <div class="icons">
                <p style="font-size: 10px;">Website was made by Wafic, George, and Omar.</p>
            </div>
        </div>
        
    </body>

</html>