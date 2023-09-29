<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ไม่การอนุมัติ</title>
    <?php require_once('import_header.php'); ?>
</head>
<?php include('navbar/headbar.php'); ?>
<style>
    .main {
        margin-left: 150px;
        width: 100%;
        /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    #myTable {
        border-collapse: collapse;
        /* Collapse borders */
        width: 100%;
        /* Full-width */
        border: 1px solid #ddd;
        /* Add a grey border */
        font-size: 18px;
        /* Increase font-size */
        background-color: #FFFFFF;
    }


    #myTable td {
        text-align: center;
        /* Left-align text */
        padding: 12px;
        /* Add padding */
    }

    #myTable tr {
        /* Add a bottom border to all table rows */
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header {
        background-color: #BFE6FF;
    }

    #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #d9d9d9;
    }
</style>

<body>
    <div class="container">
        <div class="main">
            <center>
                <br><br>

                <table id="myTable">
                    <tr class="header">
                        <th align="left">การอนุมัติ</th>
                        <th></th>
                    </tr>
                    <tr>
                        <h2>แบบฟอร์มข้อเสนอแนะ</h2>
                        <form action="h_noapprove_subject.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="tbl_id" value="<?php echo $_GET['tbl_id']; ?>">
                            <label for="suggestion">ข้อเสนอแนะ:</label>
                            <textarea name="text" rows="4" cols="50"></textarea><br>
                            <label for="file">ไฟล์ (รูปภาพหรือ PDF):</label>
                            <input type="file" name="file" accept="image/*, application/pdf"><br>
                            <input type="submit" name="submit" value="บันทึก">
                        </form>
                    </tr>

                </table>
                <br><br>

                <a href="h_approve.php"><input type="submit" name="cancle" value="cancle"></a>
            </center>
        </div>
    </div>

    <!-- Inside the existing script tag in your main HTML file -->


    <!-- <script>
        function handleNotApprove() {
            // Perform actions when "ไม่อนุมัติ" button is clicked
            // For example, you can update the status to 1 and submit the form
            // You should add appropriate JavaScript logic here
            alert("ไม่อนุมัติ");
            // Uncomment the following lines when you have your JavaScript logic ready
            // document.querySelector("form").submit();
        }
    </script>

<script>
    function handleNotApprove() {
        // Assuming you have a way to get the documentId, text, and file values
        var documentId = ...; // Get the documentId
        var text = document.querySelector("textarea[name='text']").value;
        var fileInput = document.querySelector("input[name='file']");
        var file = fileInput.files[0];

        var formData = new FormData();
        formData.append('documentId', documentId);
        formData.append('text', text);
        formData.append('file', file);

        // AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_status.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert(xhr.responseText); // Display the response, you can customize this part
            } else {
                alert('Error updating status.'); // Handle the error
            }
        };

        xhr.send(formData);
    }
</script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add a click event listener to the approve buttons
            const approveButtons = document.querySelectorAll(".approve-button");
            approveButtons.forEach(button => {
                button.addEventListener("click", function() {
                    // Get the document ID from the data attribute
                    const documentId = this.getAttribute("data-document-id");

                    // Display a SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'ยืนยันการไม่อนุมัติ?',
                        text: "คุณต้องการไม่อนุมัติเอกสารนี้หรือไม่?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ไม่อนุมัติ',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // User confirmed, send an AJAX request to update the status
                            const xhr = new XMLHttpRequest();
                            xhr.open("POST", "h_noapprove_subject.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Handle the response here if needed
                                    // For example, you can show a success message
                                    Swal.fire('ไม่อนุมัติเรียบร้อย', '', 'success');
                                }
                            };
                            xhr.send("tbl_id=" + documentId);
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>