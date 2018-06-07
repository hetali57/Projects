<?php
	session_start();
?>

<html id="payment">
	<head>
		<title>Connect With US</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="PaymentStyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--for button with symbol like passenger or just for symbol -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
		<!-- Include jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<!-- Include Date Range Picker -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<script type="text/javascript">
			$(document).ready(
				function(){
					$("#cancel").click(function () {
						window.location.href = "flight.php"; 
					});
				});	
			
		</script>
	</head>

<body>

	<!-- NAVIGATION BAR -->
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
				<li><a href="help.php">Help</a></li>
			  </ul>
			</li>
		  </ul>
		  <!--<ul class="nav navbar-nav navbar-right">
			<li><a href="signup.php" data-target="#signupModal" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="login.php" data-target="#loginModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>-->
		</div>
	  </div>
	</nav>
	
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
		
	<?php
		
	$fnameErr="";$lnameErr="";$emailErr="";$cnameErr="";
	$_SESSION['fname']="";$_SESSION['lname']=$_SESSION['email']=$_SESSION['cname']="";
		if(isset($_POST['process'])){
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
				if (empty($_POST["fname"])) {
					echo'<script>alert("Please Enter First Name")</script>';
					$_SESSION['fname'] =" ";
					} 
				else {
					$_SESSION['fname'] = test_input($_POST["fname"]);

					if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION['fname'] )) {
						$fnameErr= "Only letters and white space allowed"; 
					}
				}
			
			
				if (empty($_POST["lname"])) {
					echo'<script>alert("Please Enter Last Name")</script>';
					$_SESSION['lname'] =" ";
					} 
				else {
					$_SESSION['lname'] = test_input($_POST["lname"]);

					if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION['lname'])) {
						$lnameErr = "Only letters and white space allowed"; 
					}
				}	
			
				if (empty($_POST["email"])) {
					echo'<script>alert("Please Enter email")</script>';
					$_SESSION['email'] =" ";
					} 
				else {
					$_SESSION['email'] = test_input($_POST["email"]);

					 if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
						$emailErr = "Invalid email format"; 
					}
				} 
				
			}
		}
	
		function test_input($data) {
			$data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
		}
?>
	
	<form class="form-horizontal" method="POST">
		<br><br><br><br>
	
		<div class="form-group">
			<label for="firstName1" class="col-md-4 Control-label">First Name:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="fname" id="firstName1" placeholder="Enter First Name" value="<?php echo $_SESSION['fname'];?>">
					<span class ="error"><?php echo $fnameErr;?></span>
					
				</div>
		</div>
  
		<div class="form-group">
			<label for="lastName1" class="col-md-4 Control-label">Last Name:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="lname" id="lastName1" placeholder="Enter Last Name" value="<?php echo $_SESSION['lname'];?>">
					<span class ="error"><?php echo $lnameErr;?></span>
				</div>
		</div>
		
		<div class="form-group">
			<label for="email" class="col-md-4 Control-label">Email ID:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="email" id="email" placeholder="Enter email address" value="<?php echo $_SESSION['email'];?>">
					<span class ="error"><?php echo $emailErr;?></span><br/>
					<i class="fa fa-cc-visa" style="font-size:48px;"></i>
					<i class="fa fa-cc-amex" style="font-size:48px;"></i>	
					<i class="fa fa-cc-mastercard" style="font-size:48px;"></i>
				</div>
		</div>
				
		<div class="form-group">
			<label for="cardHolderName" class="col-md-4 Control-label">Card Holder:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" id="cardHolder" placeholder="Enter Card Holder Name">
				
				</div>
		</div>
  
  
		<div class="form-group">
			<label for="cardHolderNumber" class="col-md-4 control-label">Card Holder Number:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" id="cardHolderNumber" placeholder="Enter Card Number"/>
				</div>
		</div>
 
		<div class="form-group">
			<label for="ccv" class="col-md-4 control-label">CCV:</label>
				<div class="col-md-1">
					<input type="text" class="form-control" id="ccv" placeholder="CCV"/>
				</div>
		</div>
		<div class="form-group">
			<label for="ccv" class="col-md-4 control-label">Expire date:</label>
				<div class="col-md-1">
					<input type="text" class="form-control" id="date" placeholder="MM/YY"/>
				</div>
		 </div>
		
		
		<div class="form-inline">
			<div class="col-md-offset-4 col-md-8">
				<input type="submit" class="btn btn-success btn-md" name="process" value="PROCESS"/>
				<input type="button" class="btn btn-danger btn-md" id="cancel" value="CANCEL"/>
			</div>
		</div>
		
	
	</form>
	
<?php
	include "projectConn.php";
	global $conn;


	if(isset($_POST['process'])){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if($fnameErr==""&&$emailErr==""&&$lnameErr=="")
			{
				$ticketno = rand(0000000,9999999);
				$fname = $_SESSION['fname'];
				$lname = $_SESSION['lname'];
				$email = $_SESSION['email'];
				if(isset($_SESSION['submit'])){
					$price = $_SESSION['discountedPrice'];
				}
				else{
					$price = $_SESSION['totalprice'];
				}	
				$departuredate = $_SESSION['departuredate'];
				$departure = $_SESSION['departure'];
				$arrival = $_SESSION['arrival'];
				$airline = $_SESSION['airline'];
				$eta = $_SESSION['eta'];
				$stops = $_SESSION['stops'];
				$passenger = $_SESSION['passenger'];
				
				/*$sql = "CREATE TABLE orders (
						orderid int AUTO_INCREMENT PRIMARY KEY,
						ticketno int(16) UNIQUE,
						reservationno int(16) UNIQUE,
						firstname varchar(30) NOT NULL,
						lastname varchar(30) NOT NULL,
						email varchar(50) NOT NULL,
						flightprice int NOT NULL,
						departuredate DATE,
						departure varchar(50) NOT NULL,
						destination varchar(50) NOT NULL,
						airline varchar(50) NOT NULL,
						eta varchar(30) NOT NULL,
						stops int NOT NULL)";
						
						if(mysqli_query($conn,$sql)){
							echo '<script>alert("table created successfully")</script>';
						}	
						else{
							echo "Error creating table ".mysqli_error($conn);
						}	*/
						
						$insert = "INSERT INTO orders (ticketno,firstname,lastname,email,flightprice,departuredate,departure,destination,airline,eta,stops,passenger)
								   VALUES ('$ticketno','$fname','$lname','$email','$price','$departuredate','$departure','$arrival','$airline','$eta','$stops','$passenger')";
								   
						if(mysqli_query($conn,$insert)){
							//echo '<script>alert("row inserted successfully")</script>';
							$_SESSION['lastId'] = mysqli_insert_id($conn);
							//echo "<script>alert('$lastId')</script>";
							echo '<script>window.location.href = "ticket.php"</script>';
						}	
						else{
							echo "Error inserting row ".mysqli_error($conn);
						}
			}
		}
	}
?>
			

</div>
</body>
</html>