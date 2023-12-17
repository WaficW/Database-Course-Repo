<?php

$host = "localhost";
$dbname = "dbproject";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

function deleteRecord(mysqli $mysqli, $id) {
    $sql = "DELETE FROM registration WHERE id = '".$id."'";
    $del = $mysqli->query($sql);
    if(!$del){
        throw new Exception(message:"Error deleting record.");
    }
}
return $mysqli;