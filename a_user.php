<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->

<link rel="stylesheet" href="css/a_user.css?">
<title>ข้อมูลผู้ใช้งาน</title>
</head>
<br>
<?php include 'navbar/nav.php'; ?>

<body>
  <center>
    <div class="container">
    <div class="h2">
      <center>
        <br>
        <h2>ประวัติผู้ใช้งาน</h2>
        <br>
      </center>
    </div>
    <div class="button">
    
      <a href="form.php" class="btn btn-success mb-4">เพิ่มผู้ใช้งาน</a>
    </div>
    <div class="container" aling="center">
      <div class="tt">
      <table class="table table-striped">
        <tr>
          <th style="width: 5%;">id</th>
          <th style="width: 10%;">name</th>
          <th>surname</th>
          <th>email</th>
          <th>tel</th>
          <th>image</th>
          <th>username</th>
          <th>password</th>
          <th style="width: 15%;">usertype</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
        <?php
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

        ?>
       <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['surname'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['tel'] ?></td>
    <td><img src="../img/<?= $row['img'] ?>"  width="85" height="85"></td> <!-- Corrected src attribute -->
    <td><?= $row['username'] ?></td>
    <td><?= $row['password'] ?></td>
    <td><?= $row['usertype_id'] ?></td>
    <td><a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-warning">แก้ไข</a></td>
    <td><a href="delete.php?id=<?= $row["id"] ?> " class="btn btn-danger" onclick="Del(this.href);return false;">ลบ</a></td>
</tr>

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