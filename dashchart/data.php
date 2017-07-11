<?php
header('Content-Type: application/json');

define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define(DB_PASSWORD, 'mario1211');
define(DB_NAME, 'CRPS');


$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$mysqli) {
	die("Connection failed: ". $mysqli ->error);
}


$query = sprintf("SELECT id, probability, occurance FROM score ORDER BY id");

$result = $mysqli->query($query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

$rows = $mysqli->query($query2);
$rows2 = mysqli_num_rows($rows);
//echo $rows2;
 
$result->close();

$mysqli->close();


print json_encode($data);

?>