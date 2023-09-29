<?php
include 'conn.php';

if (isset($_GET['department_id'])) {
    $departmentId = $_GET['department_id'];
    
    $sql = "SELECT subject_id, s_name FROM subjects WHERE department_id = $departmentId";
    $result = $conn->query($sql);

    $subjects = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subjects[] = array(
                'subject_id' => $row['subject_id'],
                's_name' => $row['s_name']
            );
        }
    }

    echo json_encode($subjects);
}

$conn->close();
?>
