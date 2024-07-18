<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../BackEnd/DBConnection.php";
require_once "../vendor/autoload.php";
class Mail
{
    private $db;
    public function __construct()
    {

        $this->db = new DBConnection();
        $this->db->connect();
    }
    public function sendMail($email)
    {

        $token = bin2hex(random_bytes(16));
        $tokenHash = hash("sha256", $token);

        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
        $sql = "UPDATE user SET reset_token_hash = '$tokenHash', 
            reset_token_expires_at
             = '$expiry' WHERE Email = '$email'";

        $result = mysqli_query($this->db->getConnection(), $sql);

        if (mysqli_affected_rows($this->db->getConnection()) === 0) {
            echo "<script>alert('The email address not found. Please check and try again.')</script>";
            return;
        }
        if (!$result) {
            die("Error executing query: " . mysqli_error($this->db->getConnection()));
        } else {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->Username   = 'movielk72@gmail.com';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Password = "kilc ngmu nhlv rwbu ";
            $mail->Port       = 587;

            $mail->isHtml(true);

            $mail->setFrom("noreply@example.com");
            $mail->addAddress($email);
            $mail->Subject = "Password Reset";
            $mail->Body    = <<<END
                                Click <a href="http://localhost/film-Ticket-Booking-Web/frontEnd/resetPassword.php?token=$token">Here</a>
                                to reset password
                                END;
            try {
                $mail->send();
                echo "<script>alert('Message sent. Please check your inbox')</script>";
            } catch (Exception $e) {
                echo "message could not be sent. Mailer error: {$mail->ErrorInfo}";
            }
            $this->db->disconnect();
        }
    }
}
