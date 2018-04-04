<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Query 11</title>
</head>


<body>
  <?php

  require('../utils/login.php');

  if($validUser){
    $newPassword = $_POST['new_pw'];

    $queryUser = "UPDATE user
                  SET password = '$newPassword'
                  WHERE uid = $yourUid";

    $resultUser = mysqli_query($con, $queryUser)
    or die('Query failed: '. mysqli_error($con));


    echo "<br>";
    echo "Password successfully changed <br>";
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
