<?php
session_start();

$_SESSION['type_asn'] = false;
$_SESSION['type_sub'] = false;
$_SESSION['type_grp'] = false;

// $header ='
?>
<!DOCTYPE html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="css/css_login.css"> -->
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>
	  function validatePassword(){
			nPass = document.getElementById("idNPsswrd").value;
			console.log(nPass);
		}
	</script>
</head>
<body>
<!-- <img src="includes/img/qpmiLogoPng.PNG" alt="Quanta" class="logo"> -->
	<div id="idDiv_login" class="cDiv">
		<!-- <form action="usr_SavPsw.php" method="post"> -->
			<h3>Change Password</h3>
			<span>Old Password</span>
			<span><input type="password" id="idOPsswrd" name="oPsswrd" ></span><br /><br />
			<span>New Password</span>
			<span><input type="password" id="idNPsswrd" name="nPsswrd" ></span><br /><br />
			<span>Re-enter Password</span>
			<span><input type="password" id="idRPsswrd" name="rPsswrd" ></span><br /><br />
			<button onclick="validatePassword()">Change</button>
		</form>
	</div>
<!-- '; -->

<!-- $footer = ' -->
</body>
</html>
<!-- '; -->

<!-- echo $header.$footer; -->
