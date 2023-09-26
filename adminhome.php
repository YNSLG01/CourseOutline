<?php include "conn.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

// Include your database connection code (connect.php) here

// Fetch the name of the logged-in user
$loggedInUsername = $_SESSION["username"];
$query = "SELECT name, img FROM user WHERE username = '$loggedInUsername'";
$result = mysqli_query($conn, $query);

// Check if the query was successful and retrieve the name and image URL
$loggedInName = "";
$loggedInImg = "";

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $loggedInName = $row["name"];
    $loggedInImg = $row["img"];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>หน้าหลัก</title>
</head>

<body>

    <div class="sidebar">
        <br>
        <center>
            <td><img src="image/logo1.png" ; width="70" ; height="110"></td>
            <br>
         <br>
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
            <br>
            <br>

            <div class="form">
                <!-- <a href="editprofile.php" align="left"></i><i class="bi bi-person-circle"></i> ข้อมูลส่วนตัว</a> -->
            </div>
            <br><br><br>
            <a href="logout.php">ออกจากระบบ</a>

        </center>
    </div>
    <div class="main">
        <center>
            <h1>Hello Admin</h1>
            <br><br>
            <div class="pic">
                <td1><a href="a_approve.php"><button><img src="image/passport.png" width="180" height="180"><br>ประวัติการอนุมัติ</button></a></td1>
                <td2><a href="a_user.php"><button><img src="image/usericon.png" width="180" height="180"><br>จัดการผู้ใช้งาน</button></a></td2>
                <pre></pre>
                <td3><a href="a_group.php"><button><img src="image/สาระ.png" width="180" height="180"><br>จัดการกลุ่มสาระ</button></a></td3>
                <td4><a href="a_notify.php"><button><img src="image/calender.png" width="180" height="180"><br>กำหนดการส่ง</button></a></td4>
            </div>
        </center>
    </div>

</body>

</html>