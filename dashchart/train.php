<?php

$con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

if (mysqli_connect_errno()) {
	echo "Failed". mysqli_connect_error();
}
// // Retrieve data from Query String
$test               = $_GET['test'];
//$test               = "0.55";

$sql = "INSERT INTO test (probability) VALUES ('".$test."') ";
// INSERT INTO `followers`(`userid`, `facebook`, `twitter`, `googleplus`) VALUES ([value-1],[value-2],[value-3],[value-4])

if(mysqli_query($con, $sql)){
	echo "on point";
}
else{
	echo "non chance";
}

mysqli_close($con);



?>