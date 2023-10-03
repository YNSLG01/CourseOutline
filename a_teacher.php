<?php
include 'conn.php';

// Check if the department_id is provided in the URL parameters
if (isset($_GET['id'])) {
    $department_id = $_GET['id'];

    // Fetch information from the teacher and subject tables based on the department_id
    $sql = "SELECT teacher.*, subjects.s_name,teacher.name FROM teacher
            JOIN subjects ON teacher.subject_id = subjects.subject_id
            WHERE teacher.department_id = $department_id";

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
    <title>รายละเอียด</title>

    <?php include('navbar/nav.php'); ?>
</head>
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
<body>
    <center>
        <div class="container">
            <div class="h2">
                <center>
                    <br>
                    <h2>รายละเอียด</h2>
                    <br>
                </center>
            </div>
            <div class="button">
              
            </div>
            <div class="container" align="center">
                <div class="tt">
                    <table class="table table-striped">
                        <tr>
                            <th style="width: 10%;"> ลำดับ</th>
                            <th style="width: 20%;"> ชื่อ</th>
                            <th style="width: 20%;"> นามสกุล</th>
                            <th style="width: 20%;"> วิชา</th>
                            <!-- Add more columns as needed -->
                        </tr>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?= $row['t_id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['lastname'] ?></td>
                                <td><?= $row['s_name'] ?></td>
                                <!-- Add more columns as needed -->
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </center>
</body>

</html>

<?php
mysqli_close($conn);
?>
