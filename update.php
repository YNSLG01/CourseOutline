<?php
include 'conn.php';

$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$imgFileName = ''; // Initialize the image file name
$username = $_POST['username'];
$password = $_POST['password'];
$usertype_id = $_POST['usertypeID'];
echo $username;
exit(1);   
if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $imgFileName = $_FILES['img']['name'];
    echo $imgFileName;
   exit(1); 
}

// Handle image upload
if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $imgTempName = $_FILES['img']['tmp_name'];
    $imgFileName = $_FILES['img']['name'];
    echo $imgFileName;
    exit(1);
    // Move the uploaded image to a directory on your server
    $uploadDirectory = 'upload/'; // Change this to your desired upload directory
    $targetPath = $uploadDirectory . $imgFileName;

    if (move_uploaded_file($imgTempName, $targetPath)) {
        // Image uploaded successfully
    } else {
        // Error occurred while moving the uploaded image
        echo "Error uploading image.";
        exit; // Exit the script if there's an error in image upload
    }
}

// Build the SQL update query based on whether an image is provided or not
if (!empty($imgFileName)) {
    // Update user information including the image
    $sql = "UPDATE user SET name=?, surname=?, email=?, tel=?, img=?, username=?, password=?, usertype_id=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $name, $surname, $email, $tel, $imgFileName, $username, $password, $usertype_id, $id);
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
} else {
    // Update user information excluding the image
    $sql = "UPDATE user SET name=?, surname=?, email=?, tel=?, username=?, password=?, usertype_id=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $name, $surname, $email, $tel, $username, $password, $usertype_id, $id);
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}

// Execute the SQL update query
if (mysqli_stmt_execute($stmt)) {
    // Successfully updated user information
    header("Location: a_user.php");
    exit;
} else {
    // Error occurred while executing the update query
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
?>
