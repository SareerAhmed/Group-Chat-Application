<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("location:index.php?msg=Please Login First!...");
}
date_default_timezone_set("asia/karachi");
require("require/connection.php");

$user = $_SESSION['user'];

if (isset($_POST['action']) && $_POST['action'] == "send_message") {
	
	// echo $_POST['message'];
	$time = time();
	$query = "INSERT INTO chat_message (message,user_id,message_time) VALUES('{$_POST['message']}','{$user['user_id']}','{$time}')";

	$result = mysqli_query($connect,$query);

	if ($result) {
		echo "Message Sent...";
	}
}
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'show_messages') {
	
	$query = "SELECT * FROM user,chat_message WHERE user.user_id=chat_message.user_id";
	$result = mysqli_query($connect,$query);

	if ($result->num_rows>0) {
		
		while ($message = mysqli_fetch_assoc($result)) {
			
			// echo "<pre>";
			// print_r($message);
			// echo "</pre>";
			if ($message['user_id'] == $user['user_id']) { ?>
				<p id="sender">
					<span>
						<img id="profile_image" src="images/<?php echo $message['user_profile']; ?>">
					</span>
					<span id="sender_name">
						<?php echo $message['first_name']." ".$message['last_name']; ?>
					</span>
					<?php echo $message['message']; ?>
					<span id="time">
						<?php echo date("h:i:A",$message['message_time']); ?>
					</span>
				</p>
			<?php }else{ ?>

				<p id="reciever">
					<span>
						<img id="profile_image" src="images/<?php echo $message['user_profile']; ?>">
					</span>
					<span id="reciever_name">
						<?php echo $message['first_name']." ".$message['last_name']; ?>
					</span>
					<?php echo $message['message']; ?>
					<span id="time">
						<?php echo date("h:i:A",$message['message_time']); ?>
					</span>
				</p>

		 <?php	}
		}
	}
}
elseif (isset($_GET['action']) && $_GET['action'] == 'show_users') {
	
	$query = "SELECT * FROM user";
	$result = mysqli_query($connect,$query);
	if ($result->num_rows>0) {
		while ($row = mysqli_fetch_assoc($result)) {
			
			if ($row['user_id'] != $user['user_id']) { ?>

				   <p id="user_status">
				   	<span>
				   		<img id="profile_image" src="images/<?php echo $row['user_profile']; ?>">
				   	</span>
				   	  <span style="font-weight: bold;font-size: 18px;">
				   	    <?php echo $row['first_name']." ".$row['last_name']; ?>
				   	</span>
				   	<?php 

				   		if ($row['is_online'] == 1) {
				   			echo "<span style='color:lightgreen;'>Online</span>";
				   		}else{

				   			echo "<span style='color:red;'>Offline</span>";
				   				// die();
				   			// echo mktime(1,0,0,4,10);
				   			$timestamp = $row['log_time'];
				   			$current_time = time();
				   			$seconds = ceil($current_time-$timestamp);

				   			if ($seconds>59) {
				   				
				   				$minutes = ceil($seconds/60);

				   				if ($minutes>59) {
				   					$hours = ceil($minutes/60);

				   					if ($hours>24) {
				   						$days = ceil($hours/24);
				   						if ($days>30) {
				   							
				   							$month = ceil($days/30);
				   						}else{
				   							echo "<br/><span style='color:lightblue;margin-left:50px'> (Last Seen: ".$days." days Ago)</span>";
				   						}
				   					}else{
				   						echo "<br/><span style='color:lightblue;margin-left:50px'>(Last Seen: ".$hours." hours Ago)</span> ";
				   					}

				   				}else{
				   					echo "<br/><span style='color:lightblue;margin-left:50px'> (Last Seen ".$minutes." minutes Ago)</span>";
				   				}
				   			}else{

				   				echo "<br/><span style='color:lightblue;margin-left:50px'> (Last Seen ".$seconds." seconds Ago)</span>";
				   			}
				   		}
				   	?>
				   </p>
				
		 <?php	}
		}
	}

}else{
	header("location:index.php?msg=Please Login First!...");
}

?>