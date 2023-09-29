<?php
// Include the database connection file
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $img = $_FILES['img']['name']; // Uploaded image filename
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype_id = $_POST['usertype_id']; // Corrected field name to match the form
    $department_id = $_POST['department_id']; // Corrected field name to match the form
    $subject_id = $_POST['subject_id']; // Corrected field name to match the form

    // File Upload Handling
    if (!empty($img)) {
        $path = "../img/"; // Relative path to the image folder
        $type = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $date1 = date("Ymd_His");
        $numran = mt_rand();
        $newname = $numran . $date1 . '.' . $type;
        $path_copy = $path . $newname;

        // Check if the file was uploaded successfully
        if (move_uploaded_file($_FILES['img']['tmp_name'], $path_copy)) {
            // File uploaded successfully
        } else {
            echo "<script>alert('Upload failed');</script>";
            exit;
        }
    } else {
        // Handle the case where no image was uploaded
        $newname = ''; // Set to an empty string or any default value
    }

    // Use prepared statements to prevent SQL injection
    if ($usertype_id == 2) {
        // If usertype_id is 2, insert into the teacher table
        $stmt = mysqli_prepare($conn, "INSERT INTO teacher (name, lastname, subject_id, department_id) VALUES ( ?, ?, ?, ?)");
    } else {
        // If usertype_id is not 2, insert into the user table
        $stmt = mysqli_prepare($conn, "INSERT INTO user (name, surname, email, tel, img, username, password, usertype_id, department_id, subject_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    }

    // Bind parameters
    if ($usertype_id == 2) {
        // If usertype_id is 2, insert into both teacher and user tables
        $stmt_teacher = mysqli_prepare($conn, "INSERT INTO teacher (name, lastname, department_id, subject_id) VALUES (?, ?, ?, ?)");

        // Bind parameters for teacher table
        mysqli_stmt_bind_param($stmt_teacher, "ssis", $name, $surname, $department_id, $subject_id);

        // Execute the teacher statement
        mysqli_stmt_execute($stmt_teacher);

        // Close the teacher statement
        mysqli_stmt_close($stmt_teacher);
    }


    $stmt_user = mysqli_prepare($conn, "INSERT INTO user (name, surname, email, tel, img, username, password, usertype_id, department_id, subject_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters for user table
    mysqli_stmt_bind_param($stmt_user, "sssssssssi", $name, $surname, $email, $tel, $newname, $username, $password, $usertype_id, $department_id, $subject_id);

    // Execute the user statement
    if (mysqli_stmt_execute($stmt_user)) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='a_user.php';</script>";
    } else {
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
    }

    // Close the user statement and connection
    mysqli_stmt_close($stmt_user);
    mysqli_close($conn);
}
?>



<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
    <?php include('navbar/nav.php'); ?>

</head>

<body>

</body>

</html> -->