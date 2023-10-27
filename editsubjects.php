<?php
// Include the database connection file
include 'conn.php';

// Check if the subjects ID is provided in the URL
if (isset($_GET['subject_id'])) {
    $subject_id = $_GET['subject_id'];

    // Query to fetch subjects details by ID
    $sql = "SELECT * FROM science WHERE subject_id = $subject_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if the subjects exists
        if (!$row) {
            echo "subjects not found.";
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    echo "subjects ID not provided.";
    exit();
}

// Check if the form is submitted for updating the subjects
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subjects = $_POST['new_subjects_name'];

    // Update the subjects in the database
    $updateSql = "UPDATE science SET d_name = '$subjects' WHERE subject_id = $subject_id";

    if (mysqli_query($conn, $updateSql)) {
        header("Location: a_subjects.php"); // Redirect to the subjects management page
        exit();
    } else {
        echo "Error updating science: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Edit subjects</title>
</head>
<style>
    .form-group {

        width: 50%;
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
                    <input type="text" name="subject_id" class="form-control" readonly value = "<?= $row['subject_id'] ?>" required>
                    <label for="new_subjects_name">กลุ่มสาระ</labelfor=>
                    <input type="text" name="new_subjects_name" class="form-control" value="<?= $row['s_name'] ?>" required>
                </div>
                <br><br>
                <input type="submit" value="submit" class="btn btn-success">
                <a href="a_group.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </center>
</body>

</html>