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
<!-- <div class="container"> -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <img src="image/logo satit.png" ; width="190" ; height="110">

        <a class="navbar-brand" style="font-size: 25;"> ระบบประมวลรายวิชา</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminhome.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="a_approve.php">ประวัติการอนุมัติ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="a_user.php">จัดการผู้ใช้งาน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="a_group.php">จัดการกลุ่มสาระ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="a_notify.php">กำหนดการส่ง</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="logout.php">ออกจากระบบ</a></i>
                </li>

            </ul>
            <a>
                <?php
                // Display the name of the logged-in user
                echo "<p>สวัสดี คุณ $loggedInName ---</p>";
                ?>


                <!-- <i class="bi bi-person-circle"></i> -->
            </a>

        </div>
    </div>
    </div>
    <style>
        .container-fluid {
            /* margin-top: 15px; */
            margin-left: auto;
            background-color: #bfe6ff;
            /* padding-top: 20px */
            padding-bottom: 20px;

        }

        .d-flex {
            margin-left: 20px;
        }

        .nav-link {
            font-size: 18px;
        }
    </style>
</nav>