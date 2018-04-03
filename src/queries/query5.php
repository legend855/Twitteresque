<html>
<body>
  <?php

  require('../utils/connect.php');

  $year =  $_POST["year"];

  $query = "SELECT *
            FROM user
            WHERE uid IN(SELECT uid
			                   FROM(SELECT * FROM twitts
                              WHERE post_time >= '".$year."-01-01'
                               AND post_time <= '".$year."-12-31') AS T1
                         GROUP BY uid
				                 HAVING COUNT(tid) >= ALL(SELECT COUNT(tid)
                                                  FROM(SELECT *
                                                       FROM twitts
                                                       WHERE post_time >= '".$year."-01-01'
                                                       AND post_time <= '".$year."-12-31') AS T2
                                                  GROUP BY uid))";

  $result = mysqli_query($con,$query) or die ('Query failed: ' . mysqli_error($con));

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo $row["username"];
      echo '<br><br>';
  }

  mysqli_free_result($result);
  mysqli_close($con);
	echo "<br>";
	echo "<a href=\"../utils/logout.php\'><button> Logout</button></a>";
   ?>
</body>
</html>
