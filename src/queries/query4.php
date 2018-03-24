<html>
<body>
<?php
  
  require('../utils/connect.php');

  $user =  $_POST["user"];
  /*
  $con = mysqli_connect('localhost', 'root', '')
    or die ('Could not connect: ' . mysqli_error());
  
  $mydb = mysqli_select_db ($con,'twitteresque') or die ('Could not select database');
  */
  
  $query = "SELECT * FROM twitts 
            WHERE uid = (SELECT uid FROM user
                         WHERE username = '".$user."')" ;
  $result = mysqli_query($con,$query) or die ('Query failed: ' . mysqli_error($con));
  
  while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
    echo $row["body"];
    echo '<br><br>';
  }
  
  mysqli_free_result($result);
  mysqli_close($con);
?>
</body>
</html>
