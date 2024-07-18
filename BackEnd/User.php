<?php

require_once "../BackEnd/Viewer.php";
require_once "../BackEnd/Admin.php";

class User
{
    private $db;
    public function __construct()
    {

        $this->db = new DBConnection();
        $this->db->connect();
    }

    public function logIn($userName, $password)
    {

        try {

            $queary = "SELECT User_Id FROM user WHERE UserName='$userName' AND Password='$password'";
            $result = mysqli_query($this->db->getConnection(), $queary);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $userId = $row['User_Id'];
                echo "<script>console.log('Login successful');</script>";
                $userType = substr($userId, 0, 1);
                session_start();
                $_SESSION['userName'] = $userName;
                $_SESSION['userId'] = $userId;
                $_SESSION['userType'] = $userType;
                $this->db->disconnect();
                if ($userType == "V") {
                    echo "<script type='text/javascript'>window.location.href = '../FrontEnd/index.php';</script>";

                    exit();
                } else if ($userType == 'A') {

                    echo "<script type='text/javascript'>window.location.href = '../FrontEnd/adminPanel.php';</script>";
                }

                return true;
            } else {

                echo "<script> alert('Invalid username or password'); </script>";
                return false;
            }
            
        } catch (Exception $e) {

            echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
            return false;
        } 
    }
    function resetPassword($password, $token)
    {
        echo $token . "<br>";
        $tokenHash = hash("sha256", $token);
        echo $tokenHash;
        $sql = "SELECT * from user WHERE reset_token_hash = '$tokenHash'";
        $res = mysqli_query($this->db->getConnection(), $sql);
        $row = mysqli_num_rows($res);
        if ($row == 0) {
            echo "Token not found";
        } else {
            $queary = "UPDATE user SET Password='$password',reset_token_hash = NULL,reset_token_expire_at = NULL WHERE reset_token_hash = '$tokenHash'";
            $result = mysqli_query($this->db->getConnection(), $queary);
            $this->db->disconnect();
            if ($result === true) {
                echo "<script>alert('Password updated Successfully');
                        window.location.href = '../FrontEnd/signIn.php';       
                </script>";
            }
        }
    }
}
