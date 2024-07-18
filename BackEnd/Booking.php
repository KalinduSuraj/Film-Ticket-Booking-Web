<?php
class Booking
{

    private $db;
    public function __construct()
    {

        $this->db = new DBConnection();
        $this->db->connect();
    }
    public function SetBooking($date, $time, $filmId, $seatNos, $viewerId)
    {
        $date = (string)$date;
        $time = (string)$time;
        $filmId = (string)$filmId;
        $viewerId = (string)$viewerId;
        try {
            foreach ($seatNos as $seatNo) {
                $queary = "SELECT schedule_id FROM schedule where film_Id='$filmId' and Date='$date' and Time='$time'";
                $res = mysqli_query($this->db->getConnection(), $queary);
                if ($row1 = mysqli_fetch_array($res)) {
                    $scheduleId = $row1["schedule_id"];
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


                    $sql = "INSERT into booking(booking_id,schedule_id,viwer_id,Date,Seat_No,Time) 
                        values('$bookingId','$scheduleId','$viewerId','$date','$seatNo','$time')";
                    $result = mysqli_query($this->db->getConnection(), $sql);
                    // mysqli_fetch_array($result);
                    echo "<script>alert('Booking Added!!');</script>";
                    $this->callPayment($filmId, $date, $time, $seatNo);
                    $this->db->disconnect();
                } else {
                    echo "<script>alert('if fail!!');</script>";
                }
            }
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function viewBooking($filmId, $date, $time)
    {
        try {
            $sql = "SELECT Seat_No FROM booking INNER JOIN schedule ON booking.schedule_id = schedule.schedule_id 
                    where booking.Time ='$time' and booking.Date='$date' and schedule.film_id='$filmId'; ";
            $result = mysqli_query($this->db->getConnection(), $sql);
            $row = mysqli_fetch_array($result);
            return $row;
        } catch (Exception $e) {
            echo "Error: " . $e;
            return null;
        }
    }

    private function callPayment($filmId, $date, $time, $seatNo)
    {
        try {
            $sql = "Select * from film where F_Id = '$filmId'";
            $result = mysqli_query($this->db->getConnection(), $sql);
            $row = mysqli_fetch_array($result);
            $redirectUrl = '../FrontEnd/payment.php?filmName=' . $row['Name'] . '&date=' . $date . '&time=' . $time . '&seatNo=' . $seatNo . '&price=' . $row['Ticket_Price'];

            echo "<script>window.location.href='$redirectUrl';</script>";
        } catch (Exception $e) {
            echo "Error: " . $e;
            return null;
        }
    }
}
