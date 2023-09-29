<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection, if not, add your connection logic here.
    require_once 'connect.php';

    // Get document ID from POST data
    $documentId = isset($_POST['tbl_id']) ? $_POST['tbl_id'] : null;

    // Get details from POST data
    $details = isset($_POST['text']) ? $_POST['text'] : '';

    // Handle file upload
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];

    // Specify your upload directory
    $uploadDir = 'downloads/';
    $filePath = $uploadDir . $fileName;

    // Move the uploaded file to the specified directory
    move_uploaded_file($fileTmpName, $filePath);

    // Update tbl_pdf with details and file information
    $stmt = $conn->prepare("UPDATE tbl_pdf SET text = ?, file = ?, status = 4 WHERE tbl_id = ?");
    $stmt->execute([$details, $filePath, $documentId]);

    // Close the database connection
    $conn = null;

    // Send a response back to the client
    echo json_encode(['success' => true]);
} else {
    // Handle other HTTP methods or direct access to the file
    http_response_code(405); // Method Not Allowed
    echo 'Method Not Allowed';
}
?>
