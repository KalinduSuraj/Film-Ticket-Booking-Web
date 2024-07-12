<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="FooterStyle.css">

    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /*----  Main Style  ----*/
    </style>
    <title>Document</title>
</head>
<div class="container-fluid navbarColor">

    <nav class="container navbar justify-content pt-3">

        <div>
            <a href="index.php"><img class="logo" src="src/Logo.png" alt=""></a>

        </div>
        <div>
            <h1 class="logoTitle ">MovieLK</h1>
        </div>
        <?php



        if (isset($_SESSION['userName'])) {
            if ((isset($_SESSION['userType']) && $_SESSION['userType'] == 'A')) {
                echo '<div class="justify-content-end">
                            <div class="d-flex align-items-center">
                                <p class="mb-0 me-3 text-white log-out "> ' . $_SESSION['userName'] . '</p>
                                <a href="adminPanel.php"><button class="btn btn-primary rounded-pill h2"><i class="bi bi-person-circle"></i></button></a>
                                
                            </div>
                          </div>';
            } else {
                echo '<div class="justify-content-end">
                            <div class="d-flex align-items-center">
                                <p class="mb-0 me-3 text-white log-out "> ' . $_SESSION['userName'] . '</p>
                                <a href="userPanel.php"><button class="btn btn-primary rounded-pill h2"><i class="bi bi-person-circle"></i></button></a>
                                
                            </div>
                          </div>';
            }
        } else {
            echo '<div class="justify-content-end">
                        <a href="signIn.php"><button class="btn btn-primary">LogIn</button></a>
                        <a href="signUp.php"><button class="btn btn-primary">SignUp</button></a>
                      </div>';
        }
        ?>

    </nav>
</div>

<body class="body">
    <div class="cards_landscape_wrap-2">
        <div class="container">
            <h4 class="movie-heading">Movies</h4>
            <?php
            require_once "../BackEnd/Movie.php";
            require_once "../BackEnd/DBConnection.php";
            $obj = new Movie();
            echo $obj->ViewMovieForIndex();
            ?>
        </div>
    </div>

</body>
<!-- footer -->
<footer class="footer container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h5>About Us</h5>
                <p>
                    Ut congue augue non tellus bibendum, in varius tellus condimentum.
                    In scelerisque nibh tortor, sed rhoncus odio condimentum in.
                    Sed sed est ut sapien ultrices eleifend. Integer tellus est, vehicula eu lectus tincidunt,
                    ultricies feugiat leo.
                    Suspendisse tellus elit, pharetra in hendrerit ut, aliquam quis augue.
                    Nam ut nibh mollis, tristique ante sed, viverra massa.


                </p><br>
                <div class="d-flex ">
                    <a href="#">
                        <h5><i class="bi bi-twitter text-light me-3"></h5></i>
                    </a>
                    <a href="#">
                        <h5><i class="bi bi-facebook text-light me-3"></h5></i>
                    </a>
                    <a href="#">
                        <h5><i class="bi bi-instagram text-light me-3"></h5></i>
                    </a>
                    <a href="#">
                        <h5><i class="bi bi-whatsapp text-light me-3"></h5></i>
                    </a>
                </div>

            </div>
            <div class="col-5 FooterDetails">
                <br><br>
                <div>
                    <p> <small>Street name and number</small> City, Country</p>
                </div>
                <div>
                    <p> (+00) 0000 000 000</p>
                </div>
                <div>
                    <p><a href="#"> office@company.com</a></p>
                </div>
            </div>
            <div class="col-3 content-end">
                <img class="Footerlogo center" src="src/Logo.png" alt="">
                <h1 class="FooterlogoTitle">MovieLK</h1>
            </div>

        </div>
    </div>
    <div class="CopyRightDiv">
        <p class="CopyRight"> MovieLK &copy; 2024</p>
    </div>
</footer>

</html>