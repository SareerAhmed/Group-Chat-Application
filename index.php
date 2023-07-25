<?php
session_start();

if (isset($_SESSION['user'])) {
	header("location:chat.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>

	<center>
		<form action="login_process.php" method="POST">
			<table style="border: 1px solid;padding: 10px;">
				<?php
					if (isset($_REQUEST['msg'])) {
						
						echo "<tr><td colspan='2' style='color:red;'>".$_REQUEST['msg']."</td></tr>";
					}
				?>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email"/></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password"/></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="login" value="Login" /></td>
				</tr>
			</table>
	    </form>
	</center>

</body>
</html>