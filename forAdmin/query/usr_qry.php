<?php
// User Account Queries
require_once '../../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST['type']==1){
	if(isset($_POST["employeeId"]) && isset($_POST["firstName"]) && isset($_POST["middleName"]) && isset($_POST["lastName"]) && isset($_POST["position"]) && isset($_POST["department"])){

		if($_POST["employeeId"]==""){ $employeeId = ""; }
			else{ $employeeId = $_POST["employeeId"]; }
		if($_POST["firstName"]==""){ $firstName = ""; }
			else{ $firstName = $_POST["firstName"]; }
		if($_POST["middleName"]==""){ $middleName = ""; }
			else{ $middleName = $_POST["middleName"]; }
		if($_POST["lastName"]==""){ $lastName = ""; }
			else{ $lastName = $_POST["lastName"]; }
		if($_POST["position"]==""){ $position = 4; }
			else{ $position = $_POST["position"]; }
		if($_POST["department"]==""){ $department = 0; }
			else{ $department = $_POST["department"]; }
		$username = strtolower($firstName).strtolower($lastName);
		$password = md5($username);

		$query="INSERT INTO `accounts`(`employeeId`, `firstName`, `middleName`, `lastName`, `position`, `department`, `username`, `password`)
		VALUES ('$employeeId','$firstName','$middleName','$lastName','$position','$department','$username','$password')";
		$resQue = $conn->query($query);

		if ($resQue)
		{
			echo 'User Creation Successful.';
		}
		else
		{
			echo "error: ".mysqli_error($conn);
		}
	}
}
?>
