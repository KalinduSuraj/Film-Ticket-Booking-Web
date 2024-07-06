<?php

    class Admin{
        private $db;
        //methods
        public function logIn($userName,$password){

            try{

                $queary = "select * from admin where UserName='$userName' and Password='$password'";
                $result = mysqli_query($this->db->getConnection(),$queary);

                if (mysqli_num_rows($result) == 1) {

                    echo "<script> console.log('Login successful'); </script>";
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

        

    }
?>