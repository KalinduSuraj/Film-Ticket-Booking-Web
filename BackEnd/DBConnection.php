<?php
class DBConnection
{
    //*------------------------------------------------|DONE|----------------------------------------------
    private $connection;

    public function connect()
    {
        //Chanuka's db
        $this->connection = mysqli_connect("localhost", "chanuka", "Chanuka@20021004", "movie_ticet_booking");

        //Kalindu's db
        //$this->connection = mysqli_connect("localhost", "suraj", "20030115", "movielkdb");

        //freesqldatabase.com
        //$this->connection = mysqli_connect("sql12.freesqldatabase.com", "sql12718492", "DwnP2Mt8rg", "sql12718492");

        //awardspace.com
        // $this->connection = mysqli_connect("fdb1032.awardspace.net", "4494174_movie", "Chanuka@20021004", "4494174_movie");
        if (!$this->connection) {
            echo "Connection failed: " . mysqli_connect_error();
        }
    }
    public function disconnect()
    {
        if ($this->connection) {
            mysqli_close($this->connection);
            $this->connection = null; // Unset the connection object
        }
    }

    // Method to get the connection object
    public function getConnection()
    {
        return $this->connection;
    }
}
