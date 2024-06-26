<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link Style.css
    <link rel="stylesheet" href="style.css">
    -->
    <!--Boostrap CDN-->
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" > </script>

    <style>
      body {
        margin: 0;
        padding: 0;
        background: linear-gradient(100deg, #000915, #003465);
      }
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
        .nameImg {
          width: 30px;
          height: 30px;
          margin-top: 10px;
        }
        .emailImg {
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
        .email {
          display: flex;
          flex-direction: row;
        }
        .name {
          display: flex;
          flex-direction: row;
        }
        .form-control {
          margin-left: 10px;
        }
        .btn-signUp{
          background-color: #06d001 !important;
          border-color: #06d001;
        }
        .create {
          text-decoration: none;
          color:aquamarine;
        }
    </style>
    <title>Sign Up</title>
</head>
<body class="body">
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
    <div class="col-md-8 col-lg-7 col-xl-6">
        <img id="genarateImg"
          class="img-fluid " src="src/img1.png" alt="Register img">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form>
          <h1 class="text-center">Sign Up</h1>
          <!-- email input -->
          <div data-mdb-input-init class="form-outline mb-4 email">
            <img src="src/Email.png" alt="user" class="emailImg">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"/>
          </div>
          
          <!-- name input -->
          <div data-mdb-input-init class="form-outline mb-4 name">
            <img src="src/Id-card.png" alt="user" class="nameImg">
            <input type="text" name="name" class="form-control form-control-lg" placeholder="Name"/>
          </div>

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
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label"> Remember me </label>
            </div>
            <div>
                <div class="col ">
                    <div class="row"> 
                      <label>Have Account?<a href="signIn.php" class="create"> Sign In</a></label> 
                    </div>
                </div>
            </div>
          </div>
          <!-- Submit button -->
          <button type="submit"  class="btn btn-primary btn-lg btn-block btn-signUp">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>