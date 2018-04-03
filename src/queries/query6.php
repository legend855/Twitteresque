<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Query 6</title>
</head>


<body>
<?php
    // after log in, we retain user's details
    require('../utils/login.php');
    if($validUser){

    $query = "SELECT username FROM user
              WHERE uid IN (SELECT sender_id FROM message
                              WHERE receiver_id = (SELECT uid FROM user
                                                     WHERE username='$username'))";

    $result = mysqli_query($con, $query)
                or die('Query failed: '. mysqli_error($con));


    // print number of results in the query?
    echo mysqli_num_rows($result);
    echo "<br>";
    //echo mysqli_field_count($result);
    echo "<br>";

    $count = 0;
    // print results from query
    while($row = mysqli_fetch_row($result)) {
        echo "Message sender: " . $row[$count];
        // echo $username;
        echo "<br>";
        $count++;
    }
    echo "<br>";
    echo "<a href=\"../utils/logout.php\'><button> Logout</button></a>";
    mysqli_free_result($result);
    mysqli_close($con);
  }
  else{
    echo $fmsg;
  }

?>



</body>
</html>
