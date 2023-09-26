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
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="navbar/exebar.css">
<div class="container">
    <div class="sidebar">

        <center>
            <td><img src="image/logo1.png" ; width="70" ; height="110"></td>
            <br><br>
            <td> <img src="image" ; width="100" ; height="120"></td>


        </center>

        <center>
            <br>
            <?php
            // Display the name of the logged-in user
            echo "<p>สวัสดี คุณ $loggedInName</p>";
            ?>
        </center>
        <a href="executivehome.php"></i><i class="bi bi-house-door"></i> หน้าหลัก</a>
        <a href=".php"></i><i class="bi bi-person-circle"></i> ข้อมูลส่วนตัว</a>
        <a href="e_approve.php"></i><i class="bi bi-check2-square"></i> การอนุมัติ</a>
        <a href="e_history.php"></i><i class="bi bi-journals"></i> ประวัติการอนุมัติ</a>
        <a href="e_notify.php"></i><i class="bi bi-bell"></i> การแจ้งเตือน</a>
        <div class="menu">
            <a align="center" href="logout.php"><i class="bi bi-box-arrow-left"></i> logout</a>
        </div>
    </div>
</div>
<div class="main">

    <body>

    </body>
</div>