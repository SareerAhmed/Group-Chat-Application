<?php
session_start();
date_default_timezone_set("asia/karachi");
require("require/connection.php");
$time = time();
$query = "UPDATE user SET is_online=0,log_time='{$time}' WHERE user_id=".$_SESSION['user']['user_id'];

$result = mysqli_query($connect,$query);

if ($result) {
 
    session_destroy();

    header("location:index.php?msg=Logged Out !...");

}


?>