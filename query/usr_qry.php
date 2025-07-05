<?php
// User Account Queries
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST['type']==2){
	// Change Password
	$empId = $_SESSION["empId"];
	$oldPassword = mysqli_real_escape_string($conn, $_POST["oldPassword"]);
	$newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"]);
	$reNPassword = mysqli_real_escape_string($conn, $_POST["reNPassword"]);
	$eOldPass = md5($oldPassword);
	$eNewPass = md5($newPassword);
	$eReNPass = md5($reNPassword);
	if($eNewPass == $eReNPass){
		$qry="UPDATE `accounts` SET `password`='$eNewPass' WHERE `id` = '$empId' AND `password` = '$eOldPass'";
		$qryRes = $conn->query($qry);
		echo json_encode ($aPWP);
	}else{
		echo 0;
	}
}

?>