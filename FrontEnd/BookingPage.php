<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin login</title>

	 <!--Boostrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" > </script>
    <link rel="stylesheet" href="../FooterStyle.css">
    <style type="text/css">
			    	
		.bg {
		  position:absolute;
		  z-index:-1;
		  top:0;
		  right:0;
		  bottom:0;
		  left:0;
		  background: linear-gradient(100deg, #000915, #003465);
        }
        .form-signin {
            width: 75%;
            height: 75%;
            margin: auto;
            border-radius: 3px;
        }

        .container{
            background-color: #fdfeff47;
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
            height: 80%;
            width: 80%;
            border-radius: 20px;
        }

        h1 {
            margin-top: 0px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            color:#fff;
            padding:15px;
            text-align:center;
        }
        form {
        padding:15px;
        }
        .btn {
            color:#fff;				      
        }
        
        .form-control:focus {
            border-color:#ced4da;
            box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
        }
        .all-seat{
            margin:3px;
        }
        .item {
            font-size: 12px;
            position: relative;
        }
        .item::before {
            content: "";
            position: absolute;
            top: 50%;
            left: -12px;
            transform: translate(0, -50%);
            width: 10px;
            height: 10px;
            background: rgb(255, 255, 255);
            outline: 0.2mm solid rgb(120, 120, 120);
            border-radius: 0.3mm;
        }
        .item:nth-child(2)::before {
            background: rgb(180, 180, 180);
            outline: none;
        }
        .item:nth-child(3)::before {
            background: rgb(28, 185, 120);
            outline: none;
        }
        .status {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
    </style>

</head>
<body class="d-flex">
	<section >
		<div class="bg d-flex justify-content-center mb-3">
			<div class="row d-flex">
				<div class="d-flex justify-content-center  mb-3">
					 <main class="form-signin ">
						<div class="container">							
							<h1>Movie Name</h1><br>
							<div class="status ">
                                <div class="item">Available</div>
                                <div class="item">Booked</div>
                                <div class="item">Selected</div>
                            </div>
							<form action="#" method="post">				
                            <div class="all-seats">
                            <input style="margin-left:10px" type="checkbox" name="tickets" id="s1" />
                            <label for="s1" class="seat booked"></label>
                            </div>
                            <div class="mt-5">
                                <button class="w-100 btn btn-lg" type="submit">Book</button>

                            </div>
					
					    </form>
					     	
						</div>	
						
					</main>
				</div> 
			
			</div>
		</div>
		
	</section>
    <!-- <footer class="footer container-fluid justify-content-bottom">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h5>About Us</h5>
                <p>
                    Ut congue augue non tellus bibendum, in varius tellus condimentum.
                    In scelerisque nibh tortor, sed rhoncus odio condimentum in.
                    Sed sed est ut sapien ultrices eleifend. Integer tellus est, vehicula eu lectus tincidunt,
                    ultricies feugiat leo.
                    Suspendisse tellus elit, pharetra in hendrerit ut, aliquam quis augue.
                    Nam ut nibh mollis, tristique ante sed, viverra massa.


                </p><br>
                <div class="d-flex ">
                    <a href="#">
                        <h5><i class="bi bi-twitter text-light me-3"></h5></i>
                    </a>
                    <a href="#">
                        <h5><i class="bi bi-facebook text-light me-3"></h5></i>
                    </a>
                    <a href="#">
                        <h5><i class="bi bi-instagram text-light me-3"></h5></i>
                    </a>
                    <a href="#">
                        <h5><i class="bi bi-whatsapp text-light me-3"></h5></i>
                    </a>
                </div>

            </div>
            <div class="col-5 FooterDetails">
                <br><br>
                <div>
                    <p> <small>Street name and number</small> City, Country</p>
                </div>
                <div>
                    <p> (+00) 0000 000 000</p>
                </div>
                <div>
                    <p><a href="#"> office@company.com</a></p>
                </div>
            </div>
            <div class="col-3 content-end">
                <img class="Footerlogo center" src="src/Logo.png" alt="">
                <h1 class="FooterlogoTitle">MovieLK</h1>
            </div>

        </div>
    </div>
    <div class="CopyRightDiv">
        <p class="CopyRight"> MovieLK &copy; 2024</p>
    </div>
</footer> -->

<script>
    let seats = document.querySelector(".all-seats");
      for (var i = 0; i < 109; i++) {
        let randint = Math.floor(Math.random() * 2);
        let booked = randint === 1 ? "booked" : "";
        seats.insertAdjacentHTML(
          "beforeend",
          '<input style="margin:10px" type="checkbox" name="tickets" id="s' +
            (i + 2) +
            '" /><label for="s' +
            (i + 2) +
            '" class="seat ' +
            booked +
            '"></label>'
        );
      }
</script>
</body>
</html>