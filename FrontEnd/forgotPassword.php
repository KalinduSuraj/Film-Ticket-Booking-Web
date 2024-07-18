<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link Style.css-->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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



        .btn-signIn {
            background-color: #06d001 !important;
            border-color: #06d001;
            width: 100px;
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
    <title>Forgot Password</title>
</head>

<body class="body">
    <div class=" d-flex justify-content-center p-5">
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div class="bg p-3">
                <form method="POST" action="#">
                    <h1 class="text-center">Forgot Password</h1>
                    <!-- Email -->
                    <div data-mdb-input-init class="form-outline  userName m-4">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Your Email">
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-signIn m-4 text-dark" name="submitBtn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php

require_once "../BackEnd/Mail.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    session_start();
    $_SESSION['email'] = $email;
    $mail = new Mail();
    $mail->sendMail($email);
}

?>