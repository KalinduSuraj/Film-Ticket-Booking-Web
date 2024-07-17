

<?php
class FilmSchedule
{

    private $db;

    function __construct()
    {

        $this->db = new DBConnection();
        $this->db->connect();
    }

    //add schedule

    function addSchedule($time, $date, $filmId, $adminId)
    {
        try {
            $q1 = "SELECT MAX(schedule_id) from schedule";
            $r = mysqli_query($this->db->getConnection(), $q1);
            if ($row = mysqli_fetch_array($r)) {
                $maxId = $row[0];
                $numericPart = intval(substr($maxId, 1));
                $newNumericPart = $numericPart + 1;

                $scheduleId = 'S' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
            } else {
                $filmId = 'S001';
            }
            $queary = "INSERT into schedule(schedule_id,film_id,admin_id,Date,Time)
                            values('$scheduleId','$filmId','$adminId','$date','$time')";
            $result = mysqli_query($this->db->getConnection(), $queary);
            $this->db->disconnect();
            if ($result) {
                echo "<script>alert('Schedule Added Successfully!');</script>";
            } else {
                echo "<script>alert('cannot added schedule!');</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('error! " . $e . "');</script>";
        }
    }
}
?>