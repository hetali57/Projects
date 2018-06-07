<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/projectstyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="signuppage">

	<?php 
		include "projectConn.php";
		global $conn;
		
		if(isset($_POST['insert'])){
			$firstname=$_POST['fname'];
			$lastname=$_POST['lname'];
			$gender=$_POST['gender'];
			$birthdate=$_POST['bdate'];
			$mail=$_POST['e-mail'];
			$password=$_POST['pword'];
			
			//creating a table named customers
			/*$table="CREATE TABLE Customers (
					customerid int AUTO_INCREMENT PRIMARY KEY,
					firstname VARCHAR(30) NOT NULL,
					lastname VARCHAR(30) NOT NULL,
					gender VARCHAR(8) NOT NULL,
					birthdate DATE,
					email VARCHAR(50),
					password VARCHAR(30))";*/
					
			$insertSql="INSERT INTO Customers (firstname,lastname,gender,birthdate,email,password)
						VALUES ('$firstname','$lastname','$gender','$birthdate','$mail','$password')";
					
			if(mysqli_query($conn,$insertSql)){
				//echo '<script>alert("row inserted successfully")</script>';
				header("location: login.php");
			}
			else{
				echo "Error inserting row ".mysqli_error($conn);
			}
		}
		mysqli_close($conn);
		
	?>
	
	<div class="modal-header" style="background-color: red;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<span class="glyphicon glyphicon-pencil" style="color: white;"></span> 
						<span class="modal-title" style="font-size: 20px; color: white;">Signup</span>
					</div>
					<div class="modal-body">
						<form method="POST" action="Signup.php" style="color: white;" id="signupform">
							<h3 style="color: red; margin-top: -5px;" class="intro-text text-center"><strong>Member Info</strong></h3>
							<div class="form-group">
								<label for="exampleInputFirstname">First Name</label>
								<input type="text" class="form-control" name="fname" aria-describedby="firstnameHelp" placeholder="Enter firstname" required>
							</div>
							<div class="form-group">
								<label for="exampleInputLastname">Last Name</label>
								<input type="text" class="form-control" name="lname" aria-describedby="lastnameHelp" placeholder="Enter lastname" required>
							</div>
							<div class="form-group">
								<label for="exampleInputGender">Gender</label>
								<select name="gender" class="form-control" placeholder="GENDER">
									<option value="Male">MALE</option>
									<option value="Female">FEMALE</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputBDate">DATE OF BIRTH</label>
								<input type="date" class="form-control" name="bdate" aria-describedby="birthdateHelp" placeholder="Enter birthdate">
							</div>
							
							<h3 style="color: red;" class="intro-text text-center"><strong>Required Login Credentials</strong></h3>
							<div class="form-group">
								<label for="exampleInputEmail">Email address</label>
								<input type="email" class="form-control" name="e-mail" aria-describedby="emailHelp" placeholder="Enter email" required>
							</div>	
							<div class="form-group">
								<label for="exampleInputPassword">Password</label>
								<input type="password" class="form-control" name="pword" placeholder="Password" required>
							</div>
							<button class="btn btn-danger form-control" type="submit" name="insert">Sign Up</button>
						</form>
					</div>
					<div class="modal-footer">
						<p class="para">Are you a member?<a style="color: blue;" href="login.php" data-dismiss="modal" data-target="#loginModal" data-toggle="modal">Login</a></p>
					</div>
					
					<div class="col-xs-12">
						<div class="modal fade" data-keyboard="true" data-backdrop="static" id="loginModal" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<!-- Remaining code is in the login.php -->
								</div>
							</div>
						</div>
					</div>
	

	
</body>
</html>