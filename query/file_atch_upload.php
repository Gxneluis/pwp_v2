
<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
$empId = $_SESSION['empId'];
$reqID = $_POST['reqID'];
$atcTyp = $_POST['atcTyp'];
$tempName = "atch_".sprintf("%05d", $reqID)."_".date("Ymd_His");
$trgt_dir = "../uploads/attachment/";
$uploadOk = 1;
$fileDtl = $_FILES['fileAtchUpload']['name'];
$path = $_FILES['fileAtchUpload']['name'];
$extension = pathinfo($path, PATHINFO_EXTENSION);
$trgt_file = $trgt_dir.$tempName.'.'.$extension;
$save_file = "uploads/attachment/".$tempName.'.'.$extension;
if(move_uploaded_file($_FILES['fileAtchUpload']['tmp_name'], $trgt_file)){
	$qry="INSERT INTO `pwpfile` (`requestId`, `fileName`, `fileDtl`, `FileType`, `crtBy`, `updBy`)
VALUES ($reqID, '$save_file', '$fileDtl', '$atcTyp', $empId, $empId)";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $conn->insert_id;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
}else{
	echo 'Your file was not uploaded please try again here are your debug informations: '.print_r($_FILES);
}
header("location:../pwp_sales_atch.php?reqId=".$reqID);
