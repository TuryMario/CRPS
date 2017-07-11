<?php
$con = mysqli_connect("localhost", "root", "mario1211", "CRPS");


$email = $_GET['email'];


$userdata = array();

$sql = "SELECT * FROM client WHERE email = '".$_GET['email']."' ";

$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_assoc($result)){

		
		array_push($userdata,$row['creditHistory']/10000,$row['employmentDuration']/10000,$row['sexMarital']/10000,$row['debtors']/10000,$row['residenceDuration']/10000,$row['asset']/10000,$row['dob']/10000,$row['housing']/10000,$row['mobile']/10000,$row['creditNumber']/10000,$row['job']/10000,$row['dependant']/10000,$row['foreigner']/10000,$row['concurrentCredits']/10000,$row['accountBalance']/10000,$row['savings']/10000,$row['creditAmount']/10000,$row['creditDuration']/10000,$row['installmentRate']/10000,$row['purpose']/10000);
		
	
		//echo json_encode(array($prediction, $recommendation));
echo json_encode($userdata);
	
	}
	

	//echo json_encode(array($return);

	mysqli_close($con);

	
?>

