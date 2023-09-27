<?php
include 'conn.php';

    $id = $_POST['department_id'];
    $course = $_POST['d_name'];
    // Update user information in the database
    $sql = "UPDATE department SET department_id=?, d_name=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $id, $course);
    
        if (mysqli_stmt_execute($stmt)) {
            // Successfully updated user information
            header("Location: a_group.php");
            exit;
        } else {
            // Error occurred while executing the update query
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_stmt_close($stmt);
    } else {
        // Error occurred while preparing the SQL statement
        echo "Error: " . mysqli_error($conn);
    }
   
// If the form hasn't been submitted or if there was an error, you can handle it here.

// If the form hasn't been submitted or if there was an error, you can handle it here.
?>
