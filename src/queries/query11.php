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

  require('../utils/connect.php');

  $username =  $_POST['username'];
  $password =  $_POST['pw'];
  $email =  $_POST['email'];
  $location =  $_POST['location'];

  $queryUser = "INSERT into user values(null,'$username', '$password', '$email', '$location', NOW())";

  $resultUser = mysqli_query($con, $queryUser)
  or die('Query failed: '. mysqli_error($con));


  echo "<br>";
  echo "New user successfully created <br>";
  echo "<a href=\"../utils/logout.php\'><button> Logout</button></a>";
  mysqli_close($con);


  ?>



</body>
</html>
