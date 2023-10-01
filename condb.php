<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "satit";

session_start();

$data = mysqli_connect($servername, $username, $password, $dbname);
if ($data === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from user where username= '" . $username . "' AND password='" . $password . "'";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);


    if ($row["usertype_id"] == "1") {
        $_SESSION["username"] = $username;
        header("location: adminhome.php");
    }
    if ($row["usertype_id"] == "2") {
        $_SESSION["username"] = $username;
        header("location:userhome.php");
    }
    if ($row["usertype_id"] == "3") {
        $_SESSION["username"] = $username;
        header("location: headhome.php");
    }
    if ($row["usertype_id"] == "4") {
        $_SESSION['username'] = $username;
        header("location: executivehome.php");

      
    } else {
        echo "<script>";
        echo "alert(\" Username หรือ  Password ของคุณไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
}  