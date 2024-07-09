<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" > </script>


</head>
<body style="background-color:#34315e">
	<div class="container">
		<div class="row">
			
			<table class="table table-dark" id="tblFilms">
				<thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Language</th>
				      <th scope="col">Year</th>
				      <th scope="col">Remove</th>
				    </tr>
				</thead>
				 
				</table>
				<!-- --remove this-- !-->
				<input type="button" name="" onclick="addRow()" value="add">
		</div>
	</div>

<!-- --------------------
	java Script
-------------------- !-->


		<script>
		  //set forloop for addRow function to create table rows which are related to db
		// function addRow() {
		//   var table = document.getElementById("tblFilms");
		//   //asign film id using sql quary
				
		// 		  var row = table.insertRow(1);
		// 		  var cell1 = row.insertCell(0);
		// 		  var cell2 = row.insertCell(1);
		// 		  var cell3 = row.insertCell(2);
		// 		  var cell4 = row.insertCell(3);
		// 		  var cell5 = row.insertCell(4);
		// 		  cell1.innerHTML = filmId;
		// 		  cell2.innerHTML = "Film name";
		// 		  cell3.innerHTML = "Sinhala";
		// 		  cell4.innerHTML = "2004";
		// 		  cell5.innerHTML = '<input data-number=filmId class="rounded" style="background-color: red;color: white;" type="button" name="Remove" value="Remove" onclick="deleteRow(' + filmId + ')">';
			

		// }

			
		// function deleteRow(cn)
		// {
		// 	document.getElementById("tblFilms").deleteRow(cn);
		// }
		</script>
		<script>
        function fetchMovies() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_movies.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var movies = JSON.parse(xhr.responseText);
                    populateTable(movies);
                }
            };
            xhr.send();
        }

        function populateTable(movies) {
            var tableBody = document.getElementById('tblFilmsBody');
            tableBody.innerHTML = ''; // Clear any existing rows

            movies.forEach(function(movie, index) {
                var row = document.createElement('tr');
                row.innerHTML = `
                    <th scope="row">${index + 1}</th>
                    <td>${movie.Name}</td>
                    <td>${movie.Language}</td>
                    <td>${movie.Relese_Year}</td>
                    <td><input data-number="${index + 1}" class="rounded" style="background-color: red;color: white;" type="button" name="Remove" value="Remove" onclick="deleteRow(${index + 1})"></td>
                `;
                tableBody.appendChild(row);
            });
        }

        function deleteRow(rowId) {
            var table = document.getElementById('tblFilms');
            table.deleteRow(rowId);
        }

        // Fetch movies on page load
        window.onload = fetchMovies;
    </script>


</body>
</html>