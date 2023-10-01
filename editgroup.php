<?php
include 'conn.php';
$id = $_GET['department_id'];
$sql = "SELECT * FROM department WHERE department_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    <?php require_once('import_header.php'); ?>
    <title>ฟอร์มแก้ไขข้อมูลผู้ใช้งาน</title>

</head>

<body>
    <center> <br><br>
        <div class="h2">แก้ไขข้อมูลกลุ่มสาระ</div><br>
    </center>
    <div class="container" style="width: 40%;">
        <div class="row" align="center"></div>
        <div class="col-sm4">
        <form action="updategroup.php" method="POST">
    <label>ลำดับ</label>
    <input type="number" name="department_id" class="form-control" placeholder="ลำดับ" value="<?php echo $row['department_id']; ?>" required><br>
    <label>กลุ่มสาระ</label>
    <input type="text" name="d_name" class="form-control" placeholder="ชื่อกลุ่มสาระ" value="<?php echo $row['d_name']; ?>" required><br>
    <center>
        <input type="submit" value="Update" class="btn btn-success">
        <a href="a_group.php" class="btn btn-danger">Cancel</a>
    </center>
</form>


</html>