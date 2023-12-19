<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli3 = require __DIR__ . "/demo.php";
    
    $sql4 = "SELECT * FROM coach
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli3->query($sql4) or die($mysqli3->error);
    
    $user = $result->fetch_assoc();
}

$mysqli = require __DIR__ . "/demo.php";

$sql = "INSERT INTO sessions (court, sport, startTime, endTime, sessionDate)
        VALUES (?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

if($user["sport"] === "football"){
    $courtNumber = $_POST["court_nb"];
    $stmt->bind_param("issss",
                  $courtNumber,
                  $user["sport"],
                  $_POST["startTime"],
                  $_POST["endTime"],
                  $_POST["date"]);
} elseif($user["sport"]==="basketball"){
    $courtNumber = $_POST["court_nb"]+3;
    $stmt->bind_param("issss",
                  $courtNumber,
                  $user["sport"],
                  $_POST["startTime"],
                  $_POST["endTime"],
                  $_POST["date"]);
} elseif($user["sport"]==="tabletennis"){
    $courtNumber = $_POST["court_nb"]+6;
    $stmt->bind_param("issss",
                  $courtNumber,
                  $user["sport"],
                  $_POST["startTime"],
                  $_POST["endTime"],
                  $_POST["date"]);
}

if ($stmt->execute()) {
    $_SESSION["message"] = "Session was added successfully";

    header("Location: /github%20repos/Database-Course-Repo/Code/create-session.php");
    exit;
}
