<?php
//Establishing the connection
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="bookingdb";
		
		$conn=mysqli_connect($servername,$username,$password,$dbname);
		
		if(!$conn){
			die("Connection failed ".mysqli_connect_error());
		}	
		
		//creating database bookingdb
		/*$sql="CREATE DATABASE bookingdb";
		
		if(mysqli_query($conn,$sql)){
			echo '<script>alert("Database created successfully")</script>';
		}	
		else{
			echo "Error creating database ".mysqli_error($conn);
		}	*/

?>