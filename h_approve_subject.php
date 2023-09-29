
<?php
// Include the database connection
require_once 'connect.php';

if (isset($_POST['tbl_id'])) {
    // Get the document ID from the POST request
    $documentId = $_POST['tbl_id'];

    // Update the status to 2 in the database
    $stmt = $conn->prepare("UPDATE tbl_pdf SET status = 2 WHERE tbl_id = :tbl_id");
    $stmt->bindParam(':tbl_id', $documentId);
    
    if ($stmt->execute()) {
        // Status updated successfully
        echo "Status updated successfully.";
    } else {
        // Error handling, if needed
        echo "Error updating status.";
    }
}
?>
