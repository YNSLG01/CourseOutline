<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <title>ฟอร์มเพิ่มข้อมูลผู้ใช้งาน</title>
</head>
<?php include('navbar/nav.php'); ?>

<body>
    <center>
        <br><br>
        <div class="h2">เพิ่มข้อมูลผู้ใช้งาน</div><br>
    </center>
    <div class="container">

        <div class="row">
            <div class="col-sm4">

                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="ชื่อ" required><br>
                    <label>Surname</label>
                    <input type="text" name="surname" class="form-control" placeholder="นามสกุล" required><br>
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="อีเมล" required><br>
                    <label>Tel</label>
                    <input type="number" name="tel" class="form-control" placeholder="เบอร์โทรศัพท์" required><br>
                    <label>Image</label>
                    <input type="file" name="img" class="form-control" placeholder="รูปภาพ" accept="image/*" required><br>
                    
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้" required><br>
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" placeholder="รหัสผ่าน" required><br>
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
                        </select><br>
                        <center>
                            <input type="submit" value="submit" class="btn btn-success">
                            <a href="a_user.php" class="btn btn-danger">Cancel</a>
                        </center>
                </form>
            </div>
        </div>
    </div>
</body>

</html>