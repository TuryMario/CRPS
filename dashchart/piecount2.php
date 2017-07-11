<?php
// header('Content-Type: application/json');

$con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

if (mysqli_connect_errno()) {
	echo "Failed". mysqli_connect_error();
}

$cred2 = '0';

$query2 = "SELECT COUNT(*) FROM client WHERE credibility = '".$cred2."' ";
$sql2 = mysqli_query($con,$query2);

$result2 = mysqli_fetch_array($sql2);
echo $result2[0];


// print json_encode($data);


mysqli_close($con);

?>