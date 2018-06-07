<?php
	session_start();
?>

<html>
<head>
	<title>About us</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/projectstyle.css">
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
<body class="aboutusPage">

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
	
	<div class="container">		
		<div class="row" id="box-search">
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
		
		<!-- Aboutus content -->
		<div class="rounded  col-md-6 col-sm-6 col-xs-12 pull-left">
			<p style="color: white;">Welcome to the Board Room of ConnectWithUS, a organization created for today's travel media. It houses the travel trends and tips,
				exclusive insights on top travel destinations, cheaper fare rates and other helpful media resources.</p>	
		</div>
		<div class="rounded  col-md-6 col-sm-6 col-xs-12 pull-right ">
				<img src="Images/aboutus.jpg" alt="" class="img-responsive aboutimage">		
		</div>
		<div class="rounded  col-md-6 col-sm-6 col-xs-12 pull-left">
			<p style="color: white; margin-top: 7px;">Launched in 2017, ConnectWithUS is the largest online travel company in the world that has an extensive brand portfolio including 
			some of the world’s leading online travel brands. To stay updated with the latest travel news and exclusive deals follow us on: </p>	
		</div>
	</div>
						
		<div class="soc-med">
			   <a href="https://facebook.com" class="pull-left"><img src="Images/2.png" width="62px" height="62px"></a> 
			    <a href="https://plus.google.com/discover" class="pull-left"><img src="Images/3.png" width="55px" height="55px" style="margin-top:5px; margin-right:4px;"></a> 
				 <a href="https://www.instagram.com/?hl=en" class="pull-left"><img src="Images/4.png" width="55px" height="55px" style="margin-top:5px;" ></a> 
				  <a href="https://twitter.com/?lang=en" class="pull-left"><img src="Images/1.png" width="80px" height="80px" style="margin-top: -9px; margin-left:-8px;"></a>   
			  </div>
			</div><br/><br/><br/><br/>
	
		<footer class="footer">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p>Copyright &copy; ConnectWithUs.com 2017</p>					
			</div>
		</div>
	</footer>
	
</body>
</html>