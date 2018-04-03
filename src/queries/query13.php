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

if($validUser){

  //fetch value for tid
  $tid = $_POST['tid'];

  $deleteComment = "DELETE from twitts where tid = '$tid' and uid = '$yourUid'";

  $resultComment = mysqli_query($con, $deleteComment)
  or die('Query failed: '. mysqli_error($con));


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
