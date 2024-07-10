<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Payment</title>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none; border: none;
            text-decoration: none;
            text-transform: uppercase;
        }
        .ticket{
            background:url("src/ticket2.png") no-repeat;
            height: 45rem;
            position: relative;
        }
        .details{
            margin: 0;
            padding: 200px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            text-decoration: none;
        }
        .tot{
            margin-top: 300px;
        }

        /*card */
        .con{
            min-height: 100vh;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column;
            padding-bottom: 60px;
        }
        .con form{
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 10px 15px rgba(0,0,0,.1);
            padding: 20px;
            width: 600px;
            padding-top: 160px;
        }

        .con form .inputBox{
            margin-top: 20px;
        }

        .con form .inputBox span{
            display: block;
            color:#999;
            padding-bottom: 5px;
        }

        .con form .inputBox input,
        .con form .inputBox select{
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border:1px solid rgba(0,0,0,.3);
            color:#444;
        }

        .con form .flexbox{
            display: flex;
            gap:15px;
        }

        .con form .flexbox .inputBox{
            flex:1 1 150px;
        }

        .con form .submit-btn{
            width: 100%;
            background: linear-gradient(45deg, #000915, #003465);
            margin-top: 20px;
            padding: 10px;
            font-size: 20px;
            color:#fff;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s linear;
        }

        .con form .submit-btn:hover{
            letter-spacing: 2px;
            opacity: .8;
        }

        .con .card-container{
            margin-bottom: -150px;
            position: relative;
            height: 250px;
            width: 400px;
        }

        .con .card-container .front{
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0; left: 0;
            background: linear-gradient(45deg, #000915, #003465);
            border-radius: 15px;
            backface-visibility: hidden;
            box-shadow: 0 15px 25px rgba(0,0,0,.2);
            padding:20px;
            transform:perspective(1000px) rotateY(0deg);
            transition:transform .4s ease-out;
        }

        .con .card-container .front .image{
            display: flex;
            align-items:center;
            justify-content: space-between;
            padding-top: 10px;
        }

        .con .card-container .front .image img{
            height: 50px;
        }

        .con .card-container .front .card-number-box{
            padding:30px 0;
            font-size: 22px;
            color:#fff;
        }

        .con .card-container .front .flexbox{
            display: flex;
        }

        .con .card-container .front .flexbox .box:nth-child(1){
            margin-right: auto;
        }

        .con .card-container .front .flexbox .box{
            font-size: 15px;
            color:#fff;
        }

        .con .card-container .back{
            position: absolute;
            top:0; left: 0;
            height: 100%;
            width: 100%;
            background: linear-gradient(45deg, #000915, #003465);
            border-radius: 15px;
            padding: 20px 0;
            text-align: right;
            backface-visibility: hidden;
            box-shadow: 0 15px 25px rgba(0,0,0,.2);
            transform:perspective(1000px) rotateY(180deg);
            transition:transform .4s ease-out;
        }

        .con .card-container .back .stripe{
            background: #000;
            width: 100%;
            margin: 10px 0;
            height: 50px;
        }

        .con .card-container .back .box{
            padding: 0 20px;
        }

        .con .card-container .back .box span{
            color:#fff;
            font-size: 15px;
        }

        .con .card-container .back .box .cvv-box{
            height: 50px;
            padding: 10px;
            margin-top: 5px;
            color:#333;
            background: #fff;
            border-radius: 5px;
            width: 100%;
        }

        .con .card-container .back .box img{
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
                                <img src="src/chip.png" >
                                <img src="src/visa.png" >
                            </div>
                            <div class="card-number-box">#### - #### - #### - ####</div>
                            <div class="flexbox">
                                <div class="box">
                                    <span>card holder</span>
                                    <div class="card-holder-name">full name</div>
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
                            <input type="text" maxlength="16" class="card-number-input" placeholder="1234-1234-1234-1234">
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
                                <select name=""class="year-input">
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
            <!--|Ticket|-->
            <div class="col-5">
                <div class="ticket">
                    <ul class="details">
                        <li id="movie-name">Movie Name</li>
                        <li id="genre">Genre</li>
                        <li id="date">Date</li>
                        <li id="time">Time</li>
                        <li class="no-of-seat">Seats</li>
                        <div class="tot">
                            <li id="Total">Total</li>
                        </div>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--|JS for card|-->
    <script>
        document.querySelector(".card-number-input").oninput = () => {
  document.querySelector(".card-number-box").innerText =
    document.querySelector(".card-number-input").value;
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
