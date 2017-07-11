<?php
//if we got something through $_POST
if (isset($_POST['search'])) {
    // here you would normally include some database connection
    $con = mysqli_connect("localhost", "root", "mario1211", "CRPS");

    if (mysqli_connect_errno()) {
        echo "Failed". mysqli_connect_error();
    }
    // never trust what user wrote! We must ALWAYS sanitize user input
    $word = mysqli_real_escape_string($_POST['search']);
    $word = htmlentities($word);

    $sql = "SELECT * FROM client WHERE email='".$_POST['search']."' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-hover table-striped">';  // opening table tag
        echo'<th>Client Id</th><th>First Name</th><th>Last Name</th><th>Loan Request</th><th>Credibility</th>'; //table headers

        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            //$end_result .=  "id: " . $row["clientId"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
            echo'<tr>'; // printing table row
            echo '<td>'.$row['clientId'].'</td><td>'.$row['fname'].'</td><td>'.$row['lname'].'</td><td>'.$row['creditAmount'].'</td> <div id="changeresults"><td id="changes">'.$row['credibility'].'</td></div>'; // we are looping all data to be printed till last row in the table
            // echo'<td> 
            //     <form method="POST" action="change.php">
            //         <input type="hidden" id="mail" name="mail" value="'.$row['email'].'" />
            //         <select id="change" name="change" class="change_box">
            //                             <option value="1">Qualifies</option>
            //                             <option value="0">No Qualify</option>
            //                         </select><br/><br/>
            //         <input type="button" value="Change" id="change_button" />
            //     </form></td>';
            echo'</tr>';
        }
        //echo $end_result;
        echo '</table>';
    //     echo "<script type='text/javascript'>
    //         $(document).ready(function() {
    //        // Bind submit button onclick handler to send an Ajax request and
    //        //  process Ajax response.
    //        $('.change_button').submit(function (event) {
    //           event.preventDefault();  // Do not run the default action

    //           // getting the value that user typed
    //             var changeString    = $('#change_box').val();
    //             var mail = $('#mail').val();
    //             // forming the queryString
    //             var data            ='?change=' + changeString + '&mail=' + mail; 

    //           $.ajax({
    //              type: 'POST',
    //              url:  'change.php',
    //              data: data,
    //           })
    //              .done( function (responseText) {
    //                 // Triggered if response status code is 200 (OK)
    //                 $('#changes').html(responseText);
    //              })
    //              .fail( function (jqXHR, status, error) {
    //                 // Triggered if response status code is NOT 200 (OK)
    //                 alert(jqXHR.responseText);
    //              })
    //              .always( function() {
    //                 // Always run after .done() or .fail()
    //              });
    //        });
    //     });
    // </script>";

    } else {
        echo "0 results";
    }


  //closing table tag
    // build your search query to the database
    // $sql = "SELECT title, url FROM pages WHERE content LIKE '%" . $word . "%' ORDER BY title LIMIT 10";
    // // get results
    // $row = $db->select_list($sql);
    // if(count($row)) {
    //     $end_result = '';
    //     foreach($row as $r) {
    //         $result         = $r['title'];
    //         // we will use this to bold the search word in result
    //         $bold           = '<span class="found">' . $word . '</span>';    
    //         $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';            
    //     }
    //     echo $end_result;
    // } else {
    //     echo '<li>No results found</li>';
    // }
}
?>