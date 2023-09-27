<?php include('conn.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
  <title>การจัดการกลุ่มสาระ</title>
</head>
<?php include('navbar/nav.php'); ?>

<body>
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
        <a href="formgroup.php" class="btn btn-success mb-4">เพิ่มกลุ่มสาระ</a>

      </div>
      <div class="container" aling="center">
        <div class="tt">
          <table class="table table-striped">
            <tr>

              <th style="width: 10%;"> ลำดับ</th>
              <th style="width: 60%;"> กลุ่มสาระ</th>
              <th style="width: 9%;"> แก้ไข</th>
              <th style="width: 7%;"> ลบ</th>
              <th style="width: 11%;"> รายละเอียด</th>
            </tr>
            <?php
           $sql = "SELECT * FROM department";
           $result = mysqli_query($conn, $sql);
                     while ($row = mysqli_fetch_array($result)) {

            ?>
              <tr>
                <td><?= $row['department_id'] ?></td>
                <td><?= $row['d_name'] ?></td>

                <td><a href="editgroup.php?id=<?= $row["department_id"] ?>" class="btn btn-warning">แก้ไข</a></td>
                <td><a href="delgroup.php?id=<?= $row["department_id"] ?> " class="btn btn-danger" onclick="Del(this.href);return false;">ลบ</a></td>
                <td><a href="sc_page.php" class="btn btn-info">รายละเอียด</a></td>
                <!-- <td><a href="macth_page.php?" class="btn btn-info">รายละเอียด</a></td> -->
              </tr>
            <?php
            }
            mysqli_close($conn);
            ?>
          </table>
          <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
        </div>
        <br>

      </div>
    </div>
</body>
<style>
  .tt{
    width: 90%;
    margin-left: 190px;
    font-size: 16px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .button {
        margin-left: -800px;
    }
 
</style>
</html>

<script language="JavaScript">
  function Del(mypage) {
    var agree = confirm("คุณต้องการลบข้อมูลหรือไม่");
    if (agree) {
      window.location = mypage;
    }
  }
</script>