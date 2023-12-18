<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli3 = require __DIR__ . "/demo.php";
    
    $sql4 = "SELECT * FROM registration
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli3->query($sql4) or die($mysqli3->error);
    
    $user = $result->fetch_assoc();
}
$mysqli = require __DIR__ . "/demo.php";

$sql = "UPDATE registration SET password=? WHERE id=?";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

$stmt->bind_param("si",
                  $password_hash,
                  $user["id"]);

if (!$stmt->execute()) {
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
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

        <a href="settings.php">Back to Settings</a>
    </body>
</html>