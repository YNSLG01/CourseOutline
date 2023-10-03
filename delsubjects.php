<?php
include 'conn.php';
$ids = $_GET['id'];
$sql="DELETE FROM subjects WHERE s_name='$ids' ";
if(mysqli_query($conn,$sql)){
    echo  "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
    echo  "<script>window.location='a_subjects.php';</script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($conn);
?>