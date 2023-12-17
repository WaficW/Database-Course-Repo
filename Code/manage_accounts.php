<?php

require_once('php/demo.php');
$query = 'SELECT * FROM registration';
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
            <a href="member-homepage.html"><img src="images/SFlogo.png" alt="Our Logo"></a>
            <li><a href="member-homepage.html"> HOME </a></li>
            <li><a class="active" href="aboutus.html"> ABOUT US </a></li>
        </ul>

        <div class="container">
            <div class = "title">Manage Accounts</div>
            <div class="table-div">
                <table class="table">
                    <tr class="table_title">
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Status</td>
                        <td>Email</td>
                        <td>Phone Number</td>
                    </tr>
                    <tr>
                    <?php
                        while($rows=mysqli_fetch_assoc($result))
                        {
                    ?>
                        <td><?php echo $rows['firstName']; ?></td>
                        <td><?php echo $rows['lastName']; ?></td>
                        <td><?php echo $rows['status']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['phoneNumber']; ?></td>
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