<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link Style.css-->
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="body">

    <div>
        <h1>Forgot Password</h1>
        <form action="#" method="post">
            <span>Email</span>
            <input type="email" name="email"><br>
            <input type="submit" name="submitBtn" value="submit">
        </form>
    </div>
</body>

</html>
<?php
require_once "../BackEnd/Mail.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $mail = new Mail();
    $mail->sendMail($email);
}
?>