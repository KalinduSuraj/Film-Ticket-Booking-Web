<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin login</title>

	 <!--Boostrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" > </script>
    <style type="text/css">
		
		    	
		.bg {
		  position:absolute;
		  z-index:-1;
		  top:0;
		  right:0;
		  bottom:0;
		  left:0;
		  background: linear-gradient(100deg, #000915, #003465);}

			@mixin glassmorphism() {
		     background: rgba(255,255,255,0.05);
		    backdrop-filter: blur(10px);
		    border-top: 1px solid rgba(255,255,255,0.2);
		    border-left: 1px solid rgba(255,255,255,0.2);
		    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
			}


			.form-signin {
				width: 100%;
				max-width: 330px;
				margin: auto;
			  
			  @include glassmorphism();
			  border-radius: 3px;}

			  .container{
			    background-color: #fdfeff47;
			    -webkit-backdrop-filter: blur(5px);
			    backdrop-filter: blur(5px);
			    height: 80%;
			    width: 80%;
			    border-radius: 20px;}

			 h1 {
				    @include glassmorphism();
				    margin-top: 0px;
				  border-top-left-radius: 3px;
				  border-top-right-radius: 3px;
				    color:#fff;
				    padding:15px;
				    text-align:center;
  				}
  				 form {
				    padding:15px;
				    
				    .btn {
				      @include glassmorphism;
				      color:#fff;
				      
				      
				      &:hover, &:focus {
				        background: rgba(255,255,255,0.1);
				        box-shadow:none;
				        
				      }
				    }
				    
				    .form-control:focus {
				      border-color:#ced4da;
				      box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
				    }
				  }
  
  
						  

    </style>

</head>
<body class="d-flex">
	<section >
		<div class="bg d-flex justify-content-end mb-3">
			<div class="row d-flex">
				<!-- 
				----------------For picture----------------
				
				<div class="col d-flex align-items-start">
					<div class="imgcontainer">
						<img src="products\abc1.jpg">
					</div>
				</div>!-->
				<!-- 
				----------------For input forms----------------
				!-->
				<div class="d-flex justify-content-center  mb-3">
					 <main class="form-signin ">
						<div class="container">
							
							<h1>Admin login</h1><br>
							
							<form action="#" method="post">

				<!-- 
				----------------input user name----------------
				!-->				

							<div class="form-floating">
					        <input type="text" class="form-control" id="floatingInput" placeholder="username" name="userName" required>
					        <label for="floatingInput">User name</label>
					        <br>
					     	</div>
				<!-- 
				----------------For input password----------------
				!-->
					      	<div class="form-floating">
					        <input type="password" class="form-control" id="floatingPassword" placeholder="Password " name="password" required>
					        <label for="floatingPassword">Password</label>
					        <br>
					    	</div>

					    	<button class="w-100 btn btn-lg " type="submit">Sign in</button>
					
					    </form>
					     	
						</div>	
						
					</main>
				</div> 
			
			</div>
		</div>
		
	</section>

</body>
</html>



<?php
//   require_once 'Viewer.php';
//   require_once 'Admin.php';
//   require_once 'DBConnection.php';
//   if(isset($_POST["userName"])){

//         if(empty($_POST["userName"]) || empty($_POST["password"]))
//         {
//           echo"<script>alert('Please Enter Data into Feilds');</script>";
//         }
//         else{
//           //*------ grab the data from form
//           $userName = $_POST["userName"];
//           $password = $_POST["password"];  
//          // $rememberMe = $_POST["rememberMe"];
//           if(substr("",0,1)=="V"){
//             $viwer = new Viewer();   
//             $viwer->logIn($userName,$password);
//           }
//           else if(substr("",0,1)=="A"){
//             $admin = new Admin();   
//             $admin->logIn($userName,$password);
//           }
          
          
//           //*------ start the session
//           session_start();
//         }
//   }
?>