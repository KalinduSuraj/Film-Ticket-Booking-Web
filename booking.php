<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        .date-picker{
            display: flex;
            justify-content: left;
            margin-bottom: 20px;
        }
        .date{
            padding: 10px;
            cursor: pointer;
        }
        #selected-date{
            background-color:#003465;
            color: white;
        }
    </style>
    <script>
        function selectDate(day){

            //Reset
            const previouslySelected =document.getElementById("selected-date");
            if(previouslySelected){
                previouslySelected.removeAttribute("id");
            }
            //highlight
            const selectDate =document.querySelector(`.date:nth-child(${day+1})`);
            selectDate.setAttribute("id","selected-date");

            //get times according to date
            getTimes(day);
        }
        function getTimes(day){

        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="date-picker">
                    <div class="date" onclick="selectDate(1)" id="">SelectedDate</div>
                </div>
                <div id="time-slots"></div>
            </div>
            <div class="col-8">
                
            </div>
        </div>
    </div>
</body>
</html>