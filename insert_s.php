<?php
// Include the database connection file
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    // $id = $_POST['id'];
    $class_id = $_POST['class_id'];
    $course_id = $_POST['course_id'];
    $s_name = $_POST['s_name'];
    $department_id = $_POST['department_id'];
    $t_name = $_POST['t_name'];

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO science ( class_id, course_id, s_name, department_id, t_name) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssss",  $class_id, $course_id, $s_name, $department_id, $t_name);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='a_subjects.php';</script>";
    } else {
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้: " . mysqli_error($conn) . "');</script>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
