<?php

function checkAPIPermission($conn, $filename) {
    $res =0 ;

  
    // Check if $_SESSION["userID"] and $_SESSION["userTypeID"] are set
    if (isset($_SESSION["userID"]) && isset($_SESSION["userTypeID"])) {
        // $userID = $_SESSION["userID"];
        $userTypeID = $_SESSION["userTypeID"];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM `permission_api_usertype_full` WHERE `usertype_id` = ? AND `file_name` = ?");
        
        // Bind the parameters
        $stmt->bind_param("is", $userTypeID, $filename);

        // Execute the prepared statement
        $stmt->execute();

        // Store the result
        $stmt->store_result();

        // Check if the number of rows returned is 1
        if ($stmt->num_rows == 1) {
            $res = 1; // User has the required permission
        }

        $stmt->close();
    }
    return  $res; // Return false if either of the session variables is not set or user doesn't have the required permission
}




function checkWebPermission(){

    return true ;
}




?>