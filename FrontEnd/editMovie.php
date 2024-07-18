<?php
session_start();
if (!(isset($_SESSION['userType']) && $_SESSION['userType'] == 'A')) {
    header("Location: index.php");
    exit();
}
?>
<!-- no need -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Film</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        .whset {
            width: 200px;
            margin-top: 2px;
            margin-bottom: 2px;
            margin-left: 5px;
        }

        body {
            background: linear-gradient(100deg, #000915, #003465);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="editMovie.php" enctype="multipart/form-data">
            <table>

                <tr>
                    <td>Film ID: </td>
                    <td><input class="whset" type="text" name="filmId" id="filmId"></td>
                </tr>
                <tr>
                    <td>Film name: </td>
                    <td><input class="whset" type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td>Film description: </td>
                    <td><textarea class="whset" name="description" id="description"></textarea></td>
                </tr>
                <tr>
                    <td>Release year: </td>
                    <td>
                        <input class="whset" type="text" name="year" id="year">
                    </td>
                </tr>
                <tr>
                    <td>Genre: </td>
                    <td>
                        <input class="whset" type="text" name="genre" id="genre">
                    </td>
                </tr>
                <tr>
                    <td>Select language: </td>
                    <td>
                        <select class="whset" id="language" name="language">
                            <option value="0">--Select language--</option>
                            <option value="Sinhala">Sinhala</option>
                            <option value="English">English</option>
                            <option value="Tamil">Tamil</option>
                            <option value="Hindi">Hindi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Set ticket price: </td>
                    <td><input class="whset" type="text" id="price" name="price"></td>
                </tr>
                <tr>
                    <td>Choose banner image: </td>
                    <td><input class="whset" type="file" name="banner" id="banner"></td>
                </tr>
                <tr>
                    <td>Choose poster image: </td>
                    <td><input class="whset" type="file" name="poster" id="poster"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="whset" style="background-color: greenyellow;" type="submit" name="btnSubmit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>

<?php
require_once "../BackEnd/Movie.php";
require_once "../BackEnd/DBConnection.php";

if (isset($_POST['btnSubmit'])) {
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['year']) && !empty($_POST['language']) && !empty($_POST['price']) && !empty($_POST['genre']) &&  !empty($_FILES['poster']['name']) && !empty($_FILES['banner']['name'])) {

        $filmId = $_POST["filmId"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $year = $_POST["year"];
        $language = $_POST["language"];
        $price = $_POST["price"];
        $genre = $_POST["genre"];
        $posterImg = $_FILES["poster"]["name"];
        $posterTemp = $_FILES["poster"]["tmp_name"];
        $bannerImg = $_FILES["banner"]["name"];
        $bannerTemp = $_FILES["banner"]["tmp_name"];

        $movie = new Movie();
        //$result = $movie->EditMovie($filmId, $name, $year, $description, $language, $price, $genre, $posterImg, $posterTemp, $bannerImg, $bannerTemp);

        if ($result) {
            echo "<script> alert('Movie added successfully'); </script>";
        } else {
            echo "<script> console.log('Failed to add movie'); </script>";
        }
    } else {
        echo "<script> console.log('Please fill all the fields'); </script>";
    }
}
?>