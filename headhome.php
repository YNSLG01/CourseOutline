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
    <link rel="stylesheet" href="css/userhome.css">
    <title>หน้าหลัก</title>
</head>

<body>

    <div class="sidebar">
        <br>
        <center>
            <td><img src="image/logo1.png" ; width="65" ; height="110"></td>
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
            </div>
            <br><br><br>
            <a href="logout.php">ออกจากระบบ</a>

        </center>
    </div>
    <div class="main">
        <center>
            <br><br>
            <br><br>
            <div class="pic">
                <td1><a href="h_approve.php"><button><img src="image/666666.png" width="180" height="180"><br>การอนุมัติ</button></a></td1>
                <td2><a href="h_history.php"><button><img src="image/passport.png" width="180" height="180"><br>ประวัติการอนุมัติ</button></a></td2>
                <pre></pre>
                <td3><a href="h_notify.php"><button><img src="image/notify.png" width="180" height="180"><br>การแจ้งเตือน</button></a></td3>
            </div>
        </center>
    </div>

</body>

</html>