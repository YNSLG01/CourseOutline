<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการอนุมัติ</title>
    <?php require_once('import_header.php'); ?>
</head>
<?php include('navbar/headbar.php'); ?>
<style>
    .main {
        margin-left: 150px;
        width: 100%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    #myTable {
        border-collapse: collapse;
        /* Collapse borders */
        width: 100%;
        /* Full-width */
        border: 1px solid #ddd;
        /* Add a grey border */
        font-size: 18px;
        /* Increase font-size */
        background-color: #FFFFFF;
    }


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
        text-align: center;
        background-color: #BFE6FF;
    }

    #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #d9d9d9;
    }

    .green-text {
        color: green;
    }

    .red-text {
        color: red;
    }
</style>

<body>
    <div class="container">
        <div class="main">
            <center>
                <br><br>
                <h2>ประวัติการอนุมัติ</h2><br>
                <table id="myTable">

                    <!-- <tr>
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
                    </tr> -->

                </table>

                <table id="myTable">
                    <tr class="header">
                        <th width="10%">รหัสวิชา</th>
                        <th width="20%">ชื่อวิชา</th>
                        <th width="10%">วัน/เดือน/ปี</th>
                        <th width="10%">ระดับชั้น</th>
                        <th width="10%">รายละเอียด</th>
                        <th width="10%">สถานะ</th>
                        <th width="10%">ผู้บริหาร</th>

                    </tr>
                    <?php
                    // Include the database connection
                    require_once 'connect.php';

                    // Prepare and execute the SQL query
                    $stmt = $conn->prepare("SELECT tbl_pdf.* , science.s_name, department.department_id FROM `tbl_pdf`
                    LEFT JOIN science ON tbl_pdf.course_id = science.course_id
                    LEFT JOIN department ON tbl_pdf.department_id = department.department_id");
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                    // Loop through the results and display rows with status 1
                    foreach ($result as $row) {
                        if ($row['status'] == 2 || $row['status'] == 4 || $row['status'] == 3 || $row['status'] == 5) {
                    ?>
                            <tr>
                                <td><?= $row['course_id'] ?></td>
                                <td><?= $row['doc_name'] ?></td>
                                <td><?= $row['date'] ?></td>
                                <td><?= $row['class_id'] ?></td>
                                <td><a href="downloads/<?php echo $row['doc_file']; ?>" target="_blank">ดาวน์โหลด</a></td>
                                <td><?php
                                    if ($row['status'] == 2) {
                                        echo '<span class="green-text">อนุมัติแล้ว</span>';
                                    } elseif ($row['status'] == 4) {
                                        echo '<span class="red-text">ไม่อนุมัติ</span>';
                                    } else {
                                        echo "<?= $row[class_id] ?>";
                                    }
                                    ?></td>
                                <td><?php
                                    if ($row['status'] == 3) {
                                        echo '<span class="green-text">ผ่านการอนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ status เป็น 3 ผู้บริหารอนุมัติ
                                    } elseif ($row['status'] == 5) {
                                        echo '<span class="red-text">ไม่อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ ผู้บริหารไม่อนุมัติ
                                    } else {
                                        echo "<?= $row[class_id] ?>";
                                    }
                                    ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </center>
        </div>
    </div>
</body>

</html>