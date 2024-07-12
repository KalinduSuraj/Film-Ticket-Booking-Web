<?php
session_start();
if (!$_SESSION['userId']) {
	header("Location: signIn.php");
} else {
	if (!$_GET['F_Id']) {
		header("Location: index.php");
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seat Booking</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>

	<style type="text/css">
		body {
			background-color: #14004D;
			color: white;
		}

		.container1 {
			background-color: #fdfeff47;
			-webkit-backdrop-filter: blur(5px);
			backdrop-filter: blur(5px);
			height: 80%;
			width: 80%;
			border-radius: 10px;
		}

		.btnStyle {
			margin: 5px;

		}

		.trapezoid {
			border-bottom: 50px solid #CDCDCD;
			border-left: 25px solid transparent;
			border-right: 25px solid transparent;
			height: 0;
			width: 250px;

		}
	</style>
</head>

<body onload="dateBtn(); seatArray(); ">
	<div class="container-fluid">
		<div class="row">
			<div class="col d-flex justify-content-center mb-3 ">
				<h1>Select your watching place</h1>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<!-- --------------------
						select date 
					-------------------- !-->
				<div class="row bg-dark">
					<div class="col ">
						<table id="forDate">
							<tr>

							</tr>

						</table>
					</div>
					<!-- --------------------
						select Time 
					-------------------- !-->
					<div class="col d-flex">
						<table id="forTime">
							<tr style="align-items: center; align-content: center;">
								<td><button type="button" id='time1' class="btn btn-outline-info btnStyle" onclick="timeClick(this.id)" value="10.00 AM">10.00 AM </button></td>
								<td><button type="button" id='time2' class="btn btn-outline-info btnStyle" onclick="timeClick(this.id)" value="01.00 PM">01.00 PM </button></td>
								<td><button type="button" id='time3' class="btn btn-outline-info btnStyle" onclick="timeClick(this.id)" value="04.00 PM">04.00 PM </button></td>
								<td><button type="button" id='time4' class="btn btn-outline-info btnStyle" onclick="timeClick(this.id)" value="07.00 PM">07.00 PM </button></td>
							</tr>
						</table>
						<p id="month"></p>
						<p id="date"></p>
						<p id="timeBelt"></p>
					</div>
				</div>
				<br><br>

				<div class="row container">
					<!-- ------------------ 
						booking array 
					-------------------	!-->

					<div class="col container1 justify-content-center">
						<div class="row d-flex">
							<table id="seat">

							</table>
						</div>
						<br>
						<div class="row d-flex justify-content-center">
							<br>
							<div class="d-flex trapezoid">
								<p style="margin-top: 5px;margin-left: 60px;color: black;">Screen</p>
							</div>
						</div>


					</div>

					<!-- ------------------ 
						booking Table 
					-------------------	!-->
					<div class="col">
						<form>
							<table class="table" id="bookingTable">
								<thead>
									<tr>
										<th scope="col">Film Name</th>
										<th scope="col">Date</th>
										<th scope="col">Time</th>
										<th scope="col">Seat No</th>
										<th scope="col">Price</th>
										<th scope="col">Remove</th>
									</tr>
								</thead>
							</table>

							<input type="submit" text="run">

						</form>
					</div>

				</div>


			</div>
		</div>
	</div>


	<script type="text/javascript">
		/*---------------------------  making seat array ---------------------------------*/
		function seatArray() {
			var table = document.getElementById("seat");

			//for default time didfine
			document.getElementById('timeBelt').value = "10.00 AM";
			document.getElementById('time1').style.backgroundColor = "#4AF1FF";
			document.getElementById('time1').style.color = "#002C3B ";



			for (var i = 0; i < 10; i++) {
				var row = table.insertRow(i);
				for (let j = 65; j <= 75; j++) {
					var x = 0;
					var cell1 = row.insertCell(x);
					var sId = String.fromCharCode(j) + i;
					cell1.innerHTML = '<input id=' + sId + ' class="btn btn-sm btn-success btnStyle" style="background-color: #5BFF85 ;color : #00484D;" type="button" name="sId" value=' + sId + ' onclick="setSeat(this.value)">';


				}
			}
		}
		/*---------------------------  set seat details to table ---------------------------------*/
		function setSeat(sId) {
			if (document.getElementById("date").value == null) {
				alert("Please select date first..!")
			} else {



				var seatId = sId.toString();

				//fName,shId,vId,

				var date = document.getElementById("date").value;
				var month = document.getElementById("month").value;

				var table2 = document.getElementById("bookingTable");
				var rowsNo = table2.getElementsByTagName("tr");

				var x = 0;

				for (let i = 1; i < rowsNo.length; i++) {

					var cellsNo = rowsNo[i].getElementsByTagName("td");
					var seatNo1 = cellsNo[4].textContent;


					if (seatNo1.toString() === seatId) {
						alert("This seat already booked..!");
						x = 1;
						break;
					}

				}

				if (x == 0) {

					document.getElementById(sId).style.backgroundColor = "#FF4545 ";

					var row = table2.insertRow(1);
					var cell1 = row.insertCell(0);
					var cell2 = row.insertCell(1);
					var cell3 = row.insertCell(2);
					var cell4 = row.insertCell(3);
					var cell5 = row.insertCell(4);
					var cell6 = row.insertCell(5);

					cell1.innerHTML = "Film name";
					cell2.innerHTML = month + "/" + date;
					cell3.innerHTML = document.getElementById("timeBelt").value;
					cell4.innerHTML = seatId;
					cell5.innerHTML = "RS.250.00"
					cell6.innerHTML = '<input id=' + seatId + ' class="btn btn-sm btn-danger" style="background-color: #FF4545 ;color: white;" type="button" name="Remove" value="Remove"  onclick="deleteRow(this.id)">';

				}

			}
		}


		/*--------------------------- Remove seat details from table ---------------------------------*/
		function deleteRow(cn) {
			var table = document.getElementById("bookingTable");
			var rows = table.getElementsByTagName("tr");

			for (let i = 1; i < rows.length; i++) {
				var cells = rows[i].getElementsByTagName("td");
				var seatNo = cells[4].textContent;

				if (seatNo.toString() === cn.toString()) {
					table.deleteRow(i);
					document.getElementById(cn).style.backgroundColor = "#5BFF85 ";
					break;
				}

			}

		}

		/*--------------------------- Create date buttons ---------------------------------*/
		function dateBtn() {
			let dateObj = new Date();
			let monthNum = dateObj.getMonth();

			let monthNames = [
				'January', 'February', 'March', 'April', 'May', 'June',
				'July', 'August', 'September', 'October', 'November', 'December'
			];

			let monthName = monthNames[monthNum];


			var dateTable = document.getElementById('forDate');
			var dateRow = dateTable.insertRow(0);


			for (let i = 0; i < 7; i++) {
				let btnId = "date" + i;
				let day = String(dateObj.getDate() + i).padStart(2, '0');
				var cellDate = dateRow.insertCell(i);
				cellDate.innerHTML = '<button type="button" id=' + btnId + ' class="btn btn-outline-warning btnStyle" onclick="dateClick(\'' + btnId + '\', \'' + monthName + '\', \'' + day + '\')">' + monthName + '<br>' + day + '</button>';
			}

		}
		/*--------------------------- Date button click ---------------------------------*/
		function dateClick(btnId, monthName, day) {


			for (var i = 0; i < 7; i++) {
				document.getElementById("date" + i).style.backgroundColor = "";
				document.getElementById("date" + i).style.color = "";
			}

			document.getElementById(btnId).style.backgroundColor = "orange";
			document.getElementById(btnId).style.color = "black";

			document.getElementById('month').value = monthName;
			document.getElementById('date').value = day;

		}

		/*--------------------------- Time button click ---------------------------------*/
		function timeClick(btnId) {
			document.getElementById('timeBelt').value = document.getElementById(btnId).value;

			for (var i = 1; i < 5; i++) {
				document.getElementById("time" + i).style.backgroundColor = "";
				document.getElementById("time" + i).style.color = "";
			}

			document.getElementById(btnId).style.backgroundColor = "#4AF1FF";
			document.getElementById(btnId).style.color = "#002C3B ";
		}

		/*--------------------------- Total price calculation ---------------------------------*/
		function totCal() {

		}
	</script>

</body>

</html>