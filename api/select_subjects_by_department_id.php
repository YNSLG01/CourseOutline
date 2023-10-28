<?php
$res = array();

// Check if the file '../conn.php' exists
if (file_exists('../conn.php')) {
    require_once '../conn.php';
    $res['code'] = 1;

    // Check if subject_id is set and is an integer
    if (isset($_GET['department_id']) && is_numeric($_GET['department_id'])) {
        $department_id = intval($_GET['department_id']);
        // Prepare the SQL statement with WHERE clause
        $stmt = $conn->prepare("SELECT `subject_id`, `s_name` FROM `satit`.`science` WHERE `department_id` = ?");
        $stmt->bind_param("i", $department_id);
    } else {
        // Prepare the SQL statement without WHERE clause
        $stmt = $conn->prepare("SELECT `subject_id`, `s_name` FROM `satit`.`science`");
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
