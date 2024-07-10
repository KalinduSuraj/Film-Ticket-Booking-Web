<?php
class DBConnection
{
    //*------------------------------------------------|DONE|----------------------------------------------
    private $connection;

    public function connect()
    {
        //$this->connection = mysqli_connect("localhost", "chanuka", "Chanuka@20021004", "movie_ticket_booking");
        $this->connection = mysqli_connect("localhost", "suraj", "20030115", "movielkdb");
        //freesqldatabase.com
        //$this->connection = mysqli_connect("sql12.freesqldatabase.com", "sql12718492", "DwnP2Mt8rg", "sql12718492");
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
