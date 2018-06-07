<?php
	session_start();
?>
<html>
<head>
	<title>Connect With US</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="projectstyle.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for button with symbol like passenger or just for symbol -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- Include jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>
<body>

	<!-- NAVIGATION BAR -->
	<?php
		error_reporting(0);
		if(!isset($_SESSION['loggedin'])){
	?>
			<nav class="navbar navbar-inverse navbar-fixed-top">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" href="project.php">ConnectWithUS</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="flight.php">Flights</a></li>
					<li><a href="aboutus.php">About Us</a></li>
					<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#">More <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="contact.php">Contact</a></li>
						<li><a href="help.php" data-target="#helpModal" data-toggle="modal"> Help</a></li>
					  </ul>
					</li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right" id="login">
					<li><a href="signup.php" data-target="#signupModal" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php" data-target="#loginModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		  <?php 
			}
			else
			{
		  ?>
			<nav class="navbar navbar-inverse navbar-fixed-top">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" href="project.php">ConnectWithUS</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="flight.php">Flights</a></li>
					<li><a href="aboutus.php">About Us</a></li>
					<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#">More <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="contact.php">Contact</a></li>
						<li><a href="help.php" data-target="#helpModal" data-toggle="modal"> Help</a></li>
					  </ul>
					</li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li id="logout"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		  <?php
			}
		  ?>
		  
	<!--image-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="modal fade" data-keyboard="true" data-backdrop="static" id="loginModal" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Remaining code is in the login.php -->
						</div>
					</div>
				</div>
			</div>
			
			<!-- Signup popup modal -->
			<div class="col-xs-12">
				<div class="modal fade" data-keyboard="true" data-backdrop="static" id="signupModal" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Remaining code is in the signup.php -->
						</div>
					</div>
				</div>
			</div>
			
			<!-- Help popup modal -->
			<div class="col-xs-12">
				<div class="modal fade" data-keyboard="true" data-backdrop="static" id="helpModal" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Remaining code is in the signup.php -->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="text-center">
			<div class="jumbotron" style="height: 100%;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 100%;">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					  <li data-target="#myCarousel" data-slide-to="0"></li>
					  <li data-target="#myCarousel" data-slide-to="1"></li>
					  <li data-target="#myCarousel" data-slide-to="2"></li>
					  <li data-target="#myCarousel" data-slide-to="3"></li>
					  <li data-target="#myCarousel" data-slide-to="4"></li>
					  <li data-target="#myCarousel" data-slide-to="5"class="active"></li>
					</ol>
					
					<div class="carousel-inner">
						<div class="item active" id="slide1">
							<img src="Images/Dubai.jpg" alt="New York"style="width:100%;height:100%;">
							<div class="carousel-caption">
							  <h1>EXPLORE THE WORLD</h1>
							  <p>Get some new expirence by EXPLORING WORLD!!!</p>
							</div>
						</div>

						<div class="item" id="slide2">
							<img src="Images/L.jpg" alt="booking" style="width:100%;height:100%;">
							<div class="carousel-caption">
							  <h1>ONLINE BOOKING</h1>
							  <p>We are always ready to WELCOME and GUIDE you!!!!</p>
							  <p> BOOK your tickets ONLINE today!!!</p>
							</div>
						</div>

						<div class="item" id="slide3">
							<img src="Images/S.jpg" alt="snow"style="width:100%;height:100%;">
							<div class="carousel-caption">
							  <h1>HAPPINESS</h1>
							  <p>Our services make you HAPPY!!!</p>
							</div>
						</div>
					
						<div class="item" id="slide4">
							<img src="Images/waiting2.jpg" alt="New York"style="width:100%;height:100%;">
							<div class="carousel-caption">
							  <h1>WAITING</h1>
							  <p>We are eagerly ready to make your WAIT 'worthfull'</p>
							</div>
						</div>
					  
						<div class="item" id="slide5">
							<img src="Images/inflight.jpg" alt="New York"style="width:100%;height:100%;">
							<div class="carousel-caption">
							  <h1>JOURNEY</h1>
							  <p>Our motto is "Your JOURNEY becomes MEMORABLE"!!!</p>
							</div>
						</div>
	  
						<div class="item" id="slide6">
							<img src="Images/a.jpg" alt="New York"style="width:100%;height:100%;">
							<div class="carousel-caption">
							  <h1>SERVICES</h1>
							  <p>Provide best SERVICES for you!!!</p>
							</div>
						</div>
					</div>	
					
					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					  <span class="glyphicon glyphicon-chevron-left"></span>
					  <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
					  <span class="glyphicon glyphicon-chevron-right"></span>
					  <span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		
		<?php
		if(isset($_SESSION['loggedin'])){
		?>
		<form id="promoForm" method="POST">
			<div class="form-group">
				<label for="Promotion Code">Enter Promotion Code:</label>
				<input type="Promotion Code" class="form-control" id="promotion-code" placeholder="Enter Promotion Code" name="promotionCode"><br/><br/>
				<input type="submit" name="submit" value="Submit"/>
			</div>
		</form>
		
		<?php
		}
		?>
		
		<?php
			include "projectConn.php";
			global $conn;
			
			$flightId = $_POST['flightid'];
			
			$sql=mysqli_query($conn,"SELECT * FROM flights WHERE flightId = $flightId");
			if($data=mysqli_fetch_array($sql)){
				$_SESSION['id'] = $data['flightId'];
				$_SESSION['totalprice'] = $data['price'] * $_SESSION['passenger'];
				$_SESSION['departuredate'] = $data['departuredate'];
				$_SESSION['departure'] = $data['departure'];
				$_SESSION['arrival'] = $data['arrival'];
				$_SESSION['airline'] = $data['airline'];
				$_SESSION['eta'] = $data['eta'];
				$_SESSION['stops'] = $data['stop'];
			}
		?>
		
		<div class="box" style="text-align: center; background-color: white; border: 1px solid; padding: 10px; box-shadow: 5px 10px 18px #888888;">
			<h2>Flight Ticket</h2>
			<hr>
			<label>Passenger(s): </label> <?php echo $_SESSION['passenger'];?><br/>
			<?php
			$_SESSION['apply'] = $_POST['submit'];
			
			$price = $_SESSION['totalprice'] * 0.15;
			$_SESSION['discountPrice'] = $_SESSION['totalprice'] - $price;
			
			if(isset($_SESSION['apply'])){
				
			?>
			<label>Flight Price: </label> <?php echo "$".$_SESSION['discountPrice'];?><br/>
			<?php
			}
			else{
			?>
			<label>Flight Price: </label> <?php echo "$".$_SESSION['totalprice'];?><br/>
			<?php
			}
			?>
			<label>Flight Depart Date: </label> <?php echo $_SESSION['departuredate'];?><br/>
			<label>Flight Departure: </label> <?php echo $_SESSION['departure'];?><br/>
			<label>Flight Destination: </label> <?php echo $_SESSION['arrival'];?><br/>
			<label>Airline Name: </label> <?php echo $_SESSION['airline'];?><br/>
			<label>Estimated Time Arrival: </label> <?php echo $_SESSION['eta'];?><br/>
			<label>Total Stops: </label> <?php echo $_SESSION['stops'];?><br/><br/>
			<?php
			echo 'To enter promotion code you have to login first';
			?>
			<hr>
			
		
		<?php
		if(!isset($_SESSION['loggedin'])){
			
			include "projectConn.php";
			global $conn;
			
			if(isset($_POST['search'])){
				
				$mail=$_POST['mail'];
				$password=$_POST['pass'];
				
				mysqli_real_escape_string($conn,$mail);
				mysqli_real_escape_string($conn,$password);
				
				$sql=mysqli_query($conn,"SELECT * FROM Customers where email = '$mail' and password = '$password'");
				
				while($rows=mysqli_fetch_assoc($sql)){
					
					if($rows['email'] == $mail && $rows['password'] == $password){
						//echo '<script>alert("Login success. Welcome")</script>';
						$_SESSION['loggedin'] = true;
					}	
					else{
						echo "Error in login ".mysqli_error($conn);
					}	
				}	
			}
			mysqli_close($conn);
		?>
			<!--<button type="button" id="btnPayment" name="payment" class="btn btn-success btn-sm" style="font-size:24px" data-dismiss="modal" data-target="#loginModal" data-toggle="modal">Continue For Payment</button>-->
			<button type="button" class="btn btn-success btn-sm" style="font-size:24px" data-toggle="modal" data-target="#myModal">Continue For Payment</button>
			<!-- Login popup modal -->
			<div class="row">
				<div class="col-xs-12">
					<div class="modal fade" data-keyboard="true" data-backdrop="static" id="myModal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" style="background-color: green;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<span class="glyphicon glyphicon-lock pull-left" style="font-size: 25px; color: white;"></span>&nbsp; 
									<span class="modal-title pull-left" style="font-size: 20px; color: white;">Login</span>
								</div>
								<div class="modal-body">
									<form action="bookinginfo.php" method="POST" id="loginform">
										<div class="form-group">
											<label for="exampleInputEmail1" class="pull-left">Email address</label>
											<input type="email" class="form-control" name="mail" aria-describedby="emailHelp" placeholder="Enter email">
											<small id="emailHelp" class="form-text text-muted pull-left">We'll never share your email with anyone else.</small>
										</div><br/>
										<div class="form-group">
											<label for="exampleInputPassword1" class="pull-left">Password</label>
											<input type="password" class="form-control" name="pass" placeholder="Password">
										</div>
										<div class="form-check pull-left">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input">
													Remember me
											</label>
										</div>
										<button type="submit" name="search" class="btn btn-success form-control">Submit</button>
									</form>
								</div>
								<div class="modal-footer">
									<p class="para">Not a member?<a style="color: blue;" href="signup.php" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Sign Up</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			$_SESSION['loggedin'] = true;
			header("location: bookinginfo.php");
		}
		else{
		?>
			<input type="submit" id="btnPayment" name="payment" class="btn btn-success btn-sm" style="font-size:24px" value="Continue For Payment">
			<script type="text/javascript">
			$(document).ready(
				function(){
					$("#btnPayment").click(function () {
						window.location.href = "payment.php"; 
					});
				});	
			
			</script>
		<?php
		}
		?>
		</div><br/><br/>
		
		<footer class="footer">
			<div class="row">
				<div class="col-lg-12 col-xs-12 text-center">
					<p style="margin-bottom: 20px;">Copyright &copy; ConnectWithUs.com 2017</p>					
				</div>
			</div>
		</footer>
	</div>