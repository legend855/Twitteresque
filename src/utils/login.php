<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
</head>

<body>

<?php

    session_start();
    require('connect.php');

    // has form been submitted?
    if(isset($_POST['username']) and isset($_POST['pw']) ){
        $username = $_POST['username'];
        $password = $_POST['pw'];

        // check if the username & pw values exist in database
        $query = "SELECT * FROM user
                  WHERE username='$username' and password='$password'";

        $result = mysqli_query($con, $query)
                    or die(mysqli_error($con) );
        $count = mysqli_num_rows($result);
        while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          $yourUid = $row["uid"];
        }
        // if values exist and are the same, start a session for said user
        if($count == 1){
            $_SESSION['username'] = $username;
        }
        else {
            // credentials do not match
            $fmsg = "Invalid log in credentials";
        }

        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "Hi $username . ";
            echo "<br>";

        }

    }

    // mysqli_close($con);

?>

</body>
</html>
