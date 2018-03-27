
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Query 7</title>
</head>


<body>
<?php

    // after log in, we retain user's details in variables
    require('../utils/login.php');

    // find a user's id and return it
    function getUserID($con, $username) {
        $qu = "SELECT uid FROM user WHERE username='$username'";
        $res = mysqli_query($con, $qu);
        $id = mysqli_fetch_row($res);
        return $id[0]; 
    }

    // get tweet contents from input
    $tweet = $_POST['tweet_body'];
    $date = date("Y-m-d h:i:s");
    $user_id = getUserID($con, $username);

    $query = "INSERT INTO twitts (uid, body, post_time)
                VALUES ('$user_id', '$msg', '$date')";
    
    $result = mysqli_query($con, $query)
                or die('Query failed: '. mysqli_error($con));

    if($result == true) {
        echo "Tweet posted Successfully!";
    } else {
        echo "Failed to post tweet";
    }

    mysqli_free_result($result);
    mysqli_close($con);
    
    require('../utils/logout.php');
?>

    
    
</body>
</html>