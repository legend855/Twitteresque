<html>
<body>
<?php

  require('../utils/connect.php');
  
  $query = 'SELECT * FROM user WHERE uid IN
                (SELECT following_id FROM follow GROUP BY following_id HAVING COUNT(follower_id)>=ALL(
                        SELECT COUNT(follower_id) FROM follow GROUP BY following_id))';

  $result = mysqli_query($con,$query) or die ('Query failed: ' . mysqli_error($con));

  while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
    echo $row["username"];
    echo '<br>';
  }

  mysqli_free_result($result);
  mysqli_close($con);

?>

</body>
</html>
