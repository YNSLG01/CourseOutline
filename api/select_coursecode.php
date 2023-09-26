<?php
$res = array();

// Check if the file '../conn.php' exists
if (file_exists('../conn.php')) {
    require_once '../conn.php';
    $res['code'] = 1;

    // Check if course_id is set and is an integer
    if (isset($_GET['course_id']) && is_numeric($_GET['course_id'])) {
        $course_id = intval($_GET['course_id']);
        // Prepare the SQL statement with WHERE clause
        $stmt = $conn->prepare("SELECT `course_id`, `code_id` FROM `satit`.`coursecode` WHERE `course_id` = ?");
        $stmt->bind_param("i", $course_id);
    } else {
        // Prepare the SQL statement without WHERE clause
        $stmt = $conn->prepare("SELECT `course_id`, `code_id` FROM `satit`.`coursecode`");
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