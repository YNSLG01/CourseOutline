<?php
// Include the database connection file
include('../conn.php');

// Check if the department ID is provided in the URL
if (isset($_GET['id'])) {
    $department_id = $_GET['id'];

    // Query to fetch department details by ID
    $sql = "SELECT * FROM department WHERE department_id = $department_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if the department exists
        if (!$row) {
            echo "Department not found.";
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    echo "Department ID not provided.";
    exit();
}

// Check if the form is submitted for updating the department
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newDepartmentName = $_POST['new_department_name'];

    // Update the department in the database
    $updateSql = "UPDATE department SET d_name = '$newDepartmentName' WHERE department_id = $department_id";

    if (mysqli_query($conn, $updateSql)) {
        header("Location: ../a_group.php"); // Redirect to the department management page
        exit();
    } else {
        echo "Error updating department: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Edit Department</title>
</head>
<style>
    .form-group {

        width: 100%;
    }
    .container{
        width: 100%;
    }
</style>
<body>
    <center>
        <div class="container" >
            <br><br>
            <h2>แก้ไขกลุ่มสาระ</h2><br><br>
            <form method="POST">
                <div class="form-group">
                <label>ลำดับ</labelfor=>
                    <input type="text" name="department_id" class="form-control" readonly value = "<?= $row['department_id'] ?>" required>
                    <label for="new_department_name">กลุ่มสาระ</labelfor=>
                    <input style="width: 100%;" type="text" name="new_department_name" class="form-control" value="<?= $row['d_name'] ?>" required>
                </div>
                <br><br>
                <input type="submit" value="submit" class="btn btn-success">
                <a href="a_group.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </center>
</body>

</html>