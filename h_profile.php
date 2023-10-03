<?php
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION["username"])) {
    header("location: login.php"); // หากไม่ได้เข้าสู่ระบบให้เปลี่ยนเส้นทางไปหน้า login.php
    exit;
}

// ทำการดึงข้อมูลของผู้ใช้จากฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "satit";

$data = mysqli_connect($servername, $username, $password, $dbname);
if ($data === false) {
    die("connection error");
}

$username = $_SESSION["username"];

$sql = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_assoc($result);

// หน้า HTML เพื่อแสดงข้อมูลส่วนตัว
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit.css">
    <title>ข้อมูลส่วนตัว</title>
    <?php require_once('import_header.php'); ?>

</head>


<body>
    <center> <br><br>
        <div class="h2">ข้อมูลส่วนตัว</div><br>
    </center>
    <div class="container" style="width: 50%;">
        <div class="row" align="center"></div>
        <div class="col-sm4">
            <form action="edit_tprofile.php" method="POST" enctype="multipart/form-data">
                <center><img src="<?= $row['img'] ?>" alt="User Image" style="max-width: 200px; max-height: 200px;"></center><br>
                <label>ชื่อ</label>
                <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>"><br>
                <label>นามสกุล</label>
                <input type="text" name="surname" class="form-control" value="<?= $row['surname'] ?>"><br>
                <label>อีเมล</label>
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>"><br>
                <label>เบอร์โทรศัพท์</label>
                <input type="number" a="tel" class="form-control" value="<?= $row['tel'] ?>"><br>
                <label>ชื่อผู้ใช้</label>
                <input type="username" name="username" class="form-control" value="<?= $row['username'] ?>"><br>
                <label>รหัสผ่าน</label>
                <input type="text" a="password" class="form-control" value="<?= $row['password'] ?>"><br>

                <center>
                    <a href="edit_profile.php" class="btn btn-warning">Edit Profile</a>
                    <a href="headhome.php" class="btn btn-danger">Back</a>
                </center>
        </div>
    </div>
    </div>
</body>

</html>
