<?php
	include "projectConn.php";
	global $conn;
	
	$flightId = $_POST['flightid'];
	
	$sql=mysqli_query($conn,"SELECT * FROM flights WHERE flightId = $flightId");
	if($data=mysqli_fetch_array($sql)){
		$_SESSION['id'] = $data['flightId'];
		$_SESSION['airline'] = $data['airline'];
		echo $_SESSION['id'];
		echo $_SESSION['airline'];
	}
?>