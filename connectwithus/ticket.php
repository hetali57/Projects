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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
		<!-- Include jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<!-- Include Date Range Picker -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	</head>
	<body>

		<?php 
			if(isset($_SESSION['loggedin']))
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
			</nav><br/><br/><br/><br/>
		  <?php
			}
			
			include "projectConn.php";
			global $conn;
			
			echo "<script>swal('Transaction successful','Your ticket will be displayed on this page', 'success')</script>";
			//$lastId = mysqli_insert_id($conn);
			//echo "<script>alert('$lastId')</script>";
			$id = $_SESSION['lastId'];
			$sql = mysqli_query($conn,"SELECT * FROM orders where orderid = $id");
			
			if($info=mysqli_fetch_array($sql)){
				
		  ?>
		  
			<div class="container-fluid">
				<div class="box" style="text-align: center;margin-top: 90px; border: 1px solid black; ">
					<button type="button" onclick="window.print()" class="btn btn-default btn-md pull-right" style="margin-top: 20px; font-size: 20px; margin-right: 20px;">
						<span class="glyphicon glyphicon-print"></span>
					</button>
					<h2 style="margin-left: 65px;">Flight Ticket</h2>
					<hr>
					<label>Ticket No: </label> <?php echo $info['ticketno'];?><br/>
					<label>First Name: </label> <?php echo $info['firstname'];?><br/>
					<label>Last Name: </label> <?php echo $info['lastname'];?><br/>
					<label>Email: </label> <?php echo $info['email'];?><br/>
					<label>Passenger(s): </label> <?php echo $info['passenger'];?><br/>
					<?php
					if(isset($_SESSION['submit'])){
					
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
					<label>Flight Depart Date: </label> <?php echo $info['departuredate'];?><br/>
					<label>Flight Departure: </label> <?php echo $info['departure'];?><br/>
					<label>Flight Destination: </label> <?php echo $info['destination'];?><br/>
					<label>Airline Name: </label> <?php echo $info['airline'];?><br/>
					<label>Estimated Time Arrival: </label> <?php echo $info['eta'];?><br/>
					<label>Total Stops: </label> <?php echo $info['stops'];?>
				</div>
			</div>
			<?php
			}
			?>
	</body>
</html>	