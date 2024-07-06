<?php
class DBConnection {
    private $connection;

    public function connect(){
        $this->connection = mysqli_connect("localhost", "chanuka", "Chanuka@20021004", "movie_ticket_booking");
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }
    public function disconnect(){
        if ($this->connection) {
            mysqli_close($this->connection);
            $this->connection = null; // Unset the connection object
        }
    }

    // Method to get the connection object
    public function getConnection(){
        return $this->connection;
    }
}
?>
