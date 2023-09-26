<?php
include 'condb.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Arbutus Slab' rel='stylesheet'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/index.css">

</head>

<body>
	<!-- <center> -->
	<div class="homepage"></div>
	<!-- <br><br><br><br><br><br><br> -->
	<!-- <div style="background-color: #FFFFFF; width: 1200px; height: 350px"> -->
	<div class="back"></div>
	<div class="login">
		<div class="content"></div>
		<form action="#" method="POST" class="form-home">

			<div class="home">
				<div class="account">
					<center>
						<h3><img src="image/Logo.png" width="150" ; height="97"></h3>
						<br><h1>ระบบประมวลรายวิชา</h1>

						<!-- <h4>Demonstration School of Thaksin University</h4><br> -->
				</div>
				</center>
				<center>
					<br>
					<div class="input-deg">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" placeholder="username" name="username" value="">

						<!-- <label for="input">Username</label> -->
					</div>
					<br>
					<div class="input-deg">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" placeholder="password" name="password" value="">

						<!-- <label for="input">Password</label> -->
					</div>

					<br><input class="button" type="submit" name="login" value="Login">
					<!-- <div class="remember">
                        <input type="checkbox" checked>
                        <span>remember me</span>
                         <span1>Forgot Password?</span1>
                    </div> -->



			</div>


		</form>
	</div>
	</center>
</body>

</html>