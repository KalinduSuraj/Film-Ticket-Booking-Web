<?php
require_once "../BackEnd/Movie.php";
require_once "../BackEnd/DBConnection.php";
$obj = new Movie();
if (isset($_GET['F_Id'])) {
    $filmId = $_GET['F_Id'];
    $obj->RemoveMovie($filmId);
    echo "<script type='text/javascript'>
    alert('Movie Removed Successfully!')</script>";
    echo "<script> window.location.href = '../FrontEnd/viewFilm.php'; </script>";
} else {
    echo "Error: filmId not provided";
}
