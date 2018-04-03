

<html>
<body>

<?php


    require('../utils/connect.php');

    // change the keyword to flu as in instructions
    $query = 'SELECT location, count(*)  
              FROM twitts t, user u
              WHERE body LIKE  "%flu%" and t.uid = u.uid
              GROUP BY location';


    $result = mysqli_query($con, $query) or die ('Query failed: ' . mysqli_error($con));

    // echo mysqli_num_rows($result);

    while ($row = mysqli_fetch_row($result)) {
        echo $row[0] . ":  " . $row[1] . "<br>";
    }

    mysqli_free_result($result);
    mysqli_close($con);

?>
</body>
</html>
