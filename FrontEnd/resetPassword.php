<?php
session_start();
if (!$_SESSION['email']) {
    header("Location: forgotPassword.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <title>Reset Password</title>
</head>

<body class="body">
    <div class=" d-flex justify-content-center p-5">
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div class="bg p-3">
                <form method="POST" action="#" id="resetPasswordForm">
                    <h1 class="text-center">Reset Password</h1>
                    <!-- New Password -->
                    <div data-mdb-input-init class="form-outline  userName m-4">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="New Password" id="password">
                    </div>

                    <!-- Confirm Password -->
                    <div data-mdb-input-init class="form-outline mb-10 password mx-4">
                        <input type="password" name="confirmPassword" class="form-control form-control-lg" placeholder="Confirm Password" id="confirmPassword" />
                    </div>
                    <div id="error-message" class="error text-center text-danger"></div>
                    <!-- Submit button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-signIn m-4 text-dark " name="submitBtn">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('confirmPassword').value;
            let errorMessage = document.getElementById('error-message');

            if (password !== confirmPassword) {
                event.preventDefault();
                errorMessage.textContent = 'Passwords do not match. Please try again.';
            } else {
                errorMessage.textContent = '';
            }
        });
    </script>

</body>

</html>
<?php

require_once "../BackEnd/DBConnection.php";
require_once "../BackEnd/User.php";

if (isset($_POST["password"]) && isset($_POST["confirmPassword"])) {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $token = $_GET["token"];

    if ($password === $confirmPassword) {
        $obj = new User();
        $obj->resetPassword($password, $token);
    } else {
        echo "Passwords do not match.";
    }
}
?>