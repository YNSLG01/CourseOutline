<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <?php require_once('import_header.php'); ?>   
    <title>ฟอร์มเพิ่มข้อมูลผู้ใช้งาน</title>
</head>
<?php include('navbar/nav.php'); ?>

<body>
    <center>
        <br><br>
        <div class="h2">เพิ่มกลุ่มสาระ</div><br>
    </center>
    <div class="container">

        <div class="row">
            <div class="col-sm4">

                <form action="insert_g.php" method="POST" enctype="multipart/form-data">
                    
                    <label>กลุ่มสาระ</label>
                    <input type="text" name="d_name" class="form-control" placeholder="ชื่อกลุ่มสาระ" required><br>
                    
                        <center>
                            <input type="submit" value="submit" class="btn btn-success">
                            <a href="a_group.php" class="btn btn-danger">Cancel</a>
                        </center>
                </form>
            </div>
        </div>
    </div>
</body>
<style>
.row .col-sm4{
 width: 50%;
margin-left: 330px;
}

/* .h2{
  margin-right: -200px;
} */

.btn {
  margin-left: 20px;
}

</style>
</html>