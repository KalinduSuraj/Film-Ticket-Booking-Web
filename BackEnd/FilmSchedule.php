

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
            $queary = "INSERT into schedule(schedule_id,Time,film_id,admin_id,Date)
                            values('$scheduleId','$time','$filmId','$adminId','$date')";
            $result = mysqli_query($this->db->getConnection(), $queary);
            if ($result) {
                echo "<script>alert('Schedule Added Successfully!');</script>";
            } else {
                echo "<script>alert('cannot added schedule!');</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('error! " . $e . "');</script>";
        } finally {
            $this->db->disconnect();
        }
    }

    //remove schedule
    // function removeSchedule($scheduleId)
    // {
    //     try {
    //         $q = "select schedule_id from schedule where schedule_id = '$scheduleId';";
    //         $res = mysqli_query($this->db->getConnection(), $q);

    //         if (mysqli_num_rows($res) == 1) {

    //             $queary = "delete from schedule where schedule_id='$scheduleId';";

    //             $result = mysqli_query($this->db->getConnection(), $queary);

    //             if ($result) {
    //                 echo "<script> alert('Deleted Schedule '); </script>";
    //             } else {
    //                 echo "<script> alert('not Deleted Schedule'); </script>";
    //             }
    //             return true;
    //         } else {
    //             echo "<script> alert('There is no Film in that $scheduleId'); </script>";
    //             return false;
    //         }
    //     } catch (exception $e) {
    //         echo "<script> console.log('Error: " . $e->getMessage() . "'); </script>";
    //         return false;
    //     } finally {
    //         $this->db->disconnect();
    //     }
    // }
}
?>