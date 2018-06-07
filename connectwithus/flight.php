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

	<script type="text/javascript">
		$(document).ready(function(){
			var departdate_input=$('input[name="departdate"]'); //our departdate input has the name "departdate"
			var arrivedate_input=$('input[name="arrivedate"]'); //our arrivedate input has the name "arrivedate"
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			departdate_input.datepicker({
				format: 'yyyy/mm/dd',
				container: container,
				todayHighlight: true,
				autoclose: true,
				startDate: new Date()
			})
			arrivedate_input.datepicker({
				format: 'yyyy/mm/dd',
				container: container,
				todayHighlight: true,
				autoclose: true,
				startDate: new Date()
			})
		})
		
		var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
		$.each(alphabet, function(letter) {
        $('.flight').append($('<option>' + alphabet[letter] + '</option>'));
		});
			
		$(document).ready(
			function(){
				$("#round").click(function () {
					$("#returndate").show();
				});
			});
			
		$(document).ready(
			function(){
				$("#oneway").click(function () {
					$("#returndate").hide();
				});
			});	
			
		$(document).ready(
			function(){
				$("#logout").click(function () {
					$("#login").show();
				});
			});	
			
		$(document).ready(
			function(){
				$("#btnSearch").click(function () {
					$("#spinner").show();
				});
			});		
			
		
	</script>

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
	<div class="container-fluid table-responsive">
	
		<!-- Login popup modal -->
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
				<div class="jumbotron slider">
				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 90%;">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					  <li data-target="#myCarousel" data-slide-to="0"></li>
					  <li data-target="#myCarousel" data-slide-to="1"></li>
					  <li data-target="#myCarousel" data-slide-to="2"></li>
					  <li data-target="#myCarousel" data-slide-to="3"></li>
					  <li data-target="#myCarousel" data-slide-to="4"></li>
					  <li data-target="#myCarousel" data-slide-to="5"class="active"></li>
					</ol>

					<!-- Wrapper for slides -->
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
	
		<form class="form-inline" method="POST">
    
			<div class="form-group">
			<br><br><br>
			  <label for="Departure">Departure:</label>
			  <input type="Departure" class="form-control" id="departure" placeholder="Enter Departure " name="departure" list="airports">
			</div>
			
			<div class="form-group">
			<br><br><br>
			  <label for="pwd">Arrival:</label>
			  <input type="Arrival" class="form-control" id="arrival" placeholder="Enter Destination" name="arrival" list="airports">
			</div>
			
			<div class="form-group">
			<br><br><br>
						 <label for="Passenger">Passenger:</label>
						<select class="form-control" id="passenger" name="passenger">
							<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
						</select>
				</div>
				
			<!--<div class="form-group">
			<br><br><br>
				<label for="Promotion Code">Promotion Code:</label>
				<input type="Promotion Code" class="form-control" id="promotion-code" placeholder="Enter Promotion Code" name="promotion-code">
			</div>-->
			
			<div class="form-group">
			<br><br><br>
				<!--<button type="button" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-calendar"></span> Departure: 
				 <input type="date" name="calendar">
				</button>
				</div>-->
				<span class="glyphicon glyphicon-calendar"></span>
				<label class="control-label" for="date">DepartureDate:</label>
				<input class="form-control" id="date" name="departdate" placeholder="YYYY/MM/DD" type="text">
			 </div>
				
			<div class="form-group" id="returndate" style="display: none;">
			<br><br>
				<!--<button type="button" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-calendar"></span> Arrival:
				 <input type="date" name="calendar">
				</button>
				</div>-->
				
				
				<span class="glyphicon glyphicon-calendar"></span>
				<label class="control-label" for="date">ReturnDate:</label>
				<input class="form-control" id="date" name="arrivedate" placeholder="YYYY/MM/DD" type="text"/>
				
			</div><br><br>
			 
			<div class="form-inline">
				<input type="radio" id="oneway" name="trip" value="One-way" checked> <label><strong>One-Way Trip</strong></label>
				<input type="radio" id="round" name="trip" value="Round"> <label><strong>Round Trip</strong></label>
			</div><br>
			<!--<button type="button" class="btn btn-info btn-lg">Search</button>-->
		
			<!--<button type="button" class="btn btn-info btn-lg" name="search" style="font-size:24px" onclick="">Search</button>-->
			<button type="submit" id="btnSearch" name="search" class="btn btn-info btn-lg" style="font-size:24px">Search<i class="fa fa-spinner fa-spin" style="display:none;" id="spinner"></i></button>
		
		<br><br>
		
		</form>
		
			<datalist id="airports">
			<?php 
			include "projectConn.php";
			
			global $conn;
			/*$price = "";
			$departuredate = "";
			$departure = "";
			$arrival = "";
			$airline = "";
			$eta = "";
			$stops = 0;
			$promotion = "";
			$arrivaldate = "";*/
			$_SESSION['departuredate'] = "";
			$_SESSION['departure'] = "";
			$_SESSION['arrival'] = "";
				
				
			/*$sql = "CREATE TABLE flights (
					flightId int AUTO_INCREMENT primary key,
					price int NOT NULL,
					departuredate DATE,
					departure VARCHAR(50) NOT NULL,
					arrival VARCHAR(50) NOT NULL,
					airline VARCHAR(50) NOT NULL,
					eta VARCHAR(10) NOT NULL,
					stop int NOT NULL)";
						
			if(mysqli_query($conn,$sql)){
				echo '<script>alert("Table created successfully")</script>';
			}	
			else{
				echo "Error inserting row ".mysqli_error($conn);
			}*/
				
			
			if(isset($_SESSION['departure'],$_SESSION['arrival'])){
				//$query = mysqli_query($conn,"SELECT CONCAT(ci.name, ',',s.name, ',',c.name) as 'AirportName' from cities ci, states s, countries c where s.id = ci.state_id and c.id = s.country_id");
				$query = mysqli_query($conn,"SELECT CONCAT(ci.name, ',',c.name) as 'AirportName' from cities ci, states s, countries c where s.id = ci.state_id and c.id = s.country_id");
				while ($row = mysqli_fetch_assoc($query)){
					//echo "<option value=\"departure\">" . $row['Airport Name'] . "</option>";
					
				?>
					<option value="<?php echo $row['AirportName']; ?>">
				
			<?php 	
				}
			}
			
			?>
			
				</datalist>
			
			<?php
				
			//fetching data from database
			if(isset($_POST['search'])){
									
				$_SESSION['promotion'] = $_POST['promotion-code'];					
				$departDate = $_POST['departdate'];
				$depart = $_POST['departure'];
				$arrival = $_POST['arrival'];
				//$returnDate = $_POST['arrivedate'];
				//$viewby = $_POST['sortairline'];
				$_SESSION['passenger'] = $_POST['passenger'];
				$radiobutton = $_POST['trip'];
				
				
					
				$searchSql=mysqli_query($conn,"SELECT * FROM flights where departuredate = '$departDate' and departure = '$depart' and arrival = '$arrival'");
				
						if($radiobutton == 'One-way' && isset($_POST['departdate'])){
						if(mysqli_num_rows($searchSql) <= 0){
							echo "No such results found";
						}
						else{
							$_SESSION['promocode']="FLI74G";
		?>
						<div class="pull-right">
						<?php
							echo 'Enter this promotion code to get 15% discount <br/> <div style="color:blue">'.$_SESSION['promocode']."</div><br/>";
						?>
						</div>
						<div class="row">
													
							<table class="table table-hover table-bordered table-striped col col-lg-2" id="flights">
								<thead>
								<tr>
									<th>Price</th>
									<th>Departure Date</th>
									<th>Departure</th>
									<th>Arrival</th>
									<th>Airline</th>
									<th>ETA</th>
									<th>Stops</th>
									<th>SELECT FLIGHT</th>
								</tr>
								</thead>
								<tbody>
		<?php
					
							while($rows=mysqli_fetch_array($searchSql)){
		?>
								<form action="bookinginfo.php" method="POST">
									<tr>
									<?php
									
									?>
										<td><?php echo "$".$rows['price'];?></td>
										<td><?php echo $rows['departuredate'];?></td>
										<td><?php echo $rows['departure'];?></td>
										<td><?php echo $rows['arrival'];?></td>
										<td><?php echo $rows['airline'];?></td>
										<td><?php echo $rows['eta'];?></td>
										<td><?php echo $rows['stop'];?></td>
										<td><input type="hidden" name="flightid" value="<?php echo $rows['flightId'];?>" />
											<input type="submit" class="btn btn-info btn-sm" value="BOOK" id="book" name="book"/>
										</td>
									</tr>
								</form>
		<?php
							}
						}
					}
			}
		?>
								</tbody>
							</table>
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
	</div>

	</body>
	</html>