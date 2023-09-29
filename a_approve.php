<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="css/a_approve.css">
  <title>ประวัติการอนุมัติ</title>
</head>


<?php include('navbar/nav.php'); ?>

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
              <th>Review</th>
              <th>Delete</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tbl_pdf";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

        ?>
       <tr>
    <!-- <td><?= $row['tbl_id'] ?></td> -->
    <td><?= $row['subject_id'] ?></td>
    <td><?= $row['doc_name'] ?></td>
    <td><?= $row['doc_file'] ?></td>
    <td><?= $row['date'] ?></td> 
    <td><?= $row['class_id'] ?></td>
    <td><a href="view.php" class="btn btn-warning">Review</a></td>
    <td><a href="a_history.php?id=<?= $row["tbl_id"] ?> " class="btn btn-danger" onclick="Del(this.href);return false;">ลบ</a></td>
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
  </center>
  </div>
</body>

</html>
