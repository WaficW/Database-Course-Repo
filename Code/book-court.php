<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Facility Sign-in</title>
    <link rel="stylesheet" href="Styles/style_create_session.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>

<!--CHANGE BUTTON TO CORRESPONDING HOMEPAGE-->

<body>
    <a href="member-homepage.php">
        <div class="back_button">
            Back
        </div>
    </a>

    <div class="box">
        <form action="">
            <h1>Book Court</h1>

            <div class="court">
                <br>
                Select Sport:
            </div>

            <div class="court_number">
                <label for="Football" class="radio-inline">
                    <input type="radio" name="court_nb" required/>Football</label>
                <label for="Basketball" class="radio-inline">
                    <input type="radio" name="court_nb" required/>Basketball</label>
                <label for="TableTennis" class="radio-inline">
                    <input type="radio" name="court_nb" required/>Table Tennis</label>
            </div>

            <div class="court">
                <br>
                Select Court:
            </div>

            <div class="court_number">
                <label for="Court1" class="radio-inline">
                    <input type="radio" name="court_nb" required/>Court 1</label>
                <label for="Court2" class="radio-inline">
                    <input type="radio" name="court_nb" required/>Court 2</label>
                <label for="Court3" class="radio-inline">
                    <input type="radio" name="court_nb" required/>Court 3</label>
            </div>
            
            <div class="court">
                <br>
            Select Start and End Time:
            </div>

            <div class="start_end_time">
                
                <div class="input">
                    <input type="time" placeholder="Start time" required />
                    <i class='bx bxs-time' ></i>
                </div>
                
                <div class="input">
                    <input type="time" placeholder="Start time" required />
                    <i class='bx bxs-time' ></i>
                </div>
            </div>

            <div class="court">
                <br>
            Select Date:
            </div>
            <div class="start_date">
                <input type="date" placeholder="Date Of Birth" required />
                <i class='bx bxs-calendar' ></i>
            </div>

            <button type="submit" class="btn">Create Session</button>
            

        </form>
    </div>

</body>

</html>