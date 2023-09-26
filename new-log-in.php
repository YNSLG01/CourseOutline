<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php file_exists('import_header.php') ? require_once('import_header.php') : exit; 
	if (file_exists('../conn.php') && file_exists('function_all.php')) {
		require_once '../conn.php';
		require_once 'function_all.php';
	
		$filename = basename($_SERVER['PHP_SELF']);
		$flag = checkWebPermission($conn, $filename);
	
	}
	
	?>
	<style>
		body {
			font-family: "Lato", sans-serif;
		}

		.sidebar {
			height: 100%;
			width: 250px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #bfe6ff;
			overflow-x: hidden;
			padding-top: 16px;
		}

		.sidebar a {
			display: block;
			color: black;
			padding: 16px;
			text-decoration: none;
		}

		.sidebar a.active {
			background-color: #04AA6D;
			color: white;
		}

		.sidebar a:hover:not(.active) {
			background-color: #d9d9d9;
			color: white;
		}

		div.content {
			margin-left: 200px;
			padding: 1px 16px;
			height: 1000px;
		}

		@media screen and (max-width: 700px) {
			.sidebar {
				width: 100%;
				height: auto;
				position: relative;
			}

			.sidebar a {
				float: left;
			}

			div.content {
				margin-left: 0;
			}
		}

		@media screen and (max-width: 400px) {
			.sidebar a {
				text-align: center;
				float: none;
			}
		}

		.main {
			margin-left: 250px;
			/* Same as the width of the sidenav */
			padding: 0px 10px;
		}
	</style>
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
			width: 100%;
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
	</style>
</head>
<body>


  <div class="sidebar">
    <br><br>
    <center>
      <td><img src="image/Logo.png" ; width="150" ; height="100"></td>
      <br><br>
      <h1>
        <img src="image/user2.png" ; width="90" ; height="120">
      </h1>

   <div id ="menuList">
   <a href="logout.php">logout</a>
   <a href="logout.php">logout</a>
   <a href="logout.php">logout</a>
   <a href="logout.php">logout</a>
   <a href="logout.php">logout</a>
   <a href="logout.php">logout</a>
   <a href="logout.php">logout</a>
   </div>
       
   

        </center>
  </div>

  <div class="main">
    <center>
	<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password">
                            <input type="checkbox" id="showPassword"> Show Password
                        </div>
                        <button type="submit" class="btn btn-primary" id="loginBtn" disabled>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </center>
  </div>

</body>
<script>
    $(document).ready(function () {
        // Hide/Show password functionality
        $('#showPassword').click(function () {
            if ($(this).prop('checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });

        // Disable login button if username or password is blank
        $('#username, #password').on('keyup', function () {
            if ($('#username').val() !== "" && $('#password').val() !== "") {
                $('#loginBtn').prop('disabled', false);
            } else {
                $('#loginBtn').prop('disabled', true);
            }
        });
    });
</script>
</html>
