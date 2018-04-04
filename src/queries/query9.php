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
  //fetch values for comment body and tweet id
  $commentBody =  $_POST['comment_body'];
  $parentTid = $_POST['tid'];

  $queryComment = "INSERT into comment values(null,'$yourUid', '$parentTid', '$commentBody', NOW())";

  $resultComment = mysqli_query($con, $queryComment)
  or die('Query failed: '. mysqli_error($con));

  mysqli_free_result($result);
  mysqli_close($con);

}
else{
  echo $fmsg;
}

  session_destroy();
  
  echo "<br>";
  echo "<a href=../utils/logout.php><button> Logout</button></a>";

?>

</body>
</html>
