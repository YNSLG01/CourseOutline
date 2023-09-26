<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การแจ้งเตือน</title>
</head>
<?php include('navbar/exebar.php'); ?>
<style>
    .container.main {
        margin-left: 250px;
        width: 10%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    #myTable {
        margin-left: 150px;
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
                <h2>การแจ้งเตือน</h2><br>
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
                        <th width=10%>รหัสวิชา</th>
                        <th width=40%>ชื่อวิชา</th>
                        <th width=20%>วัน/เดือน/ปี</th>
                        <th width=10%>ระดับชั้น</th>
                    </tr>
                    
                </table>

            </center>
        </div>
    </div>
    </div>
</body>

</html>