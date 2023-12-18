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

<!--CHANGE BUTTON TO COACH HOMEPAGE-->

<body>
    <a href="coach-homepage.html">
        <div class="back_button">
            Back
        </div>
    </a>

    <div class="box">
        <form action="">
            <h1>Create Session</h1>

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
                Select Total Number of Sessions:
                <div class="input">
                    <input type="number" placeholder="Total Number Of Sessions" required />
                </div>
            </div>
            
            <div class="court">
                Select Number of Sessions Per Week:
            <div class="Days">
                <label for="1" class="radio-inline">
                    <input type="checkbox" name="1" required/>1</label>
                <label for="2" class="radio-inline">
                    <input type="checkbox" name="2" required/>2</label>
                <label for="3" class="radio-inline">
                    <input type="checkbox" name="3" required/>3</label>
                <label for="4" class="radio-inline">
                    <input type="checkbox" name="4" required/>4</label>
                <label for="5" class="radio-inline">
                    <input type="checkbox" name="5" required/>5</label>
                <label for="6" class="radio-inline">
                    <input type="checkbox" name="6" required/>6</label>
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