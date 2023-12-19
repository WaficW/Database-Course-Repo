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

$sql = "INSERT INTO bookings (bookerID, courtID, sport, startTime, endTime, bookingDate)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

if($_POST["sport"] === "football"){
    $courtNumber = $_POST["court_nb"];
    $sport = $_POST["sport"];
    $stmt->bind_param("iissss",
                  $user["id"],
                  $courtNumber,
                  $sport,
                  $_POST["startTime"],
                  $_POST["endTime"],
                  $_POST["date"]);
} elseif($_POST["sport"]==="basketball"){
    $courtNumber = $_POST["court_nb"]+3;
    $sport = $_POST["sport"];
    $stmt->bind_param("iissss",
                  $user["id"],  
                  $courtNumber,
                  $sport,
                  $_POST["startTime"],
                  $_POST["endTime"],
                  $_POST["date"]);
} elseif($_POST["sport"]==="tabletennis"){
    $courtNumber = $_POST["court_nb"]+6;
    $sport = $_POST["sport"];
    $stmt->bind_param("iissss",
                  $user["id"],
                  $courtNumber,
                  $sport,
                  $_POST["startTime"],
                  $_POST["endTime"],
                  $_POST["date"]);
}

if ($stmt->execute()) {
    $_SESSION["message"] = "Reservation was added successfully";

    header("Location: /github%20repos/Database-Course-Repo/Code/create-session.php");
    exit;
}
