<?php include "conn.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

// Include your database connection code (connect.php) here

// Fetch the name of the logged-in user
$loggedInUsername = $_SESSION["username"];
$nameQuery = "SELECT name FROM user WHERE username = '$loggedInUsername'";
$nameResult = mysqli_query($conn, $nameQuery);

// Check if the query was successful and retrieve the name
$loggedInName = "";
if ($nameResult && mysqli_num_rows($nameResult) > 0) {
    $row = mysqli_fetch_assoc($nameResult);
    $loggedInName = $row["name"];
}

$loggedInImg = $_SESSION["username"];
$nameQuery = "SELECT img FROM user WHERE username = '$loggedInImg'";
$nameResult = mysqli_query($conn, $nameQuery);

// Check if the query was successful and retrieve the name
$loggedInImg = "";
if ($nameResult && mysqli_num_rows($nameResult) > 0) {
    $row = mysqli_fetch_assoc($nameResult);
    $loggedInImg = $row["img"];
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="navbar/nav.css">
<div class="container">
    <div class="sidebar">

        <center>
            <td><img src="image/Logo.png" ; width="200" ; height="110"></td>
            <br><br>
            <?php
                // Display the user's image
                echo "<img src='$loggedInImg'  width='100' height='100'>";
                ?>
            </center>
            <center> <br>
                <?php
                // Display the name of the logged-in user
                echo "<p>สวัสดี คุณ $loggedInName</p>";
                ?>
        </center>
        <a href="adminhome.php"></i><i class="bi bi-house-door"></i> หน้าหลัก</a>
        <a href="a_profile.php"></i><i class="bi bi-person-circle"></i> ข้อมูลส่วนตัว</a>
        <a href="a_approve.php"></i><i class="bi bi-check2-square"></i> ประวัติการอนุมัติ</a>
        <a href="a_user.php"></i><i class="bi bi-people"></i> จัดการผู้ใช้งาน</a>
        <a href="a_group.php"></i><i class="bi bi-journals"></i> จัดการกลุ่มสาระ</a>
        <!-- <a href="a_notify.php"></i><i class="bi bi-calendar-event"></i> กำหนดการส่ง</a> -->
        <div class="menu">
            <a align="center" href="logout.php"><i class="bi bi-box-arrow-left"></i> ออกจากระบบ</a>
        </div>
    </div>
</div>
<div class="main">

    <body>

    </body>
</div>