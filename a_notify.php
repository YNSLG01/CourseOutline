<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="css/a_notify.css"> -->
  <title>กำหนดการส่ง</title>
</head>
<?php include('navbar/nav.php'); ?>
<style>
  .h1{
    margin-left: 200px;
    font-size: 20px;
}
.container .mb-3{
    width: 50%;
    margin-left: 400px;
}

</style>
<body>
  <div class="container">
    <div class="h1"><br>
      <center>
        <h2>กำหนดการส่ง</h2>
    </div>
    </center>
    <br><br>
    <hr>

    <form action="send.php" method="POST">
      <div class="mb-3">
        <label for="text" class="form-label">กรอกข้อความ</label>
        <input type="text" class="form-control" name="tetx" aria-describedby="text">

        <br><br>
        <center><button type="submit" name="submit" class="btn btn-primary">Submit</button>
          <a href="a_approve.php" class="btn btn-danger">Cancel</a>
        </center>
      </div>
    </form>
    </hr>
  </div>
</body>

</html>