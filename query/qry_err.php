<?php
// User Account Queries
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST['type']=="A1"){
	// Change Password
	$empId = $_SESSION["empId"];
	$shttpReq = mysqli_real_escape_string($conn, $_POST["httpReq"]);
	$serrSts = mysqli_real_escape_string($conn, $_POST["errSts"]);
	$serrMsg = mysqli_real_escape_string($conn, $_POST["errMsg"]);
	$qry="INSERT INTO `errlog` (`empId`,`httpReq`,`errSts`,`errMsg`) VALUES ($empId,'$shttpReq','$serrSts','$serrMsg')";
	$qryRes = $conn->query($qry);
	echo json_encode ($qryRes);
}

?>
