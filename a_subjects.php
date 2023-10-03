<?php
include 'conn.php';

// Check if the department_id is provided in the URL parameters
if (isset($_GET['id'])) {
    $department_id = $_GET['id'];

    // Fetch information from the teacher and subject tables based on the department_id
    $sql = "SELECT subjects.*, department.d_name FROM subjects
            JOIN department ON subjects.department_id = department.department_id
            WHERE subjects.department_id = $department_id";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
} else {
    // Handle the case when department_id is not provided
    echo "Department ID is not specified.";
    exit;
}
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
            <h2>วิชา</h2>
            <br>
          </center>
        </div>
        <div class="button">
          <!-- <a href=".php" class="btn btn-warning mb-4">แก้ไข</a> -->
          <a href="formsubjects.php" class="btn btn-success mb-4">เพิ่มวิชา</a>

        </div>
        <div class="container" aling="center">
          <div class="tt">
            <table class="table table-striped">
              <tr>

                <th style="width: 10%;"> ลำดับ</th>
                <th style="width: 60%;">วิชา</th>
                <th style="width: 9%;"> แก้ไข</th>
                <th style="width: 7%;"> ลบ</th>
                <th style="width: 11%;"> รายละเอียด</th>
              </tr>
              <?php
            
            
                      while ($row = mysqli_fetch_array($result)) {

              ?>
                <tr>
                  <td><?= $row['subject_id'] ?></td>
                  <td><?= $row['s_name'] ?></td>

                  <td><a href="editsubjects.php?id=<?= $row["subject_id"] ?>" class="btn btn-warning">แก้ไข</a></td>
                  <td><a href="delsubjects.php?id=<?= $row["s_name"] ?> " class="btn btn-danger" onclick="Del(this.href);return false;">ลบ</a></td>
                  <td><a href="a_teacher.php?id=<?= $row["department_id"] ?>" class="btn btn-info">รายละเอียด</a></td>
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