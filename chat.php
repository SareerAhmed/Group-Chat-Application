<?php
session_start();
if (!isset($_SESSION['user'])) {
	
	header("location:index.php?msg=Please Login First!...");	
}

$user = $_SESSION['user'];

?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user['first_name']." ".$user['last_name']; ?></title>
	<style type="text/css">
		#heading_2{
			background-color: teal;
			color: white;
			padding: 10px;
			border-radius: 10px;
		}
		#profile_image{
			width: 50px;
			height: 50px;
			border-radius: 50%;
		}
		#logout_btn{
			float: right;
			background-color: white;
			padding: 10px;
			border-radius: 10px;
		}
		#logout_btn a{
			text-decoration: none;
		}
		#show_chat{
			background-color: gray;
			height: 400px;
			padding: 5px;
			border-radius: 5px;
			border:1px solid teal;
			overflow-y: auto;
		}
		#send_message{
			width: 90%;
			height: 40px;
			padding: 5px;
			margin-top: 10px;
			border:1px solid teal;
			border-radius: 10px;
		}
		#send_btn{
			width: 70px;
			height: 50px;
			font-weight: bold;
			background-color: teal;
			color: white;
			border-radius: 10px;
		}
		#sender{
			background-color: white;
			color: teal;
			border-radius: 10px;
			padding: 8px;
			float: left;
			width: 70%;
		}
		#sender_name{
			background-color: teal;
			color: white;
			padding: 5px;
			border-radius: 10px;
			margin-right: 10px;	
		}
		#reciever{
			background-color: teal;
			color: white;
			border-radius: 10px;
			padding: 8px;
			float: right;
			width: 70%;
		}
		#reciever_name{
			background-color: white;
			color: teal;
			padding: 5px;
			border-radius: 10px;
			margin-right: 10px;	
		}
		#time{
			float: right;
		}
		#users{
			border:1px solid teal;
			height: 550px;
			border-radius: 3px;
			overflow-y: auto;
		}
		#users_heading{
			background-color: teal;
			color: white;
			padding: 10px;
			text-align: center;
			font-size: 25px;
			font-weight: bold;
		}
		#user_status{
			background-color: gray;
			color: white;
			padding: 10px;
			margin:10px;
			border-radius: 10px;
		}

	</style>
	<script type="text/javascript">

		setInterval(function(){
			showMessages();
			showAllUsers();
		},1000);
		showMessages();
		showAllUsers();
	//-----<< Send Message>>-----
		function sendMessage(){

			var message = document.getElementById('send_message').value;
			// alert(message);
			var obj;
			if (window.XMLHttpRequest) {
				obj = new XMLHttpRequest();
			}else{
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			}
			obj.onreadystatechange = function(){

				if (obj.readyState == 4 && obj.status == 200 && obj.statusText =="OK") {
					// alert(obj.responseText);
					document.getElementById('send_message').value = "";
					showMessages();
				}
			}

			obj.open("POST","ajax_process.php");
			obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
			obj.send("action=send_message&message="+message);
		}
	//-----<< Show Message>>-----
		function showMessages(){

				var obj;
				if (window.XMLHttpRequest) {
					obj = new XMLHttpRequest();
				}else{
					obj = new ActiveXObject("Microsoft.XMLHTTP");
				}
				obj.onreadystatechange = function(){

					if (obj.readyState == 4 && obj.status == 200 && obj.statusText =="OK") {
						// alert(obj.responseText);
						document.getElementById('show_chat').innerHTML = obj.responseText;
					}
				}

				obj.open("GET","ajax_process.php?action=show_messages");
				obj.send();
			}
	//-----<< Show All Users>>-----
		function showAllUsers(){

				var obj;
				if (window.XMLHttpRequest) {
					obj = new XMLHttpRequest();
				}else{
					obj = new ActiveXObject("Microsoft.XMLHTTP");
				}
				obj.onreadystatechange = function(){

					if (obj.readyState == 4 && obj.status == 200 && obj.statusText =="OK") {
						// alert(obj.responseText);
						document.getElementById('all_users').innerHTML = obj.responseText;
					}
				}

				obj.open("GET","ajax_process.php?action=show_users");
				obj.send();
			}
		</script>
</head>
<body>
	<h1 style="background-color: purple;color: white;text-align: center;padding: 5px;border-radius: 10px;">AJAX Group Chat Application</h1>

	<table style="width: 100%;">
		<tr>
			<td style="width: 70%;">
				<h2 id="heading_2">
					<span >
						<img id="profile_image" src="images/<?php echo $user['user_profile']; ?>">
					</span>
					<?php echo $user['first_name']." ".$user['last_name']; ?>
					<span id="logout_btn">
						<a href="logout.php">
							Logout
						</a>
					</span>
				</h2>
				<div id="show_chat"></div>
				<input type="text" id="send_message" placeholder="Message type here...">
				<button id="send_btn" onclick="sendMessage()">Send</button>
			</td>

			<td style="width: 20%;">
				<div id="users">
					<div id="users_heading">
						Users
					</div>
					<div id="all_users"></div>
					
				</div>
			</td>
		</tr>
	</table>

</body>
</html>