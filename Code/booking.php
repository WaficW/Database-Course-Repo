<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli3 = require __DIR__ . "/demo.php";
    
    $sql4 = "SELECT * FROM registration
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli3->query($sql4) or die($mysqli3->error);
    
    $user = $result->fetch_assoc();
}

require_once('demo.php'); 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $delete_query = "INSERT INTO sessionparticipation VALUES(?,?)";
    $stmt = mysqli_prepare($mysqli, $delete_query);
    mysqli_stmt_bind_param($stmt, 'ii', $id, $user["id"]);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: manage_accounts.php");
        exit(); 
    } else {
        echo "Error deleting account: " . mysqli_error($mysqli);
    }
} else {
    echo "No account specified for deletion.";
}
?>