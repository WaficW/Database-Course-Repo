<?php

session_start();

require_once('demo.php');
require_once('delete.php');

$query = 'SELECT * FROM athlete A, registration R WHERE A.id = R.id';
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
            <a href="staff-homepage.php"><img src="images/SFlogo.png" alt="Our Logo"></a>
            <li><a href="staff-homepage.php"> HOME </a></li>
            <li><a class="active" href="aboutus.php"> ABOUT US </a></li>
        </ul>

        <div class="container">
            <div class = "title">Manage Accounts</div>
            <div class="table-div">
                <table class="table">
                    <tr class="table_title">
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Wight</td>
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
                        <td hidden><?php echo $rows['R.id']; ?></td>
                        <td><?php echo $rows['R.firstName']; ?></td>
                        <td><?php echo $rows['R.lastName']; ?></td>
                        <td><?php echo $rows['A.weight']; ?></td>
                        <td><?php echo $rows['A.height']; ?></td>
                        <td><?php echo $rows['A.position']; ?></td>
                        <td><?php echo $rows['A.dob']; ?></td>
                        <td><?php echo $rows['R.number']; ?></td>
                        <td><a href="delete.php?id=<?php echo $rows['id'];?>" class="del_button">Delete</a></td>
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