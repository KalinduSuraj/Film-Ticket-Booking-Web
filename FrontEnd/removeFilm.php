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
				      <th scope="col">Film ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Language</th>
				      <th scope="col">Year</th>
				      <th scope="col">Remove</th>
				    </tr>
					<?php
						require_once "../BackEnd/Movie.php";
						require_once "../BackEnd/DBConnection.php";

						$obj = new Movie();
						 echo $obj->ViewMovieForRemovePage();
					?>
				</thead>
				 
				</table>
		</div>
	</div>

<!-- --------------------
	java Script
-------------------- !-->
<script>
	function removeMovie(filmId){
    window.location.href = '../BackEnd/path_to_php_file.php?filmId=' + filmId;
}

</script>


</body>
</html>