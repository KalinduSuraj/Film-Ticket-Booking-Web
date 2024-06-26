<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Details</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      .movie-banner {
        background: url("src/banner1jpg.jpg") no-repeat center center;
        background-size: cover;
        height: 400px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
      }
      .movie-poster {
        width: 10px;
      }
      .movie-details {
        margin-top: -100px;
      }
      .movie-details img {
        margin-top: 400px;
        width: 40%;
      }
      .movie-info {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 13px;
        margin-top: 60px;
      }
      .btn{      
        position: absolute;
        right: 0;
        margin: 20px;
      }
      .name-date{
        position: absolute;
        left: 0;
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
      <div class="movie-banner">
        <div class="movie-details">
          <img
            src="src/movie3.jpg"
            alt="Movie Poster"
            class="movie-poster rounded"
          />
        </div>
      </div>
      <button class="btn btn-primary">BOOK TICKETS</button>
      <div class="name-date container">
          <h4>Movie Name From DB</h4>
          <label>Date From DB</label>         
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-8">
          <div class="movie-info">
            <h4>Summary</h4>
            <p>
              text from DB
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
              At accusamus quidem nulla nostrum consequatur voluptatibus error,
              eaque consectetur vero aut repudiandae. Maxime cupiditate exercitationem 
              animi tempora omnis possimus impedit! Dignissimos.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="movie-info">
            <h4>Genres</h4>
            <p>Genres from DB</p>
            <p>
                <span class="badge badge-warning">Comady</span>
                <span class="badge badge-warning">Family</span>
                <span class="badge badge-warning">Drama</span>
            </p>
            <h4>Language </h4>
            <p>Language from  DB</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
