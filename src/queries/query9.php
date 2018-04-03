<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Query 9</title>
</head>


<body>
  <?php
  // after log in, we retain user's details


  require('../utils/login.php');


  $commentBody =  $_POST['comment_body'];
  $parentTid = $_POST['tid'];


  $queryYourUID = "SELECT *
  FROM user
  WHERE username = '$username'";

  $resultYourUID = mysqli_query($con, $queryYourUID)
  or die('Query failed: '. mysqli_error($con));

  while ($row=mysqli_fetch_array($resultYourUID, MYSQLI_ASSOC))
  {
    $yourUid = $row["uid"];
  }
  $queryComment = "INSERT into comment values(null,'$yourUid', '$parentTid', '$commentBody', NOW())";

  $resultComment = mysqli_query($con, $queryComment)
  or die('Query failed: '. mysqli_error($con));


  echo "<br>";
  echo "<a href=\"../utils/logout.php\'><button> Logout</button></a>";
  mysqli_free_result($result);
  mysqli_close($con);


  ?>



</body>
</html>
