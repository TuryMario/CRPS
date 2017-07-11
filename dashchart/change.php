<?php
//if we got something through $_POST
$mail = $_POST['mail'];
$change = $_POST['change'];

if (isset($change)) {
    // here you would normally include some database connection
    $con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

    if (mysqli_connect_errno()) {
        echo "Failed". mysqli_connect_error();
    }
    // never trust what user wrote! We must ALWAYS sanitize user input
    $word = mysqli_real_escape_string($change);
    $word = htmlentities($word);

    $sql = "UPDATE client SET credibility = '$change' WHERE email='$mail' ";
    $result = mysqli_query($con, $sql);

    $sql1 = "SELECT * FROM client WHERE email='$mail' ";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($results)) {
            // echo '<td>'.$row['clientId'].'</td><td>'.$row['fname'].'</td><td>'.$row['lname'].'</td><td>'.$row['creditAmount'].'</td><td id="changes">'.$row['Credibility'].'</td>';
            echo $row['credibility'];
        }

    } else {
        echo "0 results";
    }
}
?>