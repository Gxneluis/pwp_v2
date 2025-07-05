<?php
require_once '../../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST['type']==1){
	if(isset($_POST["groupName"]) && isset($_POST["groupDetails"]) && isset($_POST["approvers"])){
		$groupName = $_POST["groupName"];
		$groupDetails = $_POST["groupDetails"];
		$approvers = $_POST["approvers"];

		$query="INSERT INTO `pwpgroupdetails`(`groupName`, `groupDetails`, `approvers`) VALUES ('$groupName','$groupDetails','$approvers')";
		$resQue = $conn->query($query);

		if ($resQue)
		{
			echo 'Group Creation Successful.';
		}
		else
		{
			echo "error: ".mysqli_error($conn);
		}
	}
}
else if($_POST['type']==2){
	if(isset($_POST["subGroupName"]) && isset($_POST["subGroupDetails"]) && isset($_POST["reviewer"]) && isset($_POST["groupId"])){
		$subGroupName = $_POST["subGroupName"];
		$subGroupDetails = $_POST["subGroupDetails"];
		$reviewer = $_POST["reviewer"];
		$groupId = $_POST["groupId"];

		$query="INSERT INTO `pwpsubgroupdetails`(`subGroupName`, `subGroupDetails`, `reviewer`, `groupId`) VALUES ('$subGroupName','$subGroupDetails','$reviewer','$groupId')";
		$resQue = $conn->query($query);

		if ($resQue)
		{
			echo 'Creation of Sub Group Successful.';
		}
		else
		{
			echo "error: ".mysqli_error($conn);
		}
	}
}
else if($_POST['type']==3){
	if(isset($_POST["employeeId"]) && isset($_POST["groupId"]) && isset($_POST["subGroupId"])){
		$employeeId = $_POST["employeeId"];
		$groupId = $_POST["groupId"];
		$subGroupId = $_POST["subGroupId"];

		$query="INSERT INTO `pwpgrouping`(`employeeId`, `groupId`, `subGroupId`) VALUES ('$employeeId','$groupId','$subGroupId')";
		$resQue = $conn->query($query);

		if ($resQue)
		{
			echo 'Assign of Employee Successful.';
		}
		else
		{
			echo "error: ".mysqli_error($conn);
		}
	}
}
?>