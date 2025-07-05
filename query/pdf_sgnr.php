
<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$aPWP = array();

if($_POST['type']==1){
	$reqId = $_POST['requestID'];
	$qry="SELECT firstName,lastName,signature FROM `pwprequest` LEFT JOIN accounts ON accounts.id = pwprequest.empID WHERE pwprequest.id = '$reqId' ";
	$queRes=$conn->query($qry);
	$aQueRes=mysqli_fetch_array($queRes);
	$aPWP['empName'] = $aQueRes["firstName"]." ".$aQueRes["lastName"];
	$aPWP['signature'] = $aQueRes["signature"];

	echo json_encode ($aPWP);
}
elseif($_POST['type']==2){
	$reqId = $_POST['requestID'];
	$qry="SELECT firstName,lastName,signature FROM `pwpstatus` LEFT JOIN accounts ON accounts.id = pwpstatus.reviewer WHERE `requestId` = '$reqId'";
	$queRes=$conn->query($qry);
	$aQueRes=mysqli_fetch_array($queRes);
	$aPWP['empName'] = $aQueRes["firstName"]." ".$aQueRes["lastName"];
	$aPWP['signature'] = $aQueRes["signature"];

	echo json_encode ($aPWP);
}
elseif($_POST['type']==3){
	$reqId = $_POST['requestID'];
	$qry="SELECT firstName,lastName,signature FROM `pwpstatus` LEFT JOIN accounts ON accounts.id = pwpstatus.approver WHERE `requestId` = '$reqId'";
	$queRes=$conn->query($qry);
	$aQueRes=mysqli_fetch_array($queRes);
	$aPWP['empName'] = $aQueRes["firstName"]." ".$aQueRes["lastName"];
	$aPWP['signature'] = $aQueRes["signature"];

	echo json_encode ($aPWP);
}
elseif($_POST['type']==4){
	$empId = $_POST['empId'];
	$qry="SELECT firstName,lastName,signature FROM accounts WHERE `id` = '$empId'";
	$queRes=$conn->query($qry);
	$aQueRes=mysqli_fetch_array($queRes);
	$aPWP['empName'] = $aQueRes["firstName"]." ".$aQueRes["lastName"];
	$aPWP['signature'] = $aQueRes["signature"];

	echo json_encode ($aPWP);
}
elseif($_POST['type']==5){
	$reqId = $_POST['requestID'];
	$qry="SELECT firstName,lastName,signature FROM `pwpstatus` LEFT JOIN accounts ON accounts.id = pwpstatus.signer1 WHERE `requestId` = '$reqId'";
	$queRes=$conn->query($qry);
	$aQueRes=mysqli_fetch_array($queRes);
	$aPWP['empName'] = $aQueRes["firstName"]." ".$aQueRes["lastName"];
	$aPWP['signature'] = $aQueRes["signature"];

	echo json_encode ($aPWP);
}
