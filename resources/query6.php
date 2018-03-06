<!DOCTYPE <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Query 5</title>
</head>

<body>
 
<?php

    $con = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysqli_error());
    echo 'Connected successfully<br><br>';

    $mydb = mysqli_select_db ($con,'twitteresque') or die ('Could not select database');

    // change the keyword to flu as in instructions
    $query = 'SELECT location, count(*)  
              FROM twitts t, user u
              WHERE body LIKE  "%love%" and t.uid = u.uid 
            GROUP BY location';


    $result = mysqli_query($con, $query) or die ('Query failed: ' . mysqli_error($con));

    // echo mysqli_num_rows($result);
    /*
    while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
        echo $row["count"];
        echo $row["location"];
        echo '<br>';
    }
    */
    while ($row = mysqli_fetch_row($result)) {
        echo $row[0] . ":  " . $row[1] . "<br>";
    }

    mysqli_free_result($result);
    mysqli_close($con);

?>    
</body>
</html>