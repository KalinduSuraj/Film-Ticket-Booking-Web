<?php
session_start();
if (!(isset($_SESSION['userId']) && $_SESSION['userType'] == 'A')) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Film</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style type="text/css">
        body {
            background-color: #34315E;
            color: white;
        }

        textarea {
            resize: none;
        }
    </style>
</head>

<body class="body">
    <div class=" d-flex justify-content-center p-5">
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div class="bg p-3">
                <form method="POST" action="addfilm.php" enctype="multipart/form-data" id="addMovie-Form">
                    <h1 class="text-center">Add Movie Details</h1>
                    <table width="100%">
                        <!-- Name -->
                        <tr>
                            <td class="align-top p-2">Movie Name </td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="name" name="name" class="form-control form-control-sm align-top mt-2" placeholder="Enter Movie Name">
                                </div>
                            </td>

                        </tr>
                        <!-- Description -->
                        <tr>
                            <td class="align-top p-2">Movie Description </td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <textarea name="description" id="description" class="form-control form-control-sm align-top mt-2" placeholder="Enter Movie Description"></textarea>
                                </div>
                            </td>

                        </tr>
                        <!-- Release Year -->
                        <tr>
                            <td class="align-top p-2">Release Year </td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" name="year" id="year" class="form-control form-control-sm align-top mt-2" placeholder="Enter Movie Release Year">
                                </div>
                            </td>
                        </tr>
                        <!-- Genre -->
                        <tr>
                            <td class="align-top p-2">Genre </td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" name="genre" id="genre" class="form-control form-control-sm align-top mt-2" placeholder="Enter Movie Genre">
                                </div>
                            </td>
                        </tr>
                        <!-- Select language: -->
                        <tr>
                            <td class="align-top p-2">Select language</td>
                            <td>
                                <div data-mdb-input-init class="form-outline">

                                    <select class="form-select form-select-sm align-top mt-2" id="language" name="language">
                                        <option value="0">--Select language--</option>
                                        <option value="Sinhala">Sinhala</option>
                                        <option value="English">English</option>
                                        <option value="Tamil">Tamil</option>
                                        <option value="Hindi">Hindi</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <!-- Set ticket price -->
                        <tr>
                            <td class="align-top p-2">Set ticket price </td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="price" name="price" class="form-control form-control-sm align-top mt-2" placeholder="Enter Ticket Price">
                                </div>
                            </td>
                        </tr>
                        <!-- Choose banner image -->
                        <tr>
                            <td class="align-top p-2">Choose Banner Image </td>
                            <td>
                                <div data-mdb-input-init class="form-outline d-flex gap-2">
                                    <input type="file" name="banner" id="banner" class="form-control form-control-sm align-center mt-2">
                                </div>
                            </td>
                        </tr>
                        <!-- Choose poster image -->
                        <tr>
                            <td class="align-top p-2">Choose Poster Image </td>
                            <td>
                                <div data-mdb-input-init class="form-outline d-flex gap-2">
                                    <input type="file" name="poster" id="poster" class="form-control form-control-sm align-center mt-2">
                                </div>
                            </td>
                        </tr>
                        <!-- Submit btn -->
                        <tr>
                            <td></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end">
                                    <div data-mdb-input-init class="form-outline ">
                                        <button type="reset" class="btn btn-outline-danger reset align-top mt-2" id="btnResetFile">
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eraser-fill' viewBox='0 0 16 16'>
                                                <path d='M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z' />
                                            </svg>
                                        </button>
                                    </div>
                                    <div data-mdb-input-init class="form-outline ">
                                        <input class="btn btn-success align-end mt-2" id="btnSubmit" type="submit" name="btnSubmit" value="Submit">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById('addMovie-Form').addEventListener('submit', function(event) {
        let name = document.getElementById('name').value;
        let description = document.getElementById('description').value;
        let poster = document.getElementById('poster').files;
        let banner = document.getElementById('banner').files;
        let genre = document.getElementById('genre').value;
        let year = document.getElementById('year').value;
        let price = document.getElementById('price').value;
        let language = document.getElementById('language').value;

        let errorMessages = [];

        if (name === "") {
            errorMessages.push('Please enter Film Name.');
        }
        if (description === "") {
            errorMessages.push('Please enter Film Description.');
        }
        if (poster.length === 0) {
            errorMessages.push('Please Add Poster Image .');
        }
        if (banner.length === 0) {
            errorMessages.push('Please Add Banner Image.');
        }
        if (genre === "") {
            errorMessages.push('Please enter Genre.');
        }
        if (year === "" || isNaN(year) || year.length !== 4) {
            errorMessages.push('Please enter a valid 4-digit year.');
        }
        if (price === "" || isNaN(price)) {
            errorMessages.push('Please enter valid Price.');
        }
        if (language === "0") {
            errorMessages.push('Please enter a Language.');
        }

        if (errorMessages.length > 0) {
            event.preventDefault();
            alert(errorMessages.join('\n'));
        }
    });
</script>

</html>

<?php
require_once "../BackEnd/Movie.php";
require_once "../BackEnd/DBConnection.php";

if (isset($_POST['btnSubmit'])) {
    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['year']) && !empty($_POST['language']) && !empty($_POST['price']) && !empty($_POST['genre']) &&  !empty($_FILES['poster']['name']) && !empty($_FILES['banner']['name'])) {

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
        $result = $movie->AddMovie($name, $year, $description, $language, $price, $genre, $posterImg, $posterTemp, $bannerImg, $bannerTemp);

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