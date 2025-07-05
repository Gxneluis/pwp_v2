
<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
$empId = $_SESSION['empId'];

$qry="SELECT * FROM accounts WHERE `id` = '$empId' ";
$qryRes = $conn->query($qry);
$aQueRes=mysqli_fetch_array($qryRes);

$eSigCtr = $aQueRes["eSigCtr"]+1;

$tempName = "esig_".sprintf("%05d", $empId)."_".sprintf("%02d", $eSigCtr);
$trgt_dir = "../uploads/signature/";
$trgt_file = $trgt_dir.$tempName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($trgt_file,PATHINFO_EXTENSION));

if(isset($_POST['submit'])){
	$check = getimagesize($_FILES['fileSigUpload']['tmp_name']);
	if($check != false){
		echo "File is an image - ".$check['mime'];
	}else{
		$uploadOk = 0;
		echo "Not an Image";
	}
}
if(move_uploaded_file($_FILES['fileSigUpload']['tmp_name'], $trgt_file)){
	$qry="UPDATE `accounts` SET `eSigCtr`='$eSigCtr',`signature`='$tempName' WHERE `id` = '$empId'";
	$qryRes = $conn->query($qry);
}else{
	echo 'Your file was not uploaded please try again here are your debug informations: '.print_r($_FILES);
}
header("location:../usr_chg_sig.php");