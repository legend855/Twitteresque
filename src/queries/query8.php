<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Query 8</title>
</head>


<body>
  <?php
  // after log in, we retain user's details


  require('../utils/login.php');


  $otheruser =  $_POST['otheruser'];


  $queryYourUID = "SELECT *
  FROM user
  WHERE username = '$username'";

  $queryOtherUID = "SELECT *
  FROM user
  WHERE username = '$otheruser'";

  $resultYourUID = mysqli_query($con, $queryYourUID)
  or die('Query failed: '. mysqli_error($con));

  $resultOtherUID = mysqli_query($con, $queryOtherUID)
  or die('Query failed: '. mysqli_error($con));

  while ($row=mysqli_fetch_array($resultYourUID, MYSQLI_ASSOC))
  {
    $yourUid = $row["uid"];
  }

  while ($row=mysqli_fetch_array($resultOtherUID, MYSQLI_ASSOC))
  {
    $otherUid = $row["uid"];
  }

  $queryFollow = "INSERT into follow values('$yourUid', '$otherUid', NOW())";

  $queryUnfollow = "DELETE from follow where follower_id ='$yourUid' and following_id = '$otherUid'";

  if($_POST['follow'] == "follow"){
    $result3 = mysqli_query($con, $queryFollow)
    or die('Error: Already following this user');
    echo "<br>";
    echo "Successfully unfollowed $otheruser";
  }
  else if($_POST['follow'] == "unfollow"){
    $result3 = mysqli_query($con, $queryUnfollow)
    or die('Error: Not following this user');
    echo "<br>";
    echo "Successfully unfollowed $otheruser";
  }


  echo "<br>";
  echo "<a href=\"../utils/logout.php\'><button> Logout</button></a>";
  mysqli_free_result($result);
  mysqli_close($con);


  ?>



</body>
</html>
