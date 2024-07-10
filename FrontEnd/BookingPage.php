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
			background: linear-gradient(100deg, #000915, #003465);
			color: white;
		}

		.container1 {
			background-color: #fdfeff47;
			-webkit-backdrop-filter: blur(5px);
			backdrop-filter: blur(5px);
			height: 80%;
			width: 80%;
			border-radius: 20px;
		}
	</style>
</head>

<body onload="seatArray()">
	<div class="container ">
		<div class="row">
			<div class="col d-flex justify-content-center mb-3 ">
				<h1>Select your watching place</h1>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<!-- --------------------
						select date and month
					-------------------- !-->
				<div class="row">
					<div class="col">
						<table>
							<tr>
								<td>Select Date</td>
								<td>
									<select id="month">
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>



									</select>
								</td>
								<td>
									<select id="date">
										<option value="1">Day 1</option>
										<option value="2">Day 2</option>
										<option value="3">Day 3</option>
										<option value="4">Day 4</option>
										<option value="5">Day 5</option>
										<option value="6">Day 6</option>
										<option value="7">Day 7</option>
										<br>
										<option value="8">Day 8</option>
										<option value="9">Day 9</option>
										<option value="10">Day 10</option>
										<option value="11">Day 11</option>
										<option value="12">Day 12</option>
										<option value="13">Day 13</option>
										<option value="14">Day 14</option>
										<br>
										<option value="15">Day 15</option>
										<option value="16">Day 16</option>
										<option value="17">Day 17</option>
										<option value="18">Day 18</option>
										<option value="19">Day 19</option>
										<option value="20">Day 20</option>
										<option value="21">Day 21</option>
										<br>
										<option value="22">Day 22</option>
										<option value="23">Day 23</option>
										<option value="24">Day 24</option>
										<option value="25">Day 25</option>
										<option value="26">Day 26</option>
										<option value="27">Day 27</option>
										<option value="28">Day 28</option>
										<br>
										<option value="29">Day 29</option>
										<option value="30">Day 30</option>
									</select>

								</td>
							</tr>
						</table>
					</div>
				</div>
				<br><br>

				<div class="row">
					<!-- ------------------ 
						booking array 
					-------------------	!-->
					<div class="col-6">
						<table id="seat">

						</table>
					</div>
					<!-- ------------------ 
						booking array 
					-------------------	!-->
					<div class="col-6">
						<form>
							<table class="table" id="bookingTable">
								<thead>
									<tr>
										<th scope="col">Film Name</th>
										<th scope="col">Shedule ID</th>
										<th scope="col">Viwer ID</th>
										<th scope="col">Date</th>
										<th scope="col">Seat No</th>
										<th scope="col">Remove</th>
									</tr>
								</thead>
							</table>
							<input type="submit">
						</form>
					</div>

				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		function seatArray() {
			var table = document.getElementById("seat");
			var date = document.getElementById("date").value;


			for (var i = 0; i < 10; i++) {
				var row = table.insertRow(i);
				for (let j = 65; j <= 75; j++) {
					var x = 0;
					var cell1 = row.insertCell(x);
					var sId = String.fromCharCode(j) + i;
					cell1.innerHTML = '<input id=' + sId + ' class="rounded" style="background-color: green;border:none;padding:5px;margin:5px;padding-left:5px;color: white;" type="button" name="sId" value=' + sId + ' onclick="setSeat(this.value)">';


				}
			}
		}

		function setSeat(sId) {

			var seatId = sId.toString();

			alert(seatId);
			//fName,shId,vId,
			document.getElementById(sId).style.backgroundColor = "red";
			var date = document.getElementById("date").value;
			var month = document.getElementById("month").value;

			var table2 = document.getElementById("bookingTable");

			var row = table2.insertRow(1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);

			cell1.innerHTML = "Film name";
			cell2.innerHTML = "S001";
			cell3.innerHTML = "V001";
			cell4.innerHTML = month + "/" + date;
			cell5.innerHTML = seatId;
			cell6.innerHTML = '<input class="rounded" style="background-color: red;color: white;" type="button" name="Remove" value="Remove" onclick="deleteRow(' + seatId + ')">';

		}

		function deleteRow(cn) {
			var table = document.getElementById("bookingTable");
			var rows = table.getElementsByTagName("tr");

			for (let i = 1; i < rows.length; i++) {
				var cells = rows[i].getElementsByTagName("td");
				var seatNo = cells[4].textContent;

				if (seatNo.toString() === cn.toString()) {
					table.deleteRow(i);
					break;
				} else {
					alert(cn);
				}
			}

		}
	</script>

</body>

</html