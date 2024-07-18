<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>testmy</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>

	<style>
		body {
			font-family: "Lato", sans-serif;
		}

		.backimage {
			background: linear-gradient(100deg, #000915, #003465);
		}

		.sidebar {
			height: 100%;
			width: 200px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #000a24;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
			margin-top: 50px;
		}

		.sidebar a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}

		.sidebar .a1:hover {
			color: white;
			background-color: #34315e;
		}

		.sidebar .a2:hover {
			color: white;

		}

		.sidebar .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 0px;
			margin-top: 0;
		}

		@media screen and (max-height: 450px) {
			.sidebar {
				padding-top: 15px;
			}

			.sidebar a {
				font-size: 18px;
			}
		}

		.p1 {
			padding: 8px 8px 8px 32px;
		}
	</style>
</head>

<body>
	<!-- ------------------------------------------
 		top bar
------------------------------------------ !-->
	<div class="container-fluid  backimage vh-100">
		<div class="row d-flex" style="height: 50px; background-color:#121b30; color:white ; font-size: 24px;">
			<div class="container d-flex">
				<div class="col-6">
					<p class="p1">Dashboard</p>
				</div>
				<div class="col d-flex justify-content-end">
					<p class="p1"><a href="index.php" class="navbar-brand">MovieLK</a> </p><img src="src/Logo.png" style="height:50px;width:50px; text-decoration:none">
				</div>
			</div>
		</div>
		<!-- ------------------------------------------
 		siderbar
------------------------------------------ !-->
		<div class="row ">
			<div class="container d-flex">
				<div id="mySidenav" class="sidebar ">
					<a href="javascript:void(0)" class="closebtn a2" onclick="closeNav()">&#9776;</a>
					<a class="a1" href="#" onclick="confirmLogout()">Logout</a>

				</div>
				<span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776; </span>
			</div>
		</div>
		<!-- ------------------------------------------
 		form load
------------------------------------------ !-->
		<div class="col ">
			<!-- <iframe src="viewBooking.php" id="main" style=" margin-Left:200px;margin-top:0px; width: 85%; height: 500px;"> -->
			</iframe>
		</div>

	</div>


	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "200px";
			document.getElementById("main").style.marginLeft = "200px";

		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft = "0";
		}

		function confirmLogout() {
			if (confirm('Are you sure you want to log out?')) {
				window.location.href = 'logOut.php';
			} else {
				window.location.href = 'index.php';
			}
		}
	</script>

</body>

</html>