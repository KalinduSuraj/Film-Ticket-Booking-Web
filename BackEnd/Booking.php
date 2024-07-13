<?php
class Booking
{

    private $db;
    public function __construct()
    {

        $this->db = new DBConnection();
        $this->db->connect();
    }
    public function SetBooking($date, $time, $filmId, $seatNo, $scheduleId, $viewerId)
    {

        try {
            $queary = "SELECT * FROM schedule where film_Id='$filmId' and Date='$date' and Time='$time'";
            $res = mysqli_query($this->db->getConnection(), $queary);
            if ($row1 = mysqli_fetch_array($res)) {

                $q1 = "SELECT MAX(booking_id) from booking";
                $r = mysqli_query($this->db->getConnection(), $q1);
                if ($row = mysqli_fetch_array($r)) {
                    $maxId = $row[0];
                    $numericPart = intval(substr($maxId, 1));
                    $newNumericPart = $numericPart + 1;

                    $bookingId = 'B' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                } else {
                    $bookingId = 'B001';
                }

                $sql = "INSERT into booking(booking_id,Date,schedule_id,Seat_No,Time,viewer_id) 
                        values('$bookingId','$$date','$scheduleId','$seatNo','$time','$viewerId')";
                $result = mysqli_query($this->db->getConnection(), $sql);
                if ($row2 = mysqli_fetch_array($result)) {
                    echo "<script>alert('Booking Added!!');</script>";
                }
                $this->db->disconnect();
            }
        } catch (Exception $e) {
            echo "Error!: " . $e;
        }
    }
    public function viewBooking($filmId,$date,$time){
        try{
            $sql = "SELECT Seat_No FROM booking INNER JOIN schedule ON booking.schedule_id = schedule.schedule_id 
                    where booking.Time ='$time' and booking.Date='$date' and schedule.F_Id='$filmId'; ";
            $result = mysqli_query($this->db->getConnection(),$sql);
            $row = mysqli_fetch_array($result);
    
            return $row;
        }
        catch(Exception $e){
            echo "Error: ".$e;
            return null;
        }
    }
}
