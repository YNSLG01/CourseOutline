<?php
include 'conn.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $img = $_POST['img'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype_id = $_POST['usertype_id'];

    // Handle image upload
    // Handle image upload
$imgFileName = ''; // Initialize the image file name

if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $imgTempName = $_FILES['img']['tmp_name'];
    $imgFileName = $_FILES['img']['name'];

    // Move the uploaded image to a directory on your server
    $uploadDirectory = 'upload/'; // Change this to your desired upload directory
    $targetPath = $uploadDirectory . $imgFileName;

    if (move_uploaded_file($imgTempName, $targetPath)) {
        // Image uploaded successfully
    } else {
        // Error occurred while moving the uploaded image
        echo "Error uploading image.";
    }
}


    // Update user information in the database
    $sql = "UPDATE user SET name=?, surname=?, email=?, tel=?, img=?, username=?, password=?, usertype_id=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $name, $surname, $email, $tel, $img, $username, $password, $usertype_id, $id);
    
        if (mysqli_stmt_execute($stmt)) {
            // Successfully updated user information
            header("Location: a_user.php");
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
