<!DOCTYPE html>
<html>

<head>
	<title>อัปโหลดประมวลรายวิชา</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php require_once('import_header.php'); ?>

</head>
<?php include 'navbar/usernav.php'; ?>
<style>
	.container {
		width: 70%;
		margin-left: 280px;
	}
</style>

<body>
	<div class="container">
		<div class="main">

			<br>
			<br>

			<div class="container my-5">
				<div class="card">
					<div class="card-body">
						<div class="form-row">
							<div class="form-group col-md-4">

								<label>รายละเอียดรายวิชา ภาคเรียนที่</label>
								<select name="semester" id="semester">
									<option value="" selected></option>
									<option value="">เลือกภาคเรียน</option>
								</select>

							</div>
							<div class="form-group col-md-4">
								<label>ระดับชั้น</label>
								<select name="class" id="class">
									<option value="" selected></option>
									<option value="">เลือกระดับชั้น</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="department">กลุ่มสาระการเรียนรู้</label>
								<select name="department_id" id="department">
									<option value="">เลือกกลุ่มสาระการเรียนรู้</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="subjects">วิชา</label>
								<select name="subject_id" id="subjects">
									<option value="">เลือกวิชา</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="coursecode">รหัสวิชา</label>
								<select name="coursecode_id" id="coursecode">
									<option value="">เลือกรหัสวิชา</option>
								</select>
							</div>
							<div class="form-group col-md-4" style="display: none;">
								<label for="coursecode">สถานะ</label>
								<input type="text" name="status" id="status" value="1">
							</div>
							<br>
							<label>อัปโหลดเอกสาร</label>
							<form id="uploadFileCourseSyllabus" method="post" enctype="multipart/form-data">
								<input type="text" name="doc_name" required class="form-control" placeholder="ชื่อวิชา"> <br>
								<font color="red">*อัปโหลดได้เฉพาะ .pdf เท่านั้น </font>
								<input type="file" name="doc_file" required class="form-control" accept="application/pdf"> <br>
								<button type="submit" class="btn btn-primary">Upload</button>
								<button type="reset" class="btn btn-primary">reset</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>

</body>
ิ<script>
	$(document).ready(function() {
		// Fetch data from the API
		$.ajax({
			url: 'api/select_semester.php',
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				if (response.code === 1) {
					// Populate the select dropdown with data from the API
					var select = $('#semester').selectize()[0].selectize;
					$.each(response.data, function(index, item) {
						select.addOption({
							value: item.semester_id,
							text: item.description
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
</script>
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
</script>
<script>
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
<script>
	$(document).ready(function() {
		// Fetch data from the API
		$.ajax({
			url: 'api/select_subjects.php',
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				if (response.code === 1) {
					// Populate the select dropdown with data from the API
					var select = $('#subjects').selectize()[0].selectize;
					$.each(response.data, function(index, item) {
						select.addOption({
							value: item.subject_id,
							text: item.s_name
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
</script>
<script>
	$(document).ready(function() {
		// Fetch data from the API
		$.ajax({
			url: 'api/select_coursecode.php',
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				if (response.code === 1) {
					// Populate the select dropdown with data from the API
					var select = $('#coursecode').selectize()[0].selectize;
					$.each(response.data, function(index, item) {
						select.addOption({
							value: item.course_id,
							text: item.code_id
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
</script>



<script>
	$(document).ready(function() {

		$("select").selectize();
		$("#uploadFileCourseSyllabus").submit(function(event) {
			event.preventDefault(); // Prevent the default form submission

			var formData = new FormData(this); // Create a FormData object from the form

			$.ajax({
				url: 'api/upload_course.php', // The URL to send the data to
				type: "POST",
				data: formData,
				processData: false, // Important! Do not process the data
				contentType: false, // Important! Set content type to false as jQuery will tell the server its a query string request
				success: function(response) {
					// Handle the server response here
					console.log(response)
					// Convert the response string to a JSON object
					const jsonResponse = JSON.parse(response);

					// Check the value of the 'code' property
					if (jsonResponse.code == 1) {
						// Show a SweetAlert message


						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: jsonResponse.message
						}).then((result) => {
							// Redirect the user to the specified URL after closing the SweetAlert message
							if (result.isConfirmed) {
								// Redirect the user to the specified URL
								window.location.href = jsonResponse.redirect;
							}
						});


					} else {
						// Handle other cases (e.g., error messages) here if needed
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: jsonResponse.message
						});
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// Handle any errors here
					alert("Error uploading file: " + textStatus);
				}
			});
		});


	});
</script>

<!-- <script>
	$(document).ready(function() {
		$("select").selectize();
		$("#uploadFileCourseSyllabus").submit(function(event) {
			event.preventDefault(); // Prevent the default form submission

			var formData = new FormData(this); // Create a FormData object from the form

			// Add department_id and status to the FormData object
			formData.append('department_id', $('#department').val());
			formData.append('status', $('#status').val());

			$.ajax({
				url: 'api/upload_course.php', // The URL to send the data to
				type: "POST",
				data: formData,
				processData: false, // Important! Do not process the data
				contentType: false, // Important! Set content type to false as jQuery will tell the server it's a query string request
				success: function(response) {
					// Handle the server response here
					console.log(response);
					// Convert the response string to a JSON object
					const jsonResponse = JSON.parse(response);

					// Check the value of the 'code' property
					if (jsonResponse.code == 1) {
						// Show a SweetAlert message
						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: jsonResponse.message
						}).then((result) => {
							// Redirect the user to the specified URL after closing the SweetAlert message
							if (result.isConfirmed) {
								// Redirect the user to the specified URL
								window.location.href = jsonResponse.redirect;
							}
						});

						// Assuming that jsonResponse contains the saved file information
						// You can now make an additional AJAX request to save the data to the database
						$.ajax({
							url: 'api/save_to_database.php', // Replace with the actual URL to save to the database
							type: 'POST',
							data: {
								doc_name: formData.get('doc_name'), // Get the document name from the form
								doc_file: jsonResponse.savedFileName, // Get the saved file name from the response
								department_id: formData.get('department_id'), // Get department_id from the form
								status: formData.get('status') // Get status from the form
								// Add other data as needed
							},
							success: function(databaseResponse) {
								console.log('Data saved to the database:', databaseResponse);
								// Handle success or error here
							},
							error: function(error) {
								console.error('Error saving data to the database:', error);
								// Handle the database error here
							}
						});
					} else {
						// Handle other cases (e.g., error messages) here if needed
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: jsonResponse.message
						});
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// Handle any errors here
					alert("Error uploading file: " + textStatus);
				}
			});
		});
	});
</script> -->


</html>