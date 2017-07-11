<!DOCTYPE html>
<html>
<head>
	<title>CRPS</title>
	<!-- Firebase configuration -->

        <script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
        <script>
          // Initialize Firebase
          var config = {
            apiKey: "AIzaSyD2h8QFRDz6T5sWaiDJ9Ps7u8t42P3ad3A",
            authDomain: "grouptech-aa1c5.firebaseapp.com",
            databaseURL: "https://grouptech-aa1c5.firebaseio.com",
            projectId: "grouptech-aa1c5",
            storageBucket: "grouptech-aa1c5.appspot.com",
            messagingSenderId: "179428186159"
          };
          firebase.initializeApp(config);
        </script>
        
</head>
<body>

<?php

$con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

if (mysqli_connect_errno()) {
	echo "Failed". mysqli_connect_error();
}
// // Retrieve data from Query String
$email                = $_GET['email'];
$fname                = $_GET['fname'];
$lname                = $_GET['lname'];
$creditHistory        = $_GET['creditHistory'];
$employmentDuration   = $_GET['employmentDuration'];
$sexMarital           = $_GET['sexMarital'];
$debtors              = $_GET['debtors'];
$residenceDuration    = $_GET['residenceDuration'];
$asset                = $_GET['asset'];
$dob                  = $_GET['dob'];
$housing              = $_GET['housing'];
$creditNumber         = $_GET['creditNumber'];
$job                  = $_GET['job'];
$dependant            = $_GET['dependant'];
$mobile               = $_GET['mobile'];
$foreigner            = $_GET['foreigner'];
$concurrentCredits    = $_GET['concurrentCredits'];

if(!empty($mobile)){
	$mobile = "1";
}else{$mobile = "0";}

// echo "$concurrentCredits";

// mysqli_query($con, "INSERT INTO client ( email, fname, lname,sexMarital, debtors,residenceDuration)
// VALUES
//    ( '".$email."', '".$fname."','".$lname."','".$sexMarital."', '".$debtors."', '".$residenceDuration."')" );
// //echo $rows2;

$result = mysqli_query($con, "INSERT INTO client ( email, fname, lname, creditHistory, employmentDuration, sexMarital, debtors,residenceDuration,asset, dob, housing, creditNumber, job, dependant, mobile, foreigner, concurrentCredits )
VALUES
   ( '".$email."', '".$fname."','".$lname."', '".$creditHistory."','".$employmentDuration."','".$sexMarital."', '".$debtors."', '".$residenceDuration."','".$asset."','".$dob."','".$housing."','".$creditNumber."','".$job."','".$dependant."','".$mobile."','".$foreigner."','".$concurrentCredits."')" );
// mysqli_query($con, "INSERT INTO client ( email, fname, lname, employmentDuration, residenceDuration, dob, creditNumber, dependant )
// VALUES
//    ( '".$email."', '".$fname."','".$lname."','".$employmentDuration."','".$residenceDuration."','".$dob."','".$creditNumber."', '".$dependant."')" );

	if($result){
		echo '<script type="text/javascript">';
		echo 'alert("Successfully Registered"); location.href="sign.html"';
		echo '</script>';
	}

	mysqli_close($con);



?>
</body>
</html>