<?php
include 'conn.php';

// Check if 'department_id' is set in the $_GET array
if (isset($_GET['department_id'])) {
    $id = $_GET['department_id'];
    
    $sql = "SELECT * FROM department WHERE department_id='$id'";
    $result = mysqli_query($conn, $sql);
    
    // Check if the query was successful and at least one row was found
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        
        // Now you can access the department data
        $departmentId = $row['department_id'];
        $departmentName = $row['d_name'];
        $departmentDescription = $row['department_description'];
        
        // Use the department data as needed
    } else {
        // Handle the case where no matching department was found
        echo "Department not found.";
    }
} else {
    // Handle the case where 'department_id' is not set in the $_GET array
    echo "Missing 'department_id' parameter.";
}
?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit.css?">
    <title>ฟอร์มแก้ไขข้อมูลผู้ใช้งาน</title>
</head>

<body>
    <center> <br><br>
        <div class="h2">แก้ไขข้อมูลผู้ใช้งาน</div><br>
    </center>
    <div class="container" style="width: 40%;">
        <div class="row" align="center"></div>
            <div class="col-sm4">
                <form action="update.php" method="POST">
                                     
                      <label>ลำดับ</label>
                    <input type="number" name="department" class="form-control" placeholder="ลำดับ" required><br>
                    <label>กลุ่มสาระ</label>
                    <input type="text" name="d_name" class="form-control" placeholder="กลุ่มสาระ" required><br>
                    <br>
                        <center>
                            <input type="submit" value="update" class="btn btn-success">
                            <a href="a_group.php" class="btn btn-danger">Cancel</a>
                        </center>
                    </div>
                </form>

</html>