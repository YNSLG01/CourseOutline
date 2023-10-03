<?php
include 'conn.php';

// รับค่า department_id และ d_name จากฟอร์มที่ส่งมาผ่าน POST
$department_id = $_POST['department_id'];
$d_name = $_POST['d_name'];

// อัปเดตข้อมูลแผนกในฐานข้อมูล
$sql = "UPDATE department SET d_name=? WHERE department_id=?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $d_name, $department_id);

    if (mysqli_stmt_execute($stmt)) {
        // อัปเดตข้อมูลแผนกสำเร็จ
        header("Location: a_group.php");
        exit;
    } else {
        // เกิดข้อผิดพลาดในระหว่างการอัปเดต
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    // เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL
    echo "Error: " . mysqli_error($conn);
}

// หากฟอร์มไม่ได้ถูกส่งหรือมีข้อผิดพลาดเกิดขึ้น
?>
