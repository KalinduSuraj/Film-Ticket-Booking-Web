

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="body">

    <div>
        <h1>Reset Password</h1>
        <form action="#" method="post">
            <span>Password</span>
            <input type="password" name="password"><br>
            <span>Confirm Password</span>
            <input type="password" name="confirmPassword"><br>
            <input type="submit" name="submitBtn" value="submit">
        </form>
    </div>

    <!-- validation passwords are corect -->
</body>
</html>
<?php
    require_once "../BackEnd/DBConnection.php";
    require_once "../BackEnd/User.php";

    if(isset($_POST["password"]) && isset($_POST["confirmPassword"])){
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $token = $_GET["token"];

        $obj = new User();
        $obj->resetPassword($password,$token);
    }

?>