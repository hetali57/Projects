<?php 
	session_start();
?>

<html>
<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/projectstyle.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="loginpage">
	  
	<?php
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
					header("location: project.php");
				}	
				else{
					echo "Error in login ".mysqli_error($conn);
				}	
			}	
		}
		mysqli_close($conn);
	?>
	
	
	<div class="modal-header" style="background-color: green;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<span class="glyphicon glyphicon-lock" style="color: white;"></span> 
		<span class="modal-title" style="font-size: 20px; color: white;">Login</span>
	</div>
	<div class="modal-body">
		<form method="POST" action="login.php" id="loginform">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" name="mail" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name="pass" placeholder="Password">
			</div>
			<div class="form-check">
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
	  

</body>
</html>