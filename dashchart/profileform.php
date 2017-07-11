<?php

$con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

if (mysqli_connect_errno()) {
	echo "Failed". mysqli_connect_error();
}
// Retrieve data from Query String
$Email = $_GET['email'];
$Uname = $_GET['uname'];
$Fname = $_GET['fname'];
$Lname = $_GET['lname'];


//build query

$sqlReq = "UPDATE client SET uname = '$Uname' , fname = '$Fname', lname = '$Lname' WHERE email = '".$Email."' ";

	if(mysqli_query($con,$sqlReq)){
		echo "success";
	}
	else{
		echo ("failed". mysqli_error($con));
	}
	mysqli_close($con);

?>