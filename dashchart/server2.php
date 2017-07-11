<?php
//$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);
 $con = mysqli_connect("localhost", "root", "mario1211", "CRPS");
 $sql = "SELECT * FROM dbnetwork ORDER BY id DESC LIMIT 1 ";
 /* (network) VALUES ('".json_encode($data)."')";*/
 $result = mysqli_query($con, $sql);

 while($row = mysqli_fetch_assoc($result)) {
 	echo json_encode($row['network']);
 }
//echo json_encode("Done");
?>