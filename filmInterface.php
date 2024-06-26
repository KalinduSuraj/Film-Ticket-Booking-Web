<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Movie Details</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="FooterStyle.css">
  <style>
    .movie-banner {
      background-image: url("src/banner1jpg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      height: 400px;
      color: white;
      display: flex;
      align-items: start;
      justify-content: center;
      flex-direction: column;
      text-align: start;
    }



    .movie-details {
      margin-top: -100px;
      justify-content: start;
      margin-left: 50px;
    }

    .movie-details img {
      margin-top: 400px;
      width: 40%;
    }

    .movie-info {
      background-color: #EEEDEB;
      padding: 20px;
      border-radius: 13px;
      margin-top: 80px;
      height: 230px;
      margin-bottom: -30px;

    }




    .name-date {
      position: absolute;
      text-align: end;
      left: 0;
      margin-top: 20px;

    }

    .DateLabel {
      font-weight: bold;
      padding-top: 5px;
      padding-bottom: 5px;
      padding-left: 10px;
      padding-right: 10px;
      border-radius: 10px;
      font-size: 30px;
    }

    .MovieName {
      font-weight: bold;
      font-size: 50px;
    }

    .MovieInfoBody {
      background-color: azure;

    }

    .btnBooking {
      border-radius: 5px;
      border: 0;
      height: 40px;
      width: 130px;
      color: black;
      font-weight: bold;
      font-size: 18px;

    }
  </style>
</head>

<body class="MovieInfoBody">
  <div class="container-fluid p-0">
    <div id="MovieBanner" class="movie-banner">
      <div class="movie-details">
        <img id="MoviePoster" src="src/movie3.jpg" alt="Movie Poster" class="movie-poster rounded " />
      </div>
    </div>

    <div class="name-date container-fluid">
      <h4 id="MovieName" class="MovieName">Movie Name <label id="Date" class="DateLabel badge-warning">2024 May 06</label></h4>
      <button class="btnBooking btn-primary">Book Tickets</button>
    </div>
  </div><br>
  <div class="container-fluid mt-5 pt-5">
    <div class="row">
      <div class="col-md-8">
        <div class="movie-info">
          <h4 class="h4" id="FilmSummary">Summary</h4><br>
          <p id="Discription">
            text from DB
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            At accusamus quidem nulla nostrum consequatur voluptatibus error,
            eaque consectetur vero aut repudiandae. Maxime cupiditate exercitationem
            animi tempora omnis possimus impedit! Dignissimos.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="movie-info ">
          <h4>Genres</h4>
          <p>Genres from DB</p>
          <p>
            <span class="badge badge-warning" id="Comady">Comady</span>
            <span class="badge badge-warning" id="Family">Family</span>
            <span class="badge badge-warning" id="Drama">Drama</span>
          </p>
          <h4>Language </h4>
          <p id="Language">Language from DB</p>
        </div>
      </div>
    </div>
  </div>
</body>

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
        </p>

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