<?php
require_once('demo.php'); 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $delete_query = "DELETE FROM registration WHERE id = ?";
    $stmt = mysqli_prepare($mysqli, $delete_query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

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