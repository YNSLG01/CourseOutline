<?php
include 'conn.php';
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$sqlDepartment = "SELECT department_id, d_name FROM department";
$resultDepartment = $conn->query($sqlDepartment);

$sqlSubject = "SELECT subject_id, s_name FROM subjects";
$resultSubject = $conn->query($sqlSubject);
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
    <?php require_once('import_header.php'); ?>
</head>

<body>
    <center> <br><br>
        <div class="h2">แก้ไขข้อมูลผู้ใช้งาน</div><br>
    </center>
    <div class="container" style="width: 40%;">
        <div class="row" align="center"></div>
        <div class="col-sm4">
            <form action="update.php" method="POST">

                <label>id</label>
                <input type="text" name="id" class="form-control" readonly value=<?= $row['id'] ?>><br>
                <label>name</label>
                <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>"><br>
                <label>surname</label>
                <input type="text" name="surname" class="form-control" value=<?= $row['surname'] ?>><br>
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" value=<?= $row['email'] ?>><br>
                <label>image</label>
                <input type="file" name="img" class="form-control" accept="image/*"><br>
                <label>Tel</label>
                <input type="number" name="tel" class="form-control" value=<?= $row['tel'] ?>><br>
                <label>username</label>
                <input type="text" name="username" class="form-control" value=<?= $row['username'] ?>><br>
                <label>password</label>
                <input type="text" name="password" class="form-control" value=<?= $row['password'] ?>><br>
                <!-- <input type="hidden" name="usertypeID" id="usertypeID" class="form-control" value="<?= $row['usertype_id'] ?>"><br>
                <label for="usertype">Usertype</label>
                <select name="usertype" id="usertype">
                    <option value="">เลือก Usertype</option>
                </select><br> -->
                <select name="usertype_id" id="usertype" class="form-select form-select-sm" aria-label="Small select example">
                        <option value="1">Admin</option>
                        <option value="2">Teachers</option>
                        <option value="3">หัวหน้ากลุ่มสาระ</option>
                        <option value="4">Executive</option>
                    </select><br>
                <label>กลุ่มสาระ</label>
                <select name="department_id" id="department" class="form-select form-select-sm" aria-label="Small select example" <?php echo (isset($_POST['usertype_id']) && ($_POST['usertype_id'] == '2' || $_POST['usertype_id'] == '3')) ? '' : 'disabled'; ?>>
                    <?php
                    // Check if there are rows in the result
                    if ($resultDepartment->num_rows > 0) {
                        // Output data of each row
                        while ($row = $resultDepartment->fetch_assoc()) {
                            echo "<option value='" . $row["department_id"] . "'>" . $row["d_name"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No departments found</option>";
                    }
                    ?>
                </select><br>

                <!-- Add an ID to the subjects dropdown for easy identification -->
                <label>วิชา</label>
                <select name="subject_id" id="subject" class="form-select form-select-sm" aria-label="Small select example" <?php echo (isset($_POST['usertype_id']) && ($_POST['usertype_id'] == '2' || $_POST['usertype_id'] == '3')) ? '' : 'disabled'; ?>>
                    <!-- No need to include options here; they will be populated dynamically with JavaScript -->
                    <?php
                    // Check if there are rows in the result
                    if ($resultDepartment->num_rows > 0) {
                        // Output data of each row
                        while ($row = $resultDepartment->fetch_assoc()) {
                            echo "<option value='" . $row["subject_id"] . "'>" . $row["s_name"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No departments found</option>";
                    }
                    ?>
                </select><br>

                <script>
                    document.getElementById('usertype').addEventListener('change', function() {
                        var departmentDropdown = document.getElementById('department');
                        var subjectDropdown = document.getElementById('subject');
                        var usertypeValue = this.value;

                        departmentDropdown.disabled = !(usertypeValue == '2' || usertypeValue == '3');
                        subjectDropdown.disabled = !(usertypeValue == '2' || usertypeValue == '3');

                        if (usertypeValue == '2' || usertypeValue == '3') {
                            updateSubjectsDropdown();
                        }
                    });

                    function updateSubjectsDropdown() {
                        var departmentId = document.getElementById('department').value;
                        var subjectDropdown = document.getElementById('subject');

                        subjectDropdown.innerHTML = ''; // Clear existing options

                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'getSubjects.php?department_id=' + departmentId, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                var subjects = JSON.parse(xhr.responseText);

                                subjects.forEach(function(subject) {
                                    var option = document.createElement('option');
                                    option.value = subject.subject_id;
                                    option.text = subject.s_name;
                                    subjectDropdown.add(option);
                                });
                            }
                        };
                        xhr.send();
                    }
                </script>

                <center>
                    <input type="submit" value="submit" class="btn btn-success">
                    <a href="a_user.php" class="btn btn-danger">Cancel</a>
                </center>
            </form>
        </div>
    </div>
    </div>
</body>

<!-- <script>
    $(document).ready(function() {
        // Get the value of the hidden input with id "usertypeID"
        const usertypeIDValue = $('#usertypeID').val();

        // Output the value to the console (you can do whatever you need with it)
        // console.log('usertypeIDValue:', usertypeIDValue);

        // Fetch data from the API
        $.ajax({
            url: 'api/select_usertype.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.code === 1) {
                    // Populate the select dropdown with data from the API
                    var selectize = $('#usertype').selectize()[0].selectize;
                    $.each(response.data, function(index, item) {
                        selectize.addOption({
                            value: item.usertype_id,
                            text: item.description
                        });
                    });

                    // Set the value of usertypeIDValue into the #usertype dropdown using Selectize
                    selectize.setValue(usertypeIDValue);
                } else {
                    console.error(response.message);
                }
            },
            error: function(error) {
                console.error("Error fetching data:", error);
            }
        });
    });
</script> -->

</html>

<?php
// Close the database connection
$conn->close();
?>
<script>
    document.getElementById('department').addEventListener('change', function() {
        var departmentId = this.value;

        // Make an AJAX request to fetch subjects based on the selected department
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Parse the JSON response
                var subjects = JSON.parse(this.responseText);

                // Clear existing options
                var subjectDropdown = document.getElementById('subject');
                subjectDropdown.innerHTML = '';

                // Add new options based on the fetched subjects
                for (var i = 0; i < subjects.length; i++) {
                    var option = document.createElement('option');
                    option.value = subjects[i].subject_id;
                    option.text = subjects[i].s_name;
                    subjectDropdown.appendChild(option);
                }
            }
        };

        // Send the AJAX request
        xhr.open('GET', 'get_subjects.php?department_id=' + departmentId, true);
        xhr.send();
    });
</script>