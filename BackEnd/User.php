<?php
    require_once "../BackEnd/Viewer.php";
    require_once "../BackEnd/Admin.php";
    require_once "../BackEnd/DBConnection.php";
    class User{
        private $db;
        public function __construct(){

        $this->db = new DBConnection();
        $this->db->connect(); 
        }

        public function logIn($userName,$password){

            try{

                $queary = "SELECT User_Id FROM User WHERE UserName='$userName' AND Password='$password'";
                $result = mysqli_query($this->db->getConnection(), $queary);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $userId = $row['User_Id'];
                    echo "<script>console.log('Login successful');</script>";
                    $userType = substr($userId, 0, 1);

                    if ($userType == "V") {
                        echo "<script>console.log('Viewer');</script>";
                        //header('Location: ../FrontEnd/index.php');
                        echo "<script type='text/javascript'>window.location.href = '../FrontEnd/index.php';</script>";
                        session_start();

                        //change the nav bar user
                        exit();
                    } else if ($userType == 'A') {
                        echo "<script>console.log('Admin');</script>";
                        session_start();
                    }

                    return true;
                } 
                else {

                    echo "<script> console.log('Invalid username or password'); </script>";
                    return false;

                } 

            } 
            catch (Exception $e) {
                
                echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
                return false;

            } 
            finally{

                $this->db->disconnect();
                
            }
        }
        
        // public function resetPassword($email){
        //     $token = bin2hex(random_bytes(16));
        //     $tokenHash = hash("sha256",$token);

        //     $expiry = date("Y-m-d H:i:s",time()+ 60+30);
        //     $sql = "Update user Set reset_token_hash ='$tokenHash' ,
        //             reset_token_expire_at ='$expiry' where Email = '$email'";
              
        //     $result = mysqli_query($this->db->getConnection(), $sql);  
        //     echo "<script type='text/javascript'>window.location.href = '../FrontEnd/forgotPassword/send-password-reset.php';</script>";
        // }
        
    }

