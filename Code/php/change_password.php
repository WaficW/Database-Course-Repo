<html>
    <head>
        <title>Confirmation Page of Settings Change</title>
    </head>

    <body>
        <h1>Confirmation Page of Customer Info</h1>

        <p>You have successfully changed your password. 

        <p>Below is a summary of the information you provided.<br><br>  
        <?php

        echo 'Password: ' . $_POST ["Password"] . '<br>';

        ?>

        <a href="../settings.html">Back to Settings</a>
    </body>
</html>