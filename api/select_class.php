<?php
$res = array();

// Check if the file '../conn.php' exists
if (file_exists('../conn.php')) {
    require_once '../conn.php';
    $res['code'] = 1;

    // Check if class_id is set and is an integer
    if (isset($_GET['class_id']) && is_numeric($_GET['class_id'])) {
        $class_id = intval($_GET['class_id']);
        // Prepare the SQL statement with WHERE clause
        $stmt = $conn->prepare("SELECT `class_id`, `class` FROM `satit`.`class` WHERE `class_id` = ?");
        $stmt->bind_param("i", $class_id);
    } else {
        // Prepare the SQL statement without WHERE clause
        $stmt = $conn->prepare("SELECT `class_id`, `class` FROM `satit`.`class`");
    }

    // Execute the SQL statement
    $stmt->execute();

    // Bind the results
    $result = $stmt->get_result();

    // Fetch all the results into an array
    $data = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    // Add the data to the $res array
    $res['data'] = $data;

} else {
    $res['code'] = 0;
    $res['message'] = "The file 'conn.php' does not exist.";
}
$conn->close();
echo json_encode($res);
?>
