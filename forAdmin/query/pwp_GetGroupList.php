<?php
require_once '../../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

$aPWP = array();

if($_POST['Type']==1){
	$query="SELECT * FROM pwpgrouping AS pga LEFT JOIN accounts ON pga.employeeId = accounts.ID";

	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['assignId'] = $aQueRes["id"];
		$data['employeeId'] = $aQueRes["employeeId"];
		$data['groupId'] = $aQueRes["groupId"];
		$data['subGroupId'] = $aQueRes["subGroupId"];
		$data['Name'] = $aQueRes["firstName"]." ".$aQueRes["middleName"]." ".$aQueRes["lastName"];

		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
else if($_POST['Type']==2){
	$query="SELECT * FROM pwpgroupdetails";

	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['groupId'] = $aQueRes["id"];
		$data['groupName'] = $aQueRes["groupName"];
		$data['groupDetails'] = $aQueRes["groupDetails"];
		$usrId = $aQueRes["approvers"];
		$data["approvers"] = $aQueRes["approvers"];

			$qryusr="SELECT * FROM `accounts` WHERE `id` = '$usrId'";
			$queusrres=$conn->query($qryusr);
			$aqueusrres=mysqli_fetch_array($queusrres);
			$data["usrNam"]=$aqueusrres['firstName']." ".$aqueusrres['lastName'];
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
else if($_POST['Type']==3){
	$query="SELECT * FROM pwpsubgroupdetails";

	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['subGroupId'] = $aQueRes["id"];
		$data['subGroupName'] = $aQueRes["subGroupName"];
		$data['subGroupDetails'] = $aQueRes["subGroupDetails"];
		$data['reviewer'] = $aQueRes["reviewer"];
		$data['groupId'] = $aQueRes["groupId"];
		$usrId = $aQueRes["reviewer"];

			$qryusr="SELECT * FROM `accounts` WHERE `id` = '$usrId'";
			$queusrres=$conn->query($qryusr);
			$aqueusrres=mysqli_fetch_array($queusrres);
			$data["usrNam"]=$aqueusrres['firstName']." ".$aqueusrres['lastName'];
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
else if($_POST['Type']==4){
	$query="SELECT * FROM accounts ORDER BY firstName,lastName";

	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['employeeId'] = $aQueRes["id"];
		$data['Name'] = $aQueRes["firstName"]." ".$aQueRes["middleName"]." ".$aQueRes["lastName"];
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
?>
