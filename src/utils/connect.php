
<?php

        $con = mysqli_connect('localhost', 'root', '') 
                or die ('Could not connect: ' . mysqli_error());
        echo 'Connected successfully<br><br>';

        $mydb = mysqli_select_db ($con,'twitteresque') 
                or die ('Could not select database');
                
?>