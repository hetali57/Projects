<?php 
	session_start();
?>

<html>
<head>
	<title>Connect With US</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/projectstyle.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(
			function(){
				$("#logout").click(function () {
					$("#login").show();
				});
			});
	</script>
</head>
<body class="main">

	<!-- NAVIGATION BAR -->
	<?php
		//error_reporting(0);
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
	
	<!-- ACTUAL CONTENT -->	
	
	<div class="container-fluid">
		<!-- Login popup modal -->
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
		
		<div class="jumbotron back">
			<div class="text-center" style="margin-top: 140px;">
				<h2 style="color: white; font-family: sans-serif;">BOOK FLIGHT</h2>
				<hr>
				<p style="color: white;">Book your flight and feel relaxed by visiting any place in the world. We are commited to provide you world's best service, so
				   you can enjoy your vacations with family, colleagues, and your business trips.</p>
				<a href="#flightInfo"><button class="btn btn-danger btn-lg" style="opacity: 0.7;">Get Started</button></a>
			</div>
		</div>	
		
		<hr class="featurette-divider">
		<h1 class="text-center" id="flightInfo">OFFERS</h1>
		<hr class="featurette-divider">
		<div class="row" id="box-search">
			<div class="rounded text-left col-md-5 col-sm-6 col-xs-12 pull-left" style="margin-top: 0px;">
				<a href="flight.php" class="img-thumbnail">
				<img src="Images/taj-mahal.jpeg" alt="" class="img-responsive">
				</a>
				<div class="caption">
					<strong><p>Extra $40 off flights to Asia</strong><br><br>
					Deal is still on to book the flights to Asia</p>
				</div>
			</div>
		
			<div class="rounded col-md-5 col-sm-6 col-xs-12 pull-right">
				<a href="flight.php" class="">
				<img src="Images/newyork1.jpg" alt="" class="img-responsive img-thumbnail">
				</a>
				<div class="caption">
					<p><strong>Want to explore US in this winter!!!</strong><br><br>
					Book your flight now on special discount</p>
				</div>
			</div>
		</div><br/>
		
		<hr class="featurette-divider">
		<h1 class="text-center" id="flightInfo">FLIGHT INFO</h1>
		<hr class="featurette-divider">
		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">
					"Airbus A380-800. "
					<span class="text-muted">It is the 1st biggest flight in the world.</span>
				</h2>
				<p class="lead">Airbus A380-800 is the first biggest passenger airplane all over the world. It is also known as Superjumbo with accommodation 
				of about 525 passengers in its three-class configuration.
				</p>
			</div>
			<div class="col-md-5">
				<img class="featurette-image img-fluid mx-auto img-thumbnail" data-src="holder.js/500x500/auto" style="width: 100%; height: 500px;" 
				src="Images/a380.jpg" data-holder-rendered="true">
			</div>
		</div><br/>
		
		<hr class="featurette-divider">
		<div class="row featurette">
			<div class="col-md-7 order-md-2">
				<img class="featurette-image img-fluid mx-auto img-thumbnail" data-src="holder.js/500x500/auto" style="width: 100%; height: 500px;" 
				src="Images/b777.jpg" data-holder-rendered="true">
			</div>
			<div class="col-md-5 order-md-1">
				<h2 class="featurette-heading">
					"Boeing 777-300. "
					<span class="text-muted">It is the 2nd biggest flight in the world.</span>
				</h2>
				<p class="lead">Boeing 777-300 is the second biggest passenger airplane all over the world. It accommodates seating capacity for maximum 550 passengers, 
				and for 368 passengers in its three-class configuration.
				</p>
			</div>
		</div><br/>
		
		<hr class="featurette-divider">
		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">
					"Boeing 747-400. "
					<span class="text-muted">It is the 3rd biggest flight in the world.</span>
				</h2>
				<p class="lead">Boeing 747-400 is the third biggest passenger airplane all over the world. It accommodates seating capacity for maximum 524 passengers
				in its two-class configuration, and about 416 passengers in its three-class configuration.
				</p>
			</div>
			<div class="col-md-5">
				<img class="featurette-image img-fluid mx-auto img-thumbnail" data-src="holder.js/500x500/auto" style="width: 100%; height: 500px;" 
				src="Images/b747.jpg" data-holder-rendered="true">
			</div>
		</div><br/>
		<hr class="featurette-divider">
		
		<footer class="footer">
			<div class="row">
				<div class="col-lg-12 col-xs-12 text-center">
					<p style="margin-bottom: 20px;">Copyright &copy; ConnectWithUs.com 2017</p>					
				</div>
			</div>
		</footer>
	</div>
	
</body>
</html>