<?php
$res  = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../conn.php';

    // Check if a file is uploaded
    if (isset($_FILES['doc_file']) && $_FILES['doc_file']['error'] === UPLOAD_ERR_OK) {
        $doc_name = $_POST['doc_name'];
        $department_id = $_POST['department_id'];
        $course_id =$_POST['course_id'];
        $class_id =$_POST['class_id'];
        $semester_id =$_POST['semester_id'];
        $status = $_POST['status'];

        // Ensure the file is a PDF
        $file_extension = strtolower(pathinfo($_FILES['doc_file']['name'], PATHINFO_EXTENSION));

        if ($file_extension === 'pdf') {
            $upload_dir = '../downloads/'; // Specify your upload directory

            // Generate a unique filename for the uploaded file
            $new_filename = uniqid('doc_') . '.' . $file_extension;
            $upload_path = $upload_dir . $new_filename;

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($_FILES['doc_file']['tmp_name'], $upload_path)) {
                // Insert the file information into the database
                $stmt = $conn->prepare("INSERT INTO tbl_pdf (doc_name, doc_file, class_id,semester_id, department_id, course_id, status) VALUES (?,?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $doc_name, $new_filename,$semester_id, $class_id, $department_id, $course_id, $status);

                if ($stmt->execute()) {
                    $res['code'] = 1;
                    $res['message'] = "อัปโหลดไฟล์สำเร็จ";
                    $res['redirect'] = 't_course.php';
                } else {
                    // Error inserting data into the database
                    $res['message'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
                }

                // Close the database connection
                $stmt->close();
            } else {
                // Error moving the uploaded file
                $res['message'] = "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
            }
        } else {
            // Invalid file type
            $res['message'] = "รูปแบบไฟล์ไม่ถูกต้อง (ต้องเป็น PDF เท่านั้น)";
        }
    } else {
        // No file uploaded or an error occurred
        $res['message'] = "กรุณาเลือกไฟล์เพื่ออัปโหลด";
        $res['code'] = 0;
    }

    $conn->close();
}
echo json_encode($res);
?>