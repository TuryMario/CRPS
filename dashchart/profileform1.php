<?php
$con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

if (mysqli_connect_errno()) {
    echo "Failed". mysqli_connect_error();
}

// Retrieve data from Query String
$email = $_GET['email'];
$uname = $_GET['uname'];
$lname = $_GET['lname'];
$fname = $_GET['fname'];

$sql = "UPDATE client SET uname = $uname, fname = $fname, lname = $lname WHERE email = '".$email."' ";
//mysqli_query($con, $sql);

// $sql = "SELECT * FROM client WHERE email='".$email."' ";
// $result = mysqli_query($con, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         // output data of each row
//         while($row = mysqli_fetch_assoc($result)) {
//             echo'';
  
//         }
 
//     } else {
//         echo "0 results";
//     }

    if(mysqli_query($con,$sql)){
        echo "success";
    }
    else{
        echo "failed";
    }

    mysqli_close($con);

?>