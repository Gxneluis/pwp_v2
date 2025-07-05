<?php
session_start();

$_SESSION['type_asn'] = false;
$_SESSION['type_sub'] = false;
$_SESSION['type_grp'] = false;

$header ='
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css_login.css">
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/js_pwp_usr.js" ></script>
</head>
<body>
<img src="includes/img/qpmiLogoPng.PNG" alt="Quanta" class="logo">
	<div id="idDiv_login" class="cDiv">
		<form action="php_usrLgn.php" method="post">
			<h3>Log in</h3>
			<span>Username</span>
			<span><input type="text" id="idUName" name="uName" ></span><br /><br />
			<span>Password</span>
			<span><input type="password" id="idPWord" name="pWord" ></span><br /><br />
			<input type="submit">
		</form>
	</div>
';

$footer = '
</body>
</html>';

echo $header.$footer;
