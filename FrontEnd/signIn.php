<?php
session_start();
?>
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
  <script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>

  <style>
    button {
      border-radius: 30px;
    }

    h1 {
      font-family: "palatino linotype", palatino, serif;
      color: azure;
    }

    label {
      color: azure;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(100deg, #000915, #003465);
    }

    .input-imgs {
      width: 30px;
      height: 30px;
      margin-top: 10px;
    }

    .userName {
      display: flex;
      flex-direction: row;
    }

    .type {
      display: flex;
      flex-direction: row;
    }

    .password {
      display: flex;
      flex-direction: row;
    }

    .forget-pass {
      text-decoration: none;
      color: aquamarine;
    }

    .form-control {
      margin-left: 10px;
    }

    .forget-pass:hover {
      color: #1e7dea;
    }

    .create {
      text-decoration: none;
      color: aquamarine;
    }

    .create:hover {
      color: #1e7dea;
    }

    .btn-signIn {
      background-color: #06d001 !important;
      border-color: #06d001;
    }

    .bg {
      background-color: #fdfeff47;
      -webkit-backdrop-filter: blur(5px);
      backdrop-filter: blur(5px);
      height: 100%;
      width: 100%;
      border-radius: 20px;
    }
  </style>
  <title>Sign In</title>
</head>

<body class="body">
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img id="genarateImg" class="img-fluid " src="src/img1.png" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <div class="bg">
            <form method="POST" action="#">
              <h1 class="text-center">Sign In</h1>
              <!-- userName input -->
              <div data-mdb-input-init class="form-outline  userName m-4">
                <img src="src/User.png" alt="user" class="input-imgs">
                <input type="text" name="userName" class="form-control form-control-lg" id="username" placeholder="UserName" />
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4 password mx-4">
                <img src="src/Padlock.png" alt="pw" class="input-imgs">
                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" />
              </div>

              <div class="d-flex justify-content-around align-items-center mb-4 mx-4">
                <!-- Checkbox -->
                <div>
                  <input class="form-check-input" type="checkbox" value="" name="rememberMe" checked />
                  <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
                <!--|combo box|-->


                <div class="forget-create mx-4">
                  <div class="col " id="other">
                    <div class="row"><a href="../FrontEnd/forgotPassword.php" class="forget-pass">Forgot password?</a></div>
                    <div class="row"> <label>No Account?<a href="signUp.php" class="create"> Create</a></label> </div>
                  </div>
                </div>
              </div>
              <!-- Submit button -->
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-signIn m-4" name="btnSignIn">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>

<?php
require_once '../BackEnd/User.php';
require_once '../BackEnd/DBConnection.php';
if (isset($_POST["userName"])) {

  if (empty($_POST["userName"]) || empty($_POST["password"])) {
    echo "<script>alert('Please Enter Data into Feilds');</script>";
  } else {
    //*------ grab the data from form
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $rememberMe = $_POST["rememberMe"];
    $user = new User();
    $user->logIn($userName, $password);
  }
}

?>