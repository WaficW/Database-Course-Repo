<?php
session_start();

require_once('demo.php');
require_once('delete.php');

$query = 'SELECT * FROM sessionparticipation SP NATURAL JOIN sessions S NATURAL JOIN resgistration R WHERE bookerID = '.$_SESSION['user_id'].'';
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
            <a href="member-homepage.php"><img src="images/SFlogo.png" alt="Our Logo"></a>
            <li><a href="member-homepage.php"> HOME </a></li>
            <li><a class="" href="aboutus.php"> ABOUT US </a></li>
        </ul>

        <div class="container">
            <div class = "title">Manage Accounts</div>
            <div class="table-div">
                <table class="table">
                    <tr class="table_title">
                        <td>Coach First Name</td>
                        <td>Coach Last Name</td>
                        <td>Sport</td>
                        <td>Court</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Session Date</td>
                        <td>Delete Account</td>
                    </tr>
                    <tr>
                    <?php
                        while($rows=mysqli_fetch_assoc($result))
                        {
                    ?>
                        <td hidden><?php echo $rows['S.sessionID']; ?></td>
                        <td><?php echo $rows['R.firstName']; ?></td>
                        <td><?php echo $rows['R.lastName']; ?></td>
                        <td><?php echo $rows['S.sport']; ?></td>
                        <td><?php echo $rows['S.court']; ?></td>
                        <td><?php echo $rows['startTime']; ?></td>
                        <td><?php echo $rows['endTime']; ?></td>
                        <td><?php echo $rows['sessionDate']; ?></td>
                        <td><a href="delete_booking.php?id=<?php echo $rows['S.sessionID'];?>" class="del_button">Delete</a></td>
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