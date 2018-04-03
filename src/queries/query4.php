<html>
<body>
<?php

  require('../utils/connect.php');

  $username =  $_POST["user"];

  $query = "SELECT * FROM twitts
            WHERE uid = (SELECT uid FROM user
                         WHERE username = '$username')" ;

  $result = mysqli_query($con,$query) or die ('Query failed: ' . mysqli_error($con));

  while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
    echo $row["body"];
    echo '<br><br>';
  }

  mysqli_free_result($result);
  mysqli_close($con);
?>
</body>
</html>
