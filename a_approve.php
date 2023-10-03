<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/a_approve.css">
  <title>ประวัติการอนุมัติ</title>
</head>

<?php include('navbar/nav.php'); ?>
<style>
  .orange-text {
    color: orange;
  }

  .green-text {
    color: green;
  }

  .red-text {
    color: red;
  }
</style>

<body>
  <center>
    <div class="container">
      <div class="h2">
        <center>
          <br><br>
          <h2>ประวัติการอนุมัติ</h2>
        </center>
      </div>
      <div align="right">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
      </div><br>
      <div class="subject">
        <div class="container" aling="center">
          <div class="tt">
            <table class="table table-striped">

              <tr>
                <!-- <th style="width: 8%;">ลำดับ</th> -->
                <th style="width: 10%;">รหัสวิชา</th>
                <th>ชื่อวิชา </th>
                <th>ชื่อไฟล์</th>
                <th>วัน/เดือน/ปี</th>
                <th>ระดับชั้น</th>
                <th>download</th>
                <th>สถานะ</th>
              </tr>
              <?php
              $sql = "SELECT tbl_pdf.* , subjects.s_name, coursecode.code_id FROM `tbl_pdf`
        LEFT JOIN subjects ON tbl_pdf.subject_id = subjects.subject_id
        LEFT JOIN coursecode ON tbl_pdf.course_id = coursecode.course_id";

              // $sql = "SELECT * FROM tbl_pdf";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {

              ?>
                <tr>
                  <!-- <td><?= $row['tbl_id'] ?></td> -->
                  <td><?= $row['code_id'] ?></td>
                  <td><?= $row['doc_name'] ?></td>
                  <td><?= $row['doc_file'] ?></td>
                  <td><?= $row['date'] ?></td>
                  <td><?= $row['class_id'] ?></td>
                  <td><a href="downloads/<?php echo $row['doc_file']; ?>" target="_blank"><i class="fa fa-download fa-lg"></i></td>
                  <td><?php
                      if ($row['status'] == 1) {
                        echo '<span class="orange-text">รออนุมัติ</span>';
                      } elseif ($row['status'] == 2) {
                        echo '2'; // เพิ่มเงื่อนไขเมื่อ status เป็น 2
                      } elseif ($row['status'] == 3) {
                        echo '<span class="green-text">ผ่านการอนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ status เป็น 3
                      } elseif ($row['status'] == 4) {
                        echo '<span class="red-text">ไม่อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ หัวหน้ากลุ่มไม่อนุมัติ
                      } elseif ($row['status'] == 5) {
                        echo '<span class="red-text">ไม่อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ ผู้บริหารไม่อนุมัติ
                      } elseif ($row['status'] == 6) {
                        echo 'สถานะไม่ระบุ';
                      }
                      ?>
                  </td>
                </tr>
          </div>
        <?php
              }
              mysqli_close($conn);
        ?>
        </table>
        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
        </div>
      </div>
    </div>
  </center>
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
<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tt");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>