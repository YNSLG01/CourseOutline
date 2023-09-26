<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>หน้าหลัก</title>
</head>
<?php include('navbar/navbar.php'); ?>
<div class="container">

    <center>

        <div class="pic">
            <td><a href="a_approve.php"><button><img src="image/passport.png" width="180" height="180"><br>ประวัติการอนุมัติ</button></a></td>
            <td><a href="a_user.php"><button><img src="image/usericon.png" width="180" height="180"><br>จัดการผู้ใช้งาน</button></a></td>

            <td><a href="a_group.php"><button><img src="image/group.png" width="180" height="180"><br>จัดการกลุ่มสาระ</button></a></td>
            <td><a href="a_notify.php"><button><img src="image/calender.png" width="180" height="180"><br>กำหนดการส่ง</button></a></td>
        </div>

</div>
</center>
</div>
</body>
<style>
    .pic {
        padding-top: 150px;
    }
</style>

</html>