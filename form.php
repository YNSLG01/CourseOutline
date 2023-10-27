<?php
// Assuming you have a database connection
include 'conn.php';

// Fetch data from the 'department' table
$sqlDepartment = "SELECT department_id, d_name FROM department";
$resultDepartment = $conn->query($sqlDepartment);

$sqlSubject = "SELECT subject_id, s_name FROM science";
$resultSubject = $conn->query($sqlSubject);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <?php require_once('import_header.php'); ?>
    <title>ฟอร์มเพิ่มข้อมูลผู้ใช้งาน</title>
</head>
<?php include('navbar/nav.php'); ?>

<body>
    <center>
        <br><br>
        <div class="h2">เพิ่มข้อมูลผู้ใช้งาน</div><br>
    </center>
    <div class="container">

        <div class="row">
            <div class="col-sm4">

                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="ชื่อ" required><br>
                    <label>Surname</label>
                    <input type="text" name="surname" class="form-control" placeholder="นามสกุล" required><br>
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="อีเมล" required><br>
                    <label>Tel</label>
                    <input type="number" name="tel" class="form-control" placeholder="เบอร์โทรศัพท์" required><br>
                    <label>Image</label>
                    <input type="file" name="img" class="form-control" placeholder="รูปภาพ" accept="image/*" required><br>

                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้" required><br>
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" placeholder="รหัสผ่าน" required><br>

                    <label>Usertype</label>
                    <select name="usertype_id" id="usertype" class="form-select form-select-sm" aria-label="Small select example">
                        <option value="1">Admin</option>
                        <option value="2">Teachers</option>
                        <option value="3">หัวหน้ากลุ่มสาระ</option>
                        <option value="4">Executive</option>
                    </select><br>

                    <label>กลุ่มสาระ</label>
                    <select name="department_id" id="department" class="form-select form-select-sm" aria-label="Small select example" 
                    <?php echo (isset($_POST['usertype_id']) && ($_POST['usertype_id'] == '2' || $_POST['usertype_id'] == '3')) ? '' : 'disabled'; ?>>
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
                    <select name="subject_id" id="subject" class="form-select form-select-sm" aria-label="Small select example" 
                    <?php echo (isset($_POST['usertype_id']) && ($_POST['usertype_id'] == '2' || $_POST['usertype_id'] == '3')) ? '' : 'disabled'; ?>>
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
                            departmentDropdown.disabled = !(this.value == '2' || this.value == '3');
                            subjectDropdown.disabled = !(this.value == '2' || this.value == '3');

                            // If the selected user type is 2 or 3, fetch and populate subjects based on the selected department
                            if (this.value == '2' || this.value == '3') {
                                updateSubjectsDropdown();
                            }
                        });

                        function updateSubjectsDropdown() {
                            var departmentId = document.getElementById('department').value;
                            var subjectDropdown = document.getElementById('subject');

                            // Clear existing options
                            subjectDropdown.innerHTML = '';

                            // Make an AJAX request to fetch subjects based on the selected department
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'getSubjects.php?department_id=' + departmentId, true);
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    // Parse the JSON response
                                    var subjects = JSON.parse(xhr.responseText);

                                    // Populate subjects dropdown with fetched data
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