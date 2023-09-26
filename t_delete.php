<?php
include 'conn.php';
$ids = $_GET['tbl_id'];
$sql="DELETE FROM tbl_pdf WHERE tbl_id='$ids' ";
if(mysqli_query($conn,$sql)){
    echo  "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
    echo  "<script>window.location='t_course.php';</script>";
}else{
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($conn);
?>