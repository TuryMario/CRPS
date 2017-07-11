<?php
$con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

if (mysqli_connect_errno()) {
	echo "Failed". mysqli_connect_error();
}
$prediction = '0.3';
$recommendation = '500';
// Retrieve data from Query String
$email 				= $_GET['email'];
$accountBalance 	= $_GET['accountBalance'];
$savings 			= $_GET['savings'];
$creditAmount 		= $_GET['creditAmount'];
$creditDuration 	= $_GET['creditDuration'];
$installmentRate 	= $_GET['installmentRate'];
$purpose 			= $_GET['purpose'];


//build query
// $query = mysqli_query($con, "UPDATE client 
// 		  SET accountBalance = $accountBalance, savings = $savings, creditAmount = $creditAmount, einstallmentRate = $installmentRate, purpose = $purpose 
// 		   WHERE email LIKE $email ");

$sql = "UPDATE client SET accountBalance = $accountBalance, savings = $savings, creditAmount = $creditAmount, creditDuration = $creditDuration, installmentRate = $installmentRate, purpose = $purpose WHERE email = '".$email."' ";

// $query = mysqli_query($con, 'UPDATE client SET accountBalance = "'.$accountBalance.'", savings = "'.$savings.'", creditAmount = "'.$creditAmount.'", installmentRate = '".$installmentRate."', purpose = '".$purpose."'
// 		   					WHERE email = '".$email."' ');

//get row where user applicant
//run the user application againat the trained neural network
//get prediction reading from the neuralnet
//return the prediction to application.html
//change colour of coresponding bar graph
//return recommendation incase of fail

	if(mysqli_query($con,$sql)){
		// echo $prediction;
		// if(!empty($prediction)){
		// 	echo $recommendation;
		//}
		echo json_encode(array($prediction, $recommendation));
	}
	else{
		echo "failed";
	}

	//echo json_encode(array($return);

	mysqli_close($con);

?>

