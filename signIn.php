<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link Style.css
    <link rel="stylesheet" href="style.css">
    -->
    <!--Boostrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" > </script>

    <style>
      button {
        border-radius: 30px;
      }
      h1 {
        font-family: "palatino linotype", palatino, serif;
        color: azure;
      }
      label{
        color: azure;
      }
      body {
        margin: 0;
        padding: 0;
        background: linear-gradient(100deg, #000915, #003465);
      }
      .userImg {
          width: 30px;
          height: 30px;
          margin-top: 10px;
        }
      .pwImg {
          width: 30px;
          height: 30px;
          margin-top: 10px;
        }
        .userName {
          display: flex;
          flex-direction: row;
        }
        .password {
          display: flex;
          flex-direction: row;
        }
        .forget-pass {
          text-decoration: none;
          color: #5b548a;
        }
        .form-control {
          margin-left: 10px;
        }
        .forget-pass:hover {
          color: #1e7dea;
        }
        .create {
          text-decoration: none;
          color: #5b548a;
        }
        .create:hover {
          color: #1e7dea;
        }
        .btn-signIn{
          background-color: #06d001 !important;
          border-color: #06d001;
        }
    </style>
    <title>Sign In</title>
</head>
<body class="body">
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img id="genarateImg"
          class="img-fluid " src="src/img1.png" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form>
          <h1 class="text-center">Sign In</h1>
          <!-- userName input -->
          <div data-mdb-input-init class="form-outline mb-4 userName">
            <img src="src/User.png" alt="user" class="userImg">
            <input type="text" name="userName" class="form-control form-control-lg" placeholder="UserName"/>
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4 password">
          <img src="src/Padlock.png" alt="pw" class="pwImg">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div>
              <input class="form-check-input" type="checkbox" value="" name="rememberMe" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <div class="forget-create">
                <div class="col " id="other">
                    <div class="row"><a href="#!" class="forget-pass">Forgot password?</a></div>
                    <div class="row"> <label>No Account?<a href="signUp.php" class="create"> Create</a></label> </div>
                </div>
            </div>
          </div>
          <!-- Submit button -->
          <button type="submit"class="btn btn-primary btn-lg btn-block btn-signIn" name="btnSignIn">Sign in</button>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>

<?php
  if(isset($_POST["btnSignIn"])){

        if(empty($_POST["userName"]) || empty($_POST["password"]))
        {
          echo"<script>alert('Please Enter Data into Feilds');</script>";
        }
        else{
          $userName = $_POST["userName"];
          $password = $_POST["password"];
          
          //! connection start=>
          $conn = mysqli_connect("localhost","chanuka","Chanuka@20021004");

          //! connection data bas=>
          mysqli_select_db($conn,"");

          //! perform queary=>
          $query = "Select * From <table> where userName ='$userName' AND password = '$password'";
          $result = mysqli_query($conn, $query);

          if(mysqli_fetch_array($result)>0){//

            if(isset($_POST["rememberMe"])){ //* set cookies-------------------------------------------------
              //one mounth cookie
              $expire = 30*24*3600;
              setcookie("UserName","$userName",time()+$expire,"/","",0);
              setcookie("Password","$password",time()+$expire,"/","",0);

              //* start session-------------------------------------------------
              session_start();
              $_SESSION["UserName"] = $userName;
            }
          }
          else{
            echo "UserName or Password wrong!";
          }         
        }
  }
?>