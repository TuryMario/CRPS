<?php

   $con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

  if (mysqli_connect_errno()) {
    echo "Failed". mysqli_connect_error();
  }

if ( isset( $_FILES['userfile'] ) )
{
  $csv_file = $_FILES['userfile']['tmp_name'];

  if ( ! is_file( $csv_file ) )
    exit('File not found.');

  $sql = '';

  if (($handle = fopen( $csv_file, "r")) !== FALSE)
  { 
      while (($data = fgetcsv($handle,",")) !== FALSE)
      {

    $num = count($data);
    for ($c=0; $c < $num; $c++){
      $col[$c] = $data[$c];
    }
          $sql = mysqli_query($con,"INSERT INTO Traindata 
            (creditHistory, employmentDuration, sexMarital, debtors,residenceDuration,asset, dob, housing, creditNumber, job, dependant, mobile, foreigner, concurrentCredits, accountBalance, savings, creditAmount, creditDuration, installmentRate, purpose, credibility)

            VALUES
            ('".$col[0]."','".$col[1]."','".$col[2]."', '".$col[3]."', '".$col[4]."','".$col[5]."','".$col[6]."','".$col[7]."','".$col[8]."','".$col[9]."','".$col[10]."','".$col[11]."','".$col[12]."','".$col[13]."','".$col[14]."','".$col[15]."','".$col[16]."','".$col[17]."','".$col[18]."','".$col[19]."','".$col[20]."')" );

      }
      fclose($handle);
  }

  // Insert into database

  //exit( $sql );
  exit( "Complete!" );
  header('Location: dashboard.html');
}
?>