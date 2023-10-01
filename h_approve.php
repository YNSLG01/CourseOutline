<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การแจ้งเตือน</title>
    <?php require_once('import_header.php'); ?>
</head>
<?php include('navbar/headbar.php'); ?>
<style>
    .container.main {
        margin-left: 250px;
        width: 100%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    #myTable {
        margin-left: 250px;
        border-collapse: collapse;
        /* Collapse borders */
        width: 80%;
        /* Full-width */
        border: 1px solid #ddd;
        /* Add a grey border */
        font-size: 18px;
        /* Increase font-size */
        background-color: #FFFFFF;
    }

    #myTable th,
    #myTable td {
        text-align: center;
        /* Left-align text */
        padding: 12px;
        /* Add padding */
    }

    #myTable tr {
        /* Add a bottom border to all table rows */
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header {
        background-color: #BFE6FF;
    }

    #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #d9d9d9;
    }
</style>

<body>
    <div class="container">

        <div class="main">
            <center>
                <br><br>
                <h2>การอนุมัติ</h2><br>
                <table id="myTable">

                    <tr>
                        <td width=40%>
                            <label>รายละเอียดรายวิชา ภาคเรียนที่</label>
                            <select name="term" id="term" onchange="Tsubmit();">
                                <option value="1/2566" selected>1/2566</option>
                                <option value="2/2566">2/2566</option>
                                <option value="1/2565">1/2565</option>
                                <option value="2/2565">2/2565</option>
                            </select>
                        </td>
                        <td width=20%>
                            <label>ระดับ</label>
                            <select name="degree" id="degree" onChange="changeList(this.value);Tsubmit();">
                                <option value="ม.1" selected='selected'>ม.1</option>
                                <option value="ม.2">ม.2</option>
                                <option value="ม.3">ม.3</option>
                                <option value="ม.4">ม.4</option>
                                <option value="ม.5">ม.5</option>
                                <option value="ม.6">ม.6</option>
                            </select>
                        </td>
                        <td width=40%>
                            <label>กลุ่มสาระการเรียนรู้</label>
                            <select name="กลุ่มสาระการเรียนรู้" id="กลุ่มสาระการเรียนรู้">
                                <?php
                                require_once 'connect.php';
                                $stmt = $conn->prepare("SELECT* FROM department");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                ?>
                                    <option value="<?php echo $row['department_id'] ?>"> <?php echo $row['d_name'] ?></option>

                                <?php } ?>
                            </select>
                        </td>
                    </tr>


                    <br>
                    <table id="myTable">
                        <tr class="header">
                            <th width="10%">ลำดับ</th>
                            <th width="10%">รหัสวิชา</th>
                            <th width="20%">ชื่อวิชา</th>
                            <th width="20%">วัน/เดือน/ปี</th>
                            <th width="10%">ระดับชั้น</th>
                            <th width="10%">รายละเอียด</th>
                            <th width="10%">อนุมัติ</th>
                            <th width="10%">ไม่อนุมัติ</th>
                        </tr>
                        <?php
                        // Include the database connection
                        require_once 'connect.php';

                        // Prepare and execute the SQL query
                        $stmt = $conn->prepare("SELECT tbl_pdf.* , subjects.s_name, coursecode.code_id FROM `tbl_pdf`
                        LEFT JOIN subjects ON tbl_pdf.subject_id = subjects.subject_id
                        LEFT JOIN coursecode ON tbl_pdf.course_id = coursecode.course_id");
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        // Loop through the results and display rows with status 1
                        foreach ($result as $row) {
                            if ($row['status'] == 1) {
                        ?>
                                <tr>
                                    <td><?= $row['tbl_id'] ?></td>
                                    <td><?= $row['code_id'] ?></td>
                                    <td><?= $row['doc_name'] ?></td>
                                    <td><?= $row['date'] ?></td>
                                    <td><?= $row['class_id'] ?></td>
                                    <td><a href="downloads/<?php echo $row['doc_file']; ?>" target="_blank">ดาวน์โหลด</a></td>
                                    <td><button class="approve-button" data-document-id="<?= $row['tbl_id'] ?>">อนุมัติ</button></td>
                                    <td><button class="disapprove-button" data-document-id="<?= $row['tbl_id'] ?>">ไม่อนุมัติ</button>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Add a click event listener to the approve buttons
                            const approveButtons = document.querySelectorAll(".approve-button");
                            approveButtons.forEach(button => {
                                button.addEventListener("click", function() {
                                    // Get the document ID from the data attribute
                                    const documentId = this.getAttribute("data-document-id");

                                    // Display a SweetAlert confirmation dialog
                                    Swal.fire({
                                        title: 'ยืนยันการอนุมัติ?',
                                        text: "คุณต้องการอนุมัติเอกสารนี้หรือไม่?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'อนุมัติ',
                                        cancelButtonText: 'ยกเลิก'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // User confirmed, send an AJAX request to update the status
                                            const xhr = new XMLHttpRequest();
                                            xhr.open("POST", "h_approve_subject.php", true);
                                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                            xhr.onreadystatechange = function() {
                                                if (xhr.readyState === 4 && xhr.status === 200) {
                                                    // Handle the response here if needed
                                                    // For example, you can show a success message
                                                    Swal.fire('อนุมัติเรียบร้อย', '', 'success');
                                                }
                                            };
                                            xhr.send("tbl_id=" + documentId);
                                        }
                                    });
                                });
                            });
                        });
                    </script>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Add a click event listener to the disapprove buttons
                            const disapproveButtons = document.querySelectorAll(".disapprove-button");
                            disapproveButtons.forEach(button => {
                                button.addEventListener("click", function() {
                                    // Get the document ID from the data attribute
                                    const documentId = this.getAttribute("data-document-id");

                                    // Display a SweetAlert confirmation dialog
                                    Swal.fire({
                                        title: 'ยืนยันการไม่อนุมัติ?',
                                        text: "คุณต้องการไม่อนุมัติเอกสารนี้หรือไม่?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'ไม่อนุมัติ',
                                        cancelButtonText: 'ยกเลิก'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // User confirmed, send an AJAX request to update the status
                                            const xhr = new XMLHttpRequest();
                                            xhr.open("POST", "h_noapprove_subject.php", true);
                                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                            xhr.onreadystatechange = function() {
                                                if (xhr.readyState === 4 && xhr.status === 200) {
                                                    // Handle the response here if needed
                                                    // For example, you can show a success message
                                                    Swal.fire('ไม่อนุมัติเรียบร้อย', '', 'success');
                                                    // Optionally, you can remove or hide the row from the table
                                                    // e.g., const row = button.closest("tr"); row.remove();
                                                }
                                            };
                                            xhr.send("tbl_id=" + documentId);
                                        }
                                    });
                                });
                            });
                        });
                    </script>

                    <!-- Add this code in the head section, after including SweetAlert -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-b0ExaZq2ST93l9l3rSK1jNqCr7eC7y1Ff6C8tH09tqkR2vHbQTdmlZ2ud5Ol6qHJ" crossorigin="anonymous">

                    <!-- ... Your existing head section ... -->

                    <!-- Add this script after your existing scripts -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const disapproveButtons = document.querySelectorAll(".disapprove-button");
                            disapproveButtons.forEach(button => {
                                button.addEventListener("click", function() {
                                    const documentId = this.getAttribute("data-document-id");

                                    // Display a modal for entering details and attaching a file
                                    Swal.fire({
                                        title: 'ไม่อนุมัติ',
                                        html: `
                    <input id="text" class="swal2-input" placeholder="รายละเอียด">
                    <input type="file" id="file" class="swal2-file" accept=".pdf, .jpg, .jpeg, .png">
                `,
                                        showCancelButton: true,
                                        confirmButtonText: 'ส่งข้อมูล',
                                        cancelButtonText: 'ยกเลิก',
                                        preConfirm: () => {
                                            const text = document.getElementById('text').value;
                                            const fileInput = document.getElementById('file');
                                            const file = fileInput.files[0];

                                            // FormData object to send details and file to the server
                                            const formData = new FormData();
                                            formData.append('tbl_id', documentId);
                                            formData.append('text', text);
                                            formData.append('file', file);

                                            // AJAX request to update data on the server
                                            fetch('h_noapprove_subject.php', {
                                                    method: 'POST',
                                                    body: formData,
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        // You can also show a success message here if needed
                                                        Swal.fire('ข้อมูลถูกส่งเรียบร้อย', '', 'success');
                                                    } else {
                                                        // Handle errors if necessary
                                                        Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถส่งข้อมูลได้', 'error');
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                    // Handle errors if necessary
                                                    Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถส่งข้อมูลได้', 'error');
                                                });
                                        }
                                    });
                                });
                            });
                        });
                    </script>


                    <!-- <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Add a click event listener to the approve buttons
                            const approveButtons = document.querySelectorAll(".approve-button");
                            approveButtons.forEach(button => {
                                button.addEventListener("click", function() {
                                    // Get the document ID from the data attribute
                                    const documentId = this.getAttribute("data-document-id");

                                    // Send an AJAX request to update the status
                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "approve_subject.php", true);
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            // Handle the response here if needed
                                            // For example, you can show a success message
                                            alert("Status updated successfully.");
                                        }
                                    };
                                    xhr.send("s_id=" + documentId);
                                });
                            });
                        });
                    </script> -->

            </center>
        </div>
    </div>
    </div>
</body>

</html>tbl_pdf