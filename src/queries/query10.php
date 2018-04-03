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

  //fetch values for parent tweet id and comment id
  $parentTid = $_POST['tid'];
  $commentID = $_POST['cid'];

  $deleteComment = "DELETE from comment where cid = '$commentID' and uid = '$yourUid' and tid = '$parentTid'";

  $resultComment = mysqli_query($con, $deleteComment)
  or die('Query failed: '. mysqli_error($con));


  echo "<br>";
  echo "<a href=\"../utils/logout.php\'><button> Logout</button></a>";
  mysqli_free_result($result);
  mysqli_close($con);


  ?>



</body>
</html>
