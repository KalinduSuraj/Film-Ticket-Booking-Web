<?php

require_once "../BackEnd/DBConnection.php";
require_once "../BackEnd/User.php";
class Viewer extends User
{
    //*--------------------------------------------------------|DONE|-------------------------------------------------------------

    private $db;
    public function __construct()
    {

        $this->db = new DBConnection();
        $this->db->connect();
    }
    public function registration($userName, $name, $email, $password, $contactNo)
    {
        try {
            $q1 = "SELECT MAX(User_Id) from user";
            $r = mysqli_query($this->db->getConnection(), $q1);
            if ($row = mysqli_fetch_array($r)) {
                $maxId = $row[0];
                $numericPart = intval(substr($maxId, 1));
                $newNumericPart = $numericPart + 1;

                $userId = 'V' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
            } else {
                $userId = 'V001';
            }
            $q2 = "select UserName from user where UserName='$userName'";

            $res = mysqli_query($this->db->getConnection(), $q2);
            if (!(mysqli_num_rows($res) == 1)) {
                //inner join
                $queary2 = "insert into viewer(User_Id,Name,contact_No)
                values('$userId','$name','$contactNo');";
                $queary1 = "insert into user(Email,Password,UserName,User_Id)
                values('$email','$password','$userName','$userId');";

                $result1 = mysqli_query($this->db->getConnection(), $queary1);
                $result2 = mysqli_query($this->db->getConnection(), $queary2);
                $this->db->disconnect();
                if ($result1 && $result2) {
                    echo "<script> console.log('Added'); </script>";
                    echo "<script>alert('User Registered Successfully');</script>";
                    echo "<script>window.location.href = 'signIn.php';</script>";

                    User::logIn($userName, $password);
                    echo "<script>window.href='signIn.php';</script>";
                } else {
                    echo "<script> alert('not Added'); </>";
                }
                return true;
            } else {
                echo "<script> alert('there is the Viewer in this $userName'); </script>";
                return false;
            }
        } catch (exception $e) {
            echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
            return false;
        }
    }
}
