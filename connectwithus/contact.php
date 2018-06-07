<?php
	session_start();
?>

<html>
<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/projectstyle.css" type="text/css">
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
<body class="content">
	
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
	
	<?php
	
	include("projectConn.php");
	global $conn;
	
	//creating a table named contactinfo
			/*$table="CREATE TABLE contactinfo (
					id int AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(30) NOT NULL,
					email VARCHAR(50),
					subject VARCHAR(30) NOT NULL,
					message VARCHAR(500))";
					
		if(mysqli_query($conn,$table)){
			echo "<script>alert('Table created successfully')</script>";
		}
		else{
			echo "Error creating table".mysqli_error($conn);
		}*/
	
	if(isset($_POST['Submit'])){
		$name=$_POST['Name'];
		$email=$_POST['Mail'];
		$subject=$_POST['Subject'];
		$message=$_POST['Message'];
		
		$insertSql="INSERT INTO contactinfo (name,email,subject,message)
						VALUES ('$name','$email','$subject','$message')";
					
		if(mysqli_query($conn,$insertSql)){
			echo '<script>alert("Your message has been sent")</script>';
			
		}
		else{
			echo "Error inserting row ".mysqli_error($conn);
		}
	}
	
	mysqli_close($conn);
		
	?>
	
	<div class="container-fluid">
		<div class="row">
			
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
		<div class="box">
			<div class="row">
				<div class="col-md-6 col-lg-12">
					<hr>
					<h2 class="intro-text text-center">CONTACT
					<strong>FORM</strong>
					</h2>
					<hr>
					<p>We offer a rapid customer service. So we will give you reply within 1 day from your submission of this form.</p>
						
					<form method="POST" action="contact.php">
						<div class="row">
							<div class="form-group col-lg-4">
								<label>Name</label>
								<input type="text" name="Name" class="form-control" required>
							</div>
							<div class="form-group col-lg-4">
								<label>Email</label>
								<input type="email" name="Mail" class="form-control" required>
							</div>
							<div class="form-group col-lg-12">
								<label>Subject</label>
								<input type="text" name="Subject" class="form-control" required>
							</div>
							<div class="form-group col-lg-12">
								<label>Message</label>
								<textarea class="form-control" name="Message" rows="6" required></textarea>
							</div>
							<div class="form-group col-lg-12">
								<input type="hidden" name="save" value="contact">
								<button type="submit" name="Submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="box">
			<div class="row">
				<div class="col-md-6 col-lg-12">
					<hr>
					<h2 class="intro-text text-center">CONTACT
					<strong>INFO</strong>
					</h2>
					<hr>
				</div>
				<div class="col-md-12">
					<p>Phone:
					<strong>123.456.7890</strong>
					</p>
					<p>Email:
						<strong><a href="mailto:response@connectwithus.com">response@connectwithus.com</a></strong>
						<!--<strong><a href="mailto:hetali@dholakiya.com">hetali@dholakiya.com</a></strong>
						<strong><a href="mailto:kashyap@chaudhari.com">kashyap@chaudhari.com</a></strong>-->
					</p>
					<p>Address:
						<strong>23 Trentin Road<br/>
								Brampton, ON<br/>
								L6P3H4
						</strong>
					</p>
				</div>
			</div>	
		</div>	
	</div>
	<footer class="footer">
		<div class="row">
			<div class="col-lg-12 col-xs-12 text-center">
				<p style="margin-bottom: 20px;">Copyright &copy; ConnectWithUs.com 2017</p>					
			</div>
		</div>
	</footer>
	
</body>
</html>