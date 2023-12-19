<?php

session_start();

if (empty($_POST["firstName"])) {
    die("First ame is required");
}

if (empty($_POST["lastName"])) {
    die("Last name is required");
}

if (empty($_POST["Status"])) {
    die("Status is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if (empty($_POST["number"])) {
    die("Phone number is required");
}


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/demo.php";

$sql = "INSERT INTO registration (firstName, lastName, status, email, password, number)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssi",
                  $_POST["firstName"],
                  $_POST["lastName"],
                  $_POST["Status"],
                  $_POST["email"],
                  $password_hash,
                  $_POST["number"],);

if (!$stmt->execute()) {
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

$sql2 = sprintf("SELECT * FROM registration WHERE email='%s'", $mysqli->real_escape_string($_POST["email"]));

$result = $mysqli->query($sql2);

$userID = $result->fetch_assoc();

if($_POST["sport"] === "footballt"){
    $sql1 = "UPDATE teams SET coachID=? WHERE teamID=1";
} elseif($_POST["sport"] === "basketballt"){
    $sql1 = "UPDATE teams SET coachID=? WHERE teamID=2";
} elseif($_POST["sport"] === "tabletennist"){
    $sql1 = "UPDATE teams SET coachID=? WHERE teamID=3";
}

$stmt1 = $mysqli->stmt_init();

if(!$stmt1->prepare($sql1)){
    die("SQL error: " . $mysqli->error);
}

$stmt1->bind_param("i",
                   $userID["id"]);

if ($stmt1->execute()) {

    if($_POST["Status"] === 'm'){
        $_SESSION["message"] = "Member " . $_POST["firstName"] . " was added successfully";
    }
    if($_POST["Status"] === 's'){
        $_SESSION["message"] = "Staff " . $_POST["firstName"] . " was added successfully";
    }
    if($_POST["Status"] === 'c'){
        $_SESSION["message"] = "Coach " . $_POST["firstName"] . " was added successfully";
    }

    header("Location: /github%20repos/Database-Course-Repo/Code/create-account.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("coach is coaching another team");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}