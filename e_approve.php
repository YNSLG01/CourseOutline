<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การแจ้งเตือน</title>
    <?php require_once('import_header.php'); ?>
</head>
<?php include('navbar/exebar.php'); ?>
<style>
    .container.main {
        margin-left: 250px;
        width: 80%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    #myTable {
        margin-left: 300px;
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
                        $stmt = $conn->prepare("SELECT * FROM tbl_pdf");
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        // Loop through the results and display rows with status 1
                        foreach ($result as $row) {
                            if ($row['status'] == 2) {
                        ?>
                                <tr>
                                    <td><?= $row['tbl_id'] ?></td>
                                    <td><?= $row['s_id'] ?></td>
                                    <td><?= $row['doc_name'] ?></td>
                                    <td><?= $row['date'] ?></td>
                                    <td><?= $row['degree'] ?></td>
                                    <td><a href="e_history.php">ดาวน์โหลด</a></td>
                                    <td><button class="approve-button" data-document-id="<?= $row['tbl_id'] ?>">อนุมัติ</button></td>
                                    <td><button><a href="e_noapprove.php" style="background-color: red;">ไม่อนุมัติ</a></button></td>
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
                                            xhr.open("POST", "e_approve_subject.php", true);
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

</html>