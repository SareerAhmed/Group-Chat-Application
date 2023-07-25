<?php
session_start();
require("require/connection.php");

if (isset($_POST['login'])) {
	
	  // echo "<pre>";
	  // print_r($_POST);
	  // echo "</pre>";

	$query ="SELECT * FROM user WHERE email='{$_POST['email']}' AND password ='{$_POST['password']}'";
	$result = mysqli_query($connect,$query);

	if ($result->num_rows>0) {
		
		$user_record = mysqli_fetch_assoc($result);

		// echo "<pre>";
		// print_r($user_record);
		// echo "</pre>";

		$query = "UPDATE user SET is_online=1 WHERE user_id=".$user_record['user_id'];
		$result = mysqli_query($connect,$query);
		if ($result) {
			
			$_SESSION['user'] = $user_record;

			header("location:chat.php");
		}
	}else{
		header("location:index.php?msg=Invalid Email/Password");
	}
}else{
		header("location:index.php?msg=Please Login First!...");

}


?>