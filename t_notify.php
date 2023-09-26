<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php require_once('import_header.php'); ?>
	<style>
		#myInput {
			background-image: url('/css/searchicon.png');
			/* Add a search icon to input */
			background-position: 10px 12px;
			/* Position the search icon */
			background-repeat: no-repeat;
			/* Do not repeat the icon image */
			width: 100%;
			/* Full-width */
			font-size: 16px;
			/* Increase font-size */
			padding: 12px 20px 12px 40px;
			/* Add some padding */
			border: 1px solid #ddd;
			/* Add a grey border */
			margin-bottom: 12px;
			/* Add some space below the input */
		}

		.input label {
			font-size: 30px;
		}

		#myTable {
			border-collapse: collapse;
			/* Collapse borders */
			width: 80%;
			/* Full-width */
			border: 1px solid #ddd;
			/* Add a grey border */
			font-size: 18px;
			/* Increase font-size */
			background-color: #FFFFFF;
		}

		#myTable th,
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

		.container .main {
			width: 100%;
			margin-left: 150px;
		}
	</style>
</head>
<?php include 'navbar/usernav.php'; ?>

<body>

	<br>
	<br>
	<div class="container">
		<div class="main">
			<center>
				<h2> การแจ้งเตือน</h2><br>
				<table size="80%" border="0">
					<tr>
						<td width=40%>
							<label>รายละเอียดรายวิชา ภาคเรียนที่</label>
							<select name="term" id="term" onchange="Tsubmit();">
								<option value="1/2566" selected>1/2566</option>
								<option value="2/2566">2/2566</option>
								<option value="1/2565">1/2565</option>
								<option value="2/2565">2/2565</option>
							</select>
						</td>
						<td width=20%>
							<label>ระดับ</label>
							<select name="degree" id="degree" onChange="changeList(this.value);Tsubmit();">
								<option value="ม.1" selected='selected'>ม.1</option>
								<option value="ม.2">ม.2</option>
								<option value="ม.3">ม.3</option>
								<option value="ม.4">ม.4</option>
								<option value="ม.5">ม.5</option>
								<option value="ม.6">ม.6</option>
							</select>
						</td>
						<td width=40%>
							<label>กลุ่มสาระการเรียนรู้</label>
							<select name="กลุ่มสาระการเรียนรู้" id="กลุ่มสาระการเรียนรู้">
								<?php
								require_once 'connect.php';
								$stmt = $conn->prepare("SELECT* FROM department");
								$stmt->execute();
								$result = $stmt->fetchAll();
								foreach ($result as $row) {
								?>
									<option value="<?php echo $row['department_id'] ?>"> <?php echo $row['d_name'] ?></option>

								<?php } ?>
							</select>
						</td>
					</tr>
				</table>
				<br>
				<table id="myTable">
					<tr class="header">
						<th width=10%>รหัสวิชา</th>
						<th width=40%>ชื่อวิชา</th>
						<th width=20%>วัน/เดือน/ปี</th>
						<th width=10%>ระดับชั้น</th>
					</tr>


			</center>
		</div>
	</div>
</body>

</html>