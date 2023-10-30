<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php require_once('import_header.php'); ?>

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
			text-align: center;
			background-color: #BFE6FF;
		}

		#myTable tr:hover {
			/* Add a grey background color to the table header and on hover */
			background-color: #d9d9d9;
		}

		.container {
			font-size: 16px;
			width: 100%;
			margin-left: 150px;
		}

		.input .head td1,
		td2,
		td3,
		td4,
		td5 {
			margin-left: 20px;
			width: 50px;
		}

		.input h2 {
			margin-top: 50px;
		}

		.orange-text {
			color: orange;
		}

		.green-text {
			color: green;
		}

		.red-text {
			color: red;
		}
	</style>
</head>
<?php include 'navbar/usernav.php'; ?>

<body>

	<br><br>
	<div class="container">
		<div class="main">
			<div class="input">

				<center>
					<h2>ประมวลรายวิชา</h2>
					<!-- <div class="head">
						<table>
							<tr>
								<td>
									<label>รายละเอียดรายวิชา ภาคเรียนที่</label>
									<select name="semester" id="semester">
										<option value="" selected></option>
										<option value="">เลือกภาคเรียน</option>
									</select>
								</td>
								<td>
									<label>ระดับชั้น</label>
									<select name="class" id="class">
										<option value="" selected></option>
										<option value="">เลือกระดับชั้น</option>
									</select>
								</td>
								<td>
									<label>กลุ่มสาระการเรียนรู้</label>
									<select name="department" id="department">
										<option value="" selected></option>
										<option value="">เลือกกลุ่มสาระการเรียนรู้</option>
									</select>
								</td>
								<td><label>วิชา</label>
									<select name="subjects" id="subjects">
										<option value="" selected></option>
										<option value="">เลือกวิชา</option>
									</select>
								</td>
								<td><label>รหัสวิชา</label>
									<select name="coursecode" id="coursecode">
										<option value="" selected></option>
										<option value="">เลือกรหัสวิชา</option>
									</select>
								</td>

					</div> -->
					</tr><br>
					<!-- <td width=30%>
						<label>ระดับ</label>
						<select name="degree" id="degree" onChange="changeList(this.value);Tsubmit();">
							<option value="ม.1" selected='selected'>ม.1</option>
							<option value="ม.2">ม.2</option>
							<option value="ม.3">ม.3</option>
							<option value="ม.4">ม.4</option>
							<option value="ม.5">ม.5</option>
							<option value="ม.6">ม.6</option>
						</select>
					</td> -->
					<!-- <td width=50%>
						<label>กลุ่มสาระการเรียนรู้</label>
						<select name="กลุ่มสาระการเรียนรู้" id="กลุ่มสาระการเรียนรู้">
							<option value="วิทยาศาสตร์และเทคโนโลยี">วิทยาศาสตร์และเทคโนโลยี</option>
							<option value="ภาษาต่างประเทศ">ภาษาต่างประเทศ</option>
							<option value="ภาษาไทย">ภาษาไทย</option>
							<option value="คณิตศาสตร์">คณิตศาสตร์</option>
							<option value="สังคมศึกษา ศาสนาและวัฒนธรรม">สังคมศึกษา ศาสนาและวัฒนธรรม</option>
							<option value="สุนทรียภาพและทักษะชีวิต">สุนทรียภาพและทักษะชีวิต</option>
							<option value="พัฒนาผู้เรียน (งานแนะแนว)">พัฒนาผู้เรียน (งานแนะแนว)</option>
						</select>
					</td> -->

					<tr>

						</table><br>
						<div class="tt">
							<!-- <br><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> -->
							<table id="myTable">
								<tr class="header">
									<th width=10%>รหัสวิชา</th>
									<th width=20%>ชื่อวิชา</th>
									<th width=10%>วันเดือนปี</th>
									<th width=10%>ระดับชั้น</th>
									<th width=5%>ดาวน์โหลด</th>
									<th width=10%>หัวหน้ากลุ่มสาระ</th>
									<th width=10%>ผู้บริหาร</th>
									<th width=10%>ข้อเสนอแนะ</th>
									<th width=10%>เอกสารแนบ</th>
								</tr>
						</div>
				</center>
			</div>
		</div>
	</div>
</body>

<script>
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


</html>
<?php
//คิวรี่ข้อมูลมาแสดงในตาราง
require_once 'connect.php';
$stmt = $conn->prepare("SELECT tbl_pdf.* , science.s_name,science.course_id, department.department_id FROM `tbl_pdf`
LEFT JOIN science ON tbl_pdf.course_id = science.subject_id
LEFT JOIN department ON tbl_pdf.department_id = department.department_id");
$stmt->execute();
$result = $stmt->fetchAll();
// print_r($result);
foreach ($result as $row) {
?>
	<tr>
		<td><?= $row['course_id'] ?></td>
		<td><?= $row['doc_name'] ?></td>		
		<td><?= $row['date'] ?></td>
		<td><?= $row['class_id'] ?></td>
		<td><a href="downloads/<?php echo $row['doc_file']; ?>" target="_blank"><i class="fa fa-download fa-lg"></i></td>


		<!-- <td><?php
			if ($row['status'] == 1) {
				echo '<span class="orange-text">รออนุมัติ</span>';
			} elseif ($row['status'] == 2) {
				echo '2'; // เพิ่มเงื่อนไขเมื่อ status เป็น 2 หัวหน้ากลุ่มอนุมัติ
			} elseif ($row['status'] == 3) {
				echo '<span class="green-text">ผ่านการอนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ status เป็น 3 ผู้บริหารอนุมัติ
			} elseif ($row['status'] == 4) {
				echo '<span class="red-text">ไม่ผ่านการอนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ หัวหน้ากลุ่มไม่อนุมัติ
			} elseif ($row['status'] == 5) {
				echo '<span class="red-text">ไม่ผ่านการอนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ ผู้บริหารไม่อนุมัติ
			} elseif ($row['status'] == 6) {
				echo 'สถานะไม่ระบุ';
			}
			?>
		</td> -->
		<td><?php
			if ($row['status'] >= 2 && $row['status'] != 4) {
				echo '<span class="green-text">อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ status เป็น 2 หัวหน้ากลุ่มอนุมัติ
			} elseif ($row['status'] == 4) {
				echo '<span class="red-text">ไม่อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ หัวหน้ากลุ่มไม่อนุมัติ
			// } elseif ($row['status'] == 5) {
			// 	echo '<span class="red-text">ไม่อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ ผู้บริหารไม่อนุมัติ
			// } elseif ($row['status'] == 6) {
			// 	echo 'สถานะไม่ระบุ';
			}
			?>
		</td>
		<td><?php
			if ($row['status'] == 3) {
				echo '<span class="green-text">อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ status เป็น 3 ผู้บริหารอนุมัติ
			} elseif ($row['status'] == 5) {
				echo '<span class="red-text">ไม่อนุมัติ</span>'; // เพิ่มเงื่อนไขเมื่อ ผู้บริหารไม่อนุมัติ
			} elseif ($row['status'] == 6) {
				echo 'สถานะไม่ระบุ';
			}
			?>
		</td>
		<td><?= $row['text'] ?></td>
		<td><a href="<?php echo $row['file']; ?>" target="_blank"><i class="fa fa-download fa-lg"></i></a></td>

	<?php } ?>