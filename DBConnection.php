<?php
    class DBConnection{

        public function Connection(){

            //select server
            $con=mysqli_connect("fdb1029.awardspace.net","4496320_movieticket","EB[scka]@45634");
            //select DB
            mysqli_select_db($con,"4496320_movieticket");
        }
    }
?>