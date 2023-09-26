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
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/userhome.css?">
    <title>หน้าหลัก</title>
</head>

<body>

<div class="sidebar">
        <br>
        <center>
            <td><img src="image/logo1.png" ; width="65" ; height="110"></td>
            <br>
            <h1>
                <img src="image" ; width="100" ; height="120">
            </h1>
            <center>
                <?php
                // Display the name of the logged-in user
                echo "<p>สวัสดี คุณ $loggedInName</p>";
                ?>
                <br>
                <br>
                <div class="form">
            </div>
            <br><br><br>
            <a href="logout.php">ออกจากระบบ</a>

            </center>
        </center>
    </div>
    <div class="main">
        <center><br>

            <br><br><br><br>
            <div class="pic">
                <td1><a href="t_course.php"><button><img src="image/course.png" width="180" height="180"><br>ประมวลรายวิชา</button></a></td1>
                <td2><a href="t_upload.php"><button><img src="image/upload.png" width="180" height="180"><br>อัพโหลดประมวลรายวิชา</button></a></td2>
                <pre></pre>
                <td3><a href="t_approve.php"><button><img src="image/666666.png" width="180" height="180"><br>การอนุมัติ</button></a></td3>
                <td4><a href="t_notify.php"><button><img src="image/notify.png" width="180" height="180"><br>การแจ้งเตือน</button></a></td4>
            </div>
        </center>
    </div>

</body>

</html>