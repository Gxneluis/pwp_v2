
<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
$empId = $_SESSION['empId'];

$oPsswrd = $_POST['oPsswrd'];
$nPsswrd = $_POST['nPsswrd'];
$rPsswrd = $_POST['rPsswrd'];
$ePass = md5($oPsswrd);
$nPass = md5($nPsswrd);
if($nPsswrd==$rPsswrd){
	$qry="UPDATE `accounts`SET `password` = '$nPass' WHERE `id` = '$empId' AND `password` = '$ePass'";
	$qryRes = $conn->query($qry);
	$aQueRes=mysqli_fetch_array($qryRes);
	header("location:../index.php");
}
else{
		header("location:../usr_chg_psw.php");
}
