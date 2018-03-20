<html>
<body>
  <?php
  $con = mysqli_connect('localhost', 'root', '')
  or die ('Could not connect: ' . mysqli_error());
  echo 'Connected successfully<br><br>';
  $mydb = mysqli_select_db ($con,'twitter') or die ('Could not select database');
  $query = 'SELECT * FROM twitts WHERE tid IN
  (SELECT tid FROM thumb GROUP BY tid HAVING COUNT(like_id)>=ALL(
    SELECT COUNT(like_id) FROM thumb GROUP BY tid))';
  $result = mysqli_query($con,$query) or die ('Query failed: ' . mysqli_error($con));
  while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
  echo $row["body"];
  echo '<br>';
  }
  mysqli_free_result($result);
  mysqli_close($con);
  ?>
</body>
</html>
