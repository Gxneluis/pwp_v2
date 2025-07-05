<?php
// require_once 'includes/config.php';
// $db=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
// session_start();
// header("Location:pwpSetGroup.php");
// exit();

include 'pwp_grp_mngr.php';
include 'usr_mngr.php';

$header ='
<html>
<head>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/js_pwp_group.js"></script>
	<script type="text/javascript" src="js/js_usr_mngr.js"></script>
	<link rel="stylesheet" href="css/css_pwp_group.css">
</head>
<body>';


$footer = '
</body>
</html>';


// echo $header.$usr_mngr.$footer;
echo $header.$usr_mngr.$grp_mngr.$footer;