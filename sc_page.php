<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sc_page.css">
    <title>กลุ่มสาระการเรียนรู้วิทยาศาสตร์และเทคโนโลยี</title>
</head>
<?php include('navbar/nav.php'); ?>
le="width: 8%;"> แก้ไข</th>
<th style="width: 8%;"> ลบ</th>
<th sty<body>
    <center>
        <div class="container">
            <div class="h2">
                <center>
                    <br>
                    <h2>กลุ่มสาระการเรียนรู้</h2>
                    <br>
                </center>
            </div>
            <div class="button">
                <!-- <a href=".php" class="btn btn-warning mb-4">แก้ไข</a> -->
                <a href=".php" class="btn btn-success mb-4">เพิ่มอาจารย์ผู้สอน</a>

            </div>
            <div class="container" aling="center">
                <div class="tt">
                    <table class="table table-striped">
                        <tr>

                            <th style="width: 8%;"> รหัส</th>
                            <th style="width: 15%;"> ชื่อ</th>
                            <th style="width: 15%;"> นามสกุล</th>

                            <th style="width: 11%;"> รายละเอียด</th>
                        </tr>
                        <?php
include 'conn.php';

// Perform a LEFT JOIN to get all records from department and matching records from teacher
$sql1 = "SELECT department.d_name, teacher.name AS teacher_name, teacher.subject_id
         FROM department
         LEFT JOIN teacher ON department.department_id = teacher.department_id";

// Perform a RIGHT JOIN to get all records from teacher and matching records from department
$sql2 = "SELECT department.d_name, teacher.name AS teacher_name, teacher.subject_id
         FROM department
         RIGHT JOIN teacher ON department.department_id = teacher.department_id";

// Combine the results using UNION
$sql = "($sql1) UNION ($sql2)";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<table>
    <tr>
        <th>Department</th>
        <th>Teacher Name</th>
        <th>Subject ID</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['d_name'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['subject_id'] ?></td>
        </tr>
    <?php } ?>
</table>

<?php
mysqli_close($conn);
?>



                        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
                </div>
                <br>

            </div>
        </div>
        </body>

</html>

<script language="JavaScript">
    function Del(mypage) {
        var agree = confirm("คุณต้องการลบข้อมูลหรือไม่");
        if (agree) {
            window.location = mypage;
        }
    }
</script>
</body>

</html>