<?php

    class Viewer{

        protected $db;
        public function __construct(){
            $this->db = new DBConnection();
            $this->db->connect(); 
        }
    
        public function logIn($userName,$password){
            try{
                $queary = "select * from viwer where UserName='$userName' and Password='$password'";

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
        public function registration($userName,$password,$name,$viwerId,$email,$contactNo){
            try{

                $q = "select UserName from viwer where UserName='$userName'";

                $res = mysqli_query($this->db->getConnection(),$q);

                if (!(mysqli_num_rows($res) == 1)) {

                    $queary = "insert into viwer(Viwer_id,UserName,Name,email,Password,Contact_No)
                            values('$viwerId','$userName','$name','$email','$password','$contactNo');";

                    $result = mysqli_query($this->db->getConnection(),$queary);

                    if($result){
                        echo "<script> console.log('Added'); </script>"; 
                    }
                    else{
                        echo "<script> console.log('not Added'); </script>"; 
                    }
                    return true;
                } 
                else {
                    echo "<script> console.log('not Added'); </script>"; 
                    return false;
                } 
                
            }
            catch(exception $e){
                echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
                return false;
            } 
            finally{
                $this->db->disconnect();
            }
        }


    }
?>