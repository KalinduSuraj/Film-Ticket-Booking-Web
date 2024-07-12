<?php
session_start();
if (!(isset($_SESSION['userId']) && $_SESSION['userType'] == 'A')) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style type="text/css">
        body {
            background-color: #34315E;
            color: white;
        }
    </style>
</head>

<body class="body">
    <div class=" d-flex justify-content-center p-5">
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div class="bg p-3">
                <form method="POST" action="#" enctype="multipart/form-data" id="schedule-form">
                    <h1 class="text-center mb-3">Add Movie Schedule</h1>
                    <table width="100%">
                        <!-- Select Film ID -->
                        <tr>
                            <td class="align-top p-2">Select Film ID</td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <select class="form-select form-select-sm align-top mt-2" id="filmId" name="selectFilmID">
                                        <option value="0">--Select Film ID--</option>

                                        <?php 
                                            require_once "../BackEnd/Movie.php";
                                            require_once "../BackEnd/DBConnection.php";
                                            $obj = new Movie();
                                            echo $obj->VIewForAddSchedule();
                                        ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top p-2">Select Date</td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <input type="Date" id="date" name="date" class="form-control form-control-sm align-top mt-2">
                                </div>
                            </td>
                        </tr>
                        <!-- Select Time  -->
                        <tr>
                            <td class="align-top p-2">Select Time</td>
                            <td>
                                <div data-mdb-input-init class="form-outline">
                                    <select class="form-select form-select-sm align-top mt-2" id="time" name="selectTimeSlot">
                                        <option value="0">--Select Time Slot--</option>
                                        <option value="9.00A.M">9.00 A.M</option>
                                        <option value="12.00P.M">12.00 P.M</option>
                                        <option value="3.00P.M">3.00 P.M</option>
                                        <option value="6.00P.M">6.00 P.></option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <!-- Submit btn -->
                        <tr>
                            <td></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end">
                                    <div data-mdb-input-init class="form-outline ">
                                        <button type="reset" class="btn btn-outline-danger reset align-top mt-2" id="btnResetFile">
                                            Clear
                                        </button>
                                    </div>
                                    <div data-mdb-input-init class="form-outline ">
                                        <input class="btn btn-success align-end mt-2" type="submit" name="btnSubmit" value="Add">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('schedule-form').addEventListener('submit', function(event) {
        let filmId = document.getElementById('filmId').value;
        let time = document.getElementById('time').value;
        let date = document.getElementById('date').value;
        let errorMessages = [];

        if (filmId === "0") {
            errorMessages.push('Please Select Film Id.');
        }
        if (time === "0") {
            errorMessages.push('Please enter Time Slot.');
        }
        if (date === "") {
            errorMessages.push('Please Select Date.');
        }

        if (errorMessages.length > 0) {
            event.preventDefault();
            alert(errorMessages.join('\n'));
        }
    });
</script>

</html>

<?php
require_once "../BackEnd/FilmSchedule.php";
$adminId = $_SESSION['userId'];
if (isset($_POST['btnSubmit'])) {
    if (isset($_POST['date']) && isset($_POST['selectTimeSlot']) && isset($_POST['selectFilmID'])) {
        $time = $_POST['selectTimeSlot'];
        $date = $_POST['date'];
        $filmId = $_POST['selectFilmID'];
        $schedule = new FilmSchedule();
        $schedule->addSchedule($time, $date, $filmId, $adminId);
    }
}

?>