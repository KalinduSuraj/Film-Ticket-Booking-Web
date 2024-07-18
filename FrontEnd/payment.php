<?php
session_start();
if (!$_SESSION['userId']) {
    header("Location: signIn.php");
} else {
    $filmName = $_GET['filmName'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $seatNo = $_GET['seatNo'];
    $price = $_GET['price'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Payment</title>
    <style>
        /* ticket css */
        body {
            background-color: Thistle;
            font-family: "Yanone Kaffeesatz", sans-serif;
            font-weight: 600;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .ticket {
            width: 400px;
            height: 775px;
            background-color: white;
            margin: 25px auto;
            position: relative;
        }

        .holes-top {
            height: 50px;
            width: 50px;
            background-color: Thistle;
            border-radius: 50%;
            position: absolute;
            left: 50%;
            margin-left: -25px;
            top: -25px;
        }

        .holes-top:before,
        .holes-top:after {
            content: "";
            height: 50px;
            width: 50px;
            background-color: Thistle;
            position: absolute;
            border-radius: 50%;
        }

        .holes-top:before {
            left: -200px;
        }

        .holes-top:after {
            left: 200px;
        }

        .holes-lower {
            position: relative;
            margin: 25px;
            border: 1px dashed #aaa;
        }

        .holes-lower:before,
        .holes-lower:after {
            content: "";
            height: 50px;
            width: 50px;
            background-color: Thistle;
            position: absolute;
            border-radius: 50%;
        }

        .holes-lower:before {
            top: -25px;
            left: -50px;
        }

        .holes-lower:after {
            top: -25px;
            left: 350px;
        }

        .title {
            padding: 50px 25px 10px;
        }

        .cinema {
            color: #aaa;
            font-size: 22px;
        }

        .movie-title {
            font-size: 50px;
        }

        .info {
            padding: 15px 25px;
        }

        table {
            width: 100%;

            font-size: 13px;

            margin-bottom: 15px;
        }

        table tr {
            margin-bottom: 10px;
        }

        table th {
            text-align: left;
        }

        table th:nth-of-type(1) {
            width: 38%;
        }

        table th:nth-of-type(2) {
            width: 40%;
        }

        table th:nth-of-type(3) {
            width: 15%;
        }

        table td {
            width: 33%;
            font-size: 32px;
        }

        .bigger {
            font-size: 48px;
        }

        .serial {
            padding: 25px;
        }

        .serial table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        .serial td {
            width: 3px;
            height: 50px;
        }

        .numbers td {
            font-size: 16px;
            text-align: center;
        }

        /*  */
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: uppercase;
        }

        .list-item {
            margin-top: 10px;
        }

        .tot {
            margin-top: 300px;
        }

        /*card */
        .con {
            min-height: 100vh;
            background: Thistle;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column;
            padding-bottom: 60px;
        }

        .con form {
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, .1);
            padding: 20px;
            width: 600px;
            padding-top: 160px;
        }

        .con form .inputBox {
            margin-top: 20px;
        }

        .con form .inputBox span {
            display: block;
            color: #999;
            padding-bottom: 5px;
        }

        .con form .inputBox input,
        .con form .inputBox select {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, .3);
            color: #444;
        }

        .con form .flexbox {
            display: flex;
            gap: 15px;
        }

        .con form .flexbox .inputBox {
            flex: 1 1 150px;
        }

        .con form .submit-btn {
            width: 100%;
            background: linear-gradient(45deg, #000915, #003465);
            margin-top: 20px;
            padding: 10px;
            font-size: 20px;
            color: #fff;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s linear;
        }

        .con form .submit-btn:hover {
            letter-spacing: 2px;
            opacity: .8;
        }

        .con .card-container {
            margin-bottom: -150px;
            position: relative;
            height: 250px;
            width: 400px;
        }

        .con .card-container .front {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(45deg, #000915, #003465);
            border-radius: 15px;
            backface-visibility: hidden;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .2);
            padding: 20px;
            transform: perspective(1000px) rotateY(0deg);
            transition: transform .4s ease-out;
        }

        .con .card-container .front .image {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 10px;
        }

        .con .card-container .front .image img {
            height: 50px;
        }

        .con .card-container .front .card-number-box {
            padding: 30px 0;
            font-size: 22px;
            color: #fff;
        }

        .con .card-container .front .flexbox {
            display: flex;
        }

        .con .card-container .front .flexbox .box:nth-child(1) {
            margin-right: auto;
        }

        .con .card-container .front .flexbox .box {
            font-size: 15px;
            color: #fff;
        }

        .con .card-container .back {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: linear-gradient(45deg, #000915, #003465);
            border-radius: 15px;
            padding: 20px 0;
            text-align: right;
            backface-visibility: hidden;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .2);
            transform: perspective(1000px) rotateY(180deg);
            transition: transform .4s ease-out;
        }

        .con .card-container .back .stripe {
            background: #000;
            width: 100%;
            margin: 10px 0;
            height: 50px;
        }

        .con .card-container .back .box {
            padding: 0 20px;
        }

        .con .card-container .back .box span {
            color: #fff;
            font-size: 15px;
        }

        .con .card-container .back .box .cvv-box {
            height: 50px;
            padding: 10px;
            margin-top: 5px;
            color: #333;
            background: #fff;
            border-radius: 5px;
            width: 100%;
        }

        .con .card-container .back .box img {
            margin-top: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="con">
                    <div class="card-container">
                        <div class="front">
                            <div class="image">
                                <img src="src/chip.png">
                                <img src="src/visa.png">
                            </div>
                            <div class="card-number-box">#### - #### - #### - ####</div>
                            <div class="flexbox">
                                <div class="box">
                                    <span>card holder</span>
                                    <div class="card-holder-name"></div>
                                </div>
                                <div class="box">
                                    <span>expires</span>
                                    <div class="expiration">
                                        <span class="exp-month">mm</span>
                                        <span>/</span>
                                        <span class="exp-year">yy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="back">
                            <div class="stripe"></div>
                            <div class="box">
                                <span>cvv</span>
                                <div class="cvv-box"></div>
                                <img src="src/visa.png">
                            </div>
                        </div>
                    </div>
                    <form action="#" method="post">
                        <div class="inputBox">
                            <span>card number</span>
                            <input type="text" maxlength="19" class="card-number-input" placeholder="1234-1234-1234-1234">
                        </div>
                        <div class="inputBox">
                            <span>card holder</span>
                            <input type="text" class="card-holder-input">
                        </div>
                        <div class="flexbox">
                            <div class="inputBox">
                                <span>expiration mm</span>
                                <select name="" class="month-input">
                                    <option value="month" selected disabled>month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <span>expiration yy</span>
                                <select name="" class="year-input">
                                    <option value="year" selected disabled>year</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <span>cvv</span>
                                <input type="text" maxlength="3" class="cvv-input">
                            </div>
                        </div>
                        <input type="submit" value="submit" class="submit-btn">
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="ticket">
                    <div class="holes-top"></div>
                    <div class="title">
                        <p class="cinema">MovieLK CINEMA PRESENTS</p>
                        <p class="movie-title" id="movieName"><?php echo $filmName; ?></p>
                    </div>

                    <div class="poster d-flex justify-content-center">
                        <img id="ticketImage" src="../FrontEnd/src/Logo.png" alt="Movie Poster" />

                    </div>
                    <div class="info">
                        <table>
                            <tr>

                                <th>SEAT</th>
                            </tr>
                            <tr>


                                <td class="bigger"><?php echo $seatNo; ?></td>

                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th>PRICE</th>
                                <th>DATE</th>
                                <th>TIME</th>
                            </tr>
                            <tr>
                                <td id="ticketPrice" style="font-size:15px"><?php echo $price; ?></td>
                                <td id="date" style="font-size:15px"><?php echo $date; ?></td>
                                <td id="time" style="font-size:15px"><?php echo $time; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="holes-lower"></div>
                </div>
            </div>
            <!--|Ticket|-->

        </div>
    </div>
    <!--|JS for card|-->
    <script>
        document.querySelector(".card-number-input").oninput = (e) => {
            let value = e.target.value.replace(/\D/g, '');
            let formattedValue = '';
            for (let i = 0; i < value.length; i += 4) {
                if (i > 0) formattedValue += '-';
                formattedValue += value.substr(i, 4);
            }
            e.target.value = formattedValue;

            document.querySelector(".card-number-box").innerText = formattedValue;
        };

        document.querySelector(".card-holder-input").oninput = () => {
            document.querySelector(".card-holder-name").innerText =
                document.querySelector(".card-holder-input").value;
        };

        document.querySelector(".month-input").oninput = () => {
            document.querySelector(".exp-month").innerText =
                document.querySelector(".month-input").value;
        };

        document.querySelector(".year-input").oninput = () => {
            document.querySelector(".exp-year").innerText =
                document.querySelector(".year-input").value;
        };

        document.querySelector(".cvv-input").onmouseenter = () => {
            document.querySelector(".front").style.transform =
                "perspective(1000px) rotateY(-180deg)";
            document.querySelector(".back").style.transform =
                "perspective(1000px) rotateY(0deg)";
        };

        document.querySelector(".cvv-input").onmouseleave = () => {
            document.querySelector(".front").style.transform =
                "perspective(1000px) rotateY(0deg)";
            document.querySelector(".back").style.transform =
                "perspective(1000px) rotateY(180deg)";
        };

        document.querySelector(".cvv-input").oninput = () => {
            document.querySelector(".cvv-box").innerText =
                document.querySelector(".cvv-input").value;
        };
    </script>
</body>

</html>