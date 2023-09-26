<?php
include 'conn.php';
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id='$id'";
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
    <link rel="stylesheet" href="css/edit.css?">
    <title>ฟอร์มแก้ไขข้อมูลผู้ใช้งาน</title>
   
</head>

<body>
    <center> <br><br>
        <div class="h2">แก้ไขข้อมูลผู้ใช้งาน</div><br>
    </center>
    <div class="container" style="width: 40%;">
        <div class="row" align="center"></div>
            <div class="col-sm4">
                <form action="update.php" method="POST">
                                     
                        <label>id</label>
                        <input type="text" name="id" class="form-control" readonly value=<?= $row['id'] ?>><br>
                        <label>name</label>
                        <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>"><br>
                        <label>surname</label>
                        <input type="text" name="surname" class="form-control" value=<?= $row['surname'] ?>><br>
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" value=<?= $row['email'] ?>><br>
                        <label>image</label>
                        <input type="file" name="img" class="form-control" accept="image/*" value=<?= $row['img'] ?>><br>
                        <label>Tel</label>
                        <input type="number" name="tel" class="form-control" value=<?= $row['tel'] ?>><br>
                        <label>username</label>
                        <input type="text" name="username" class="form-control" value=<?= $row['username'] ?>><br>
                        <label>password</label>
                        <input type="text" name="password" class="form-control" value=<?= $row['password'] ?>><br>
                        <label>Usertype</label>
                        <select name="usertype_id" class="form-select form-select-sm" aria-label="Small select example">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        <option value="10">Executive</option>
                        <option value="3">หัวหน้ากลุ่มสาระวิทยาศาตร์และเทคโนโลยี</option>
                        <option value="4">หัวหน้ากลุ่มสาระภาษาต่างประเทศ</option>
                        <option value="5">หัวหน้ากลุ่มสาระภาษาไทย</option>
                        <option value="6">หัวหน้ากลุ่มสาระคณิตศาสตร์</option>
                        <option value="7">หัวหน้ากลุ่มสาระสังคมศึกษา</option>
                        <option value="8">หัวหน้ากลุ่มสาระสุนทรียภาพ</option>
                        <option value="9">กลุ่มสาระพัฒนาผู้เรียน</option>
                        </select><br><br>
                        <center>
                            <input type="submit" value="update" class="btn btn-success">
                            <a href="a_user.php" class="btn btn-danger">Cancel</a>
                        </center>
                    </div>
                </form>

</html>