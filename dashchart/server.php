<?php
$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);


 $con = mysqli_connect("localhost", "root", "mario1211", "CRPS");
 $sql = "INSERT INTO dbnetwork (network) VALUES ('".json_encode($data)."')";
 $result = mysqli_query($con, $sql);
echo json_encode("Done");
?>