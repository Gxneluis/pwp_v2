<?php
session_start();
require_once 'nav_bar.php';
?>
<!DOCTYPE html>
<head>
	<style><?php include 'css/css_usr.css'; ?></style>
</head>
<body>
<br /><br /><br />
	<div>
		<form action="query/usr_chng_pswrd.php" method="POST" >
			<br />Old Password
			<br /><input type="password" name="oPsswrd" id="idOPsswrd" >
			<br />New Password
			<br /><input type="password" name="nPsswrd" id="idNPsswrd" >
			<br />Re-enter Password
			<br /><input type="password" name="rPsswrd" id="idRPsswrd" >
			<br /><input type="submit" value="Change Password" name="submit">
		</form>
	</div>
</body>
</html>
