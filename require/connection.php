<?php
mysqli_report(MYSQLI_REPORT_OFF);

$connect = mysqli_connect("localhost",'root','','group_chat_application');

if (mysqli_connect_error()) {
	
	die("<h1>Database Connection Failed!..</h1>");
}

?>