<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <?php require_once('import_header.php'); ?>
    <title>ฟอร์มเพิ่มรายวิชา</title>

</head>
<?php include('navbar/nav.php'); ?>
<style>
    .row .col-sm4 {
        width: 50%;
        margin-left: 330px;
    }

    /* .h2{
  margin-right: -200px;
} */

    .btn {
        margin-left: 20px;
    }
</style>

<body>
    <center>
        <br><br>
        <div class="h2">เพิ่มวิชา</div><br>
    </center>
    <div class="container">

        <div class="row">
            <div class="col-sm4">

                <form action="insert_s.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                        <label>ระดับชั้น</label>
                        <select name="class_id" id="class">
                            <option value="" selected></option>
                            <option value="">เลือกระดับชั้น</option>
                        </select>
                    </div><br>

                    <label>รหัสวิชา</label>
                    <input type="text" name="course_id" class="form-control" placeholder="รหัสวิชา" required><br>
                    <label>ชื่อวิชา</label>
                    <input type="text" name="s_name" class="form-control" placeholder="ชื่อวิชา" required><br>
                    <div class="form-group col-md-4">
                        <label for="department">กลุ่มสาระการเรียนรู้</label>
                        <select name="department_id" id="department">
                            <option value="">เลือกกลุ่มสาระการเรียนรู้</option>
                        </select>
                    </div><br>
                    <label>ชื่ออาจารย์</label>
                    <input type="text" name="name" class="form-control" placeholder="ชื่อ" required><br>
                    <input type="text" name="surname" class="form-control" placeholder="นามสกุล" required><br>

                    <center>
                        <input type="submit" value="Add" class="btn btn-success">
                        <a href="a_group.php" class="btn btn-danger">Cancel</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        // Fetch data from the API
        $.ajax({
            url: 'api/select_class.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.code === 1) {
                    // Populate the select dropdown with data from the API
                    var select = $('#class').selectize()[0].selectize;
                    $.each(response.data, function(index, item) {
                        select.addOption({
                            value: item.class_id,
                            text: item.class
                        });
                    });
                } else {
                    console.error(response.message);
                }
            },
            error: function(error) {
                console.error("Error fetching data:", error);
            }
        });
    });
    $(document).ready(function() {
		// Fetch data from the API
		$.ajax({
			url: 'api/select_department.php',
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				if (response.code === 1) {
					// Populate the select dropdown with data from the API
					var select = $('#department').selectize()[0].selectize;
					$.each(response.data, function(index, item) {
						select.addOption({
							value: item.department_id,
							text: item.d_name
						});
					});

                     // Get the 'group' parameter from the URL
            var urlParams = new URLSearchParams(window.location.search);
            var group = urlParams.get('group');

            // Set the selected value based on the 'group' parameter
            if (group !== null) {
                select.setValue(group);
            }
				} else {
					console.error(response.message);
				}
			},
			error: function(error) {
				console.error("Error fetching data:", error);
			}
		});
	});
</script>

</html>