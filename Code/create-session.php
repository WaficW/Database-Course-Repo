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
    <link rel="stylesheet" href="Styles/style_create_session.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<!--CHANGE BUTTON TO COACH HOMEPAGE-->

<body>
    <a href="coach-homepage.php">
        <div class="back_button">
            Back
        </div>
    </a>

    <div class="box">
        <form action="sessioncreation.php" method="post">
            <h1>Create Session</h1>

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

            <div class="court">
                <br>
                Select Court:
            </div>

            <div class="court_number">
                <label for="Court1" class="radio-inline">
                    <input type="radio" name="court_nb" value=1 required/>Court 1</label>
                <label for="Court2" class="radio-inline">
                    <input type="radio" name="court_nb" value=2 required/>Court 2</label>
                <label for="Court3" class="radio-inline">
                    <input type="radio" name="court_nb" value=3 required/>Court 3</label>
            </div>
            
            <div class="court">
                <br>
            Select Start and End Time:
            </div>

            <div class="start_end_time">
                
                <div class="input">
                    <input type="time" placeholder="Start time" required id="startTime" name="startTime"/>
                    <i class='bx bxs-time' ></i>
                </div>
                
                <div class="input">
                    <input type="time" placeholder="Start time" required id="endTime" name="endTime"/>
                    <i class='bx bxs-time' ></i>
                </div>
            </div>

            <div class="court">
                <br>
            Select Date:
            </div>
            <div class="start_date">
                <input type="date" placeholder="Date Of Birth" required id="date" name="date"/>
                <i class='bx bxs-calendar' ></i>
            </div>

            <button type="submit" class="btn">Create Session</button>
            

        </form>
    </div>

</body>

</html>