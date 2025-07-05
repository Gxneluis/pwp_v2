<?php
// User Account Queries
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST['type']==0){
	$empId = $_SESSION["empId"];
	if($empId!=""){
		$iPrjTyp =0;
		$dDatPWP = mysqli_real_escape_string($conn, $_POST["dDatPWP"]);
		$sActNam = mysqli_real_escape_string($conn, $_POST["sActNam"]);
		$sChaCla = mysqli_real_escape_string($conn, $_POST["sChaCla"]);
		$sTrrtry = mysqli_real_escape_string($conn, $_POST["sTrrtry"]);
		$sActTyp = mysqli_real_escape_string($conn, $_POST["sActTyp"]);
		$iTrdDsc = mysqli_real_escape_string($conn, $_POST["iTrdDsc"]);
		$iDtStrt = mysqli_real_escape_string($conn, $_POST["iDtStrt"]);
		$iDatEnd = mysqli_real_escape_string($conn, $_POST["iDatEnd"]);
		$iEvlDdl = mysqli_real_escape_string($conn, $_POST["iEvlDdl"]);

		$iTtlSal = mysqli_real_escape_string($conn, $_POST["iTtlSal"]);
		$iTtlTrg = 0;
		$iYTDTrg = mysqli_real_escape_string($conn, $_POST["iYTDTrg"]);
		$iYTDAct = mysqli_real_escape_string($conn, $_POST["iYTDAct"]);
		$iTtlDif = 0;
		$iYTDDif = mysqli_real_escape_string($conn, $_POST["iYTDDif"]);
		$iTtlGrw = 0;
		$iYTDAch = trim(mysqli_real_escape_string($conn, $_POST["iYTDAch"]),"%");
		$iBckGrd = mysqli_real_escape_string($conn, $_POST["iBckGrd"]);
		$iPrmTtl = mysqli_real_escape_string($conn, $_POST["iPrmTtl"]);
		$iObjtve = mysqli_real_escape_string($conn, $_POST["iObjtve"]);
		$iMchncs = mysqli_real_escape_string($conn, $_POST["iMchncs"]);
		$iCncsns = mysqli_real_escape_string($conn, $_POST["iCncsns"]);
		$iRskInv = mysqli_real_escape_string($conn, $_POST["iRskInv"]);
		$idPrjtdSale = mysqli_real_escape_string($conn, $_POST["idPrjtdSale"]);
		$idPrjtdCost = mysqli_real_escape_string($conn, $_POST["idPrjtdCost"]);
		$idCostToSalesRatio = mysqli_real_escape_string($conn, $_POST["idCostToSalesRatio"]);
		$idTtlPrjCst = mysqli_real_escape_string($conn, $_POST["idTtlPrjCst"]);
		$idPrjtdSale = str_replace(',','',$idPrjtdSale);
		$idPrjtdCost = str_replace(',','',$idPrjtdCost);

		if(mysqli_real_escape_string($conn, $_POST["iMontDA"])===''){
			$iMontDA = 0;
		}else{
			$iMontDA = mysqli_real_escape_string($conn, $_POST["iMontDA"]);
		}
		if(mysqli_real_escape_string($conn, $_POST["iPWPSNo"])===''){
			$iPWPSNo = 0;
		}else{
			$iPWPSNo = mysqli_real_escape_string($conn, $_POST["iPWPSNo"]);
		}
		if(mysqli_real_escape_string($conn, $_POST["iCstCnt"])===''){
			$iCstCnt = 0;
		}else{
			$iCstCnt = mysqli_real_escape_string($conn, $_POST["iCstCnt"]);
		}

		$qry="INSERT INTO `pwprequest`
		( `empID`, `pwpDate`, `accountName`, `channelClass`, `territory`, `projType`, `activityType`, `tradeDisc`, `da`, `pwpSeries`, `costCenter`, `promoFrom`, `promoTo`, `postPromoEval`, `prvSal`, `curTrg`, `ytdTrg`, `ytdAct`, `ttlDif`, `ttlGrw`, `ytdDif`, `ytdAch`, `background`, `promoTitle`, `objectives`, `mechanics`, `concession`, `risks`, `totProjCost`, `projectedSales`, `projectedCost`, `cToSRatio`, `createdBy`,`lastModifiedBy`)
		VALUES ('$empId', '$dDatPWP', '$sActNam', '$sChaCla', '$sTrrtry', '$iPrjTyp', '$sActTyp', '$iTrdDsc', '$iMontDA', '$iPWPSNo', '$iCstCnt', '$iDtStrt', '$iDatEnd', '$iEvlDdl', '$iTtlSal', '$iTtlTrg', '$iYTDTrg', '$iYTDAct', '$iTtlDif', '$iTtlGrw', '$iYTDDif', '$iYTDAch', '$iBckGrd', '$iPrmTtl', '$iObjtve', '$iMchncs', '$iCncsns', '$iRskInv', '$idTtlPrjCst', '$idPrjtdSale', '$idPrjtdCost', '$idCostToSalesRatio', '$empId', '$empId')";
		$qryRes = $conn->query($qry);
		if ($qryRes)
		{
			echo $conn->insert_id;
		}
		else
		{
			echo "error: ".mysqli_error($conn);
		}
	}
	else
	{
		echo "error: Session Expired";
	}
}
elseif($_POST['type']==1){

	$requestId = mysqli_real_escape_string($conn, $_POST["iReqId"]);
	$aCateBrand = $_POST["aCateBrand"];
	$aAMSInCase = $_POST["aAMSInCase"];
	$aAMSPesVal = $_POST["aAMSPesVal"];
	$aITSInCase = $_POST["aITSInCase"];
	$aITSPesVal = $_POST["aITSPesVal"];
	$aMAIInCase = $_POST["aMAIInCase"];
	$aMAIPesVal = $_POST["aMAIPesVal"];
	$aTPDInCase = $_POST["aTPDInCase"];
	$aTPDPesVal = $_POST["aTPDPesVal"];
	$aResult = [];

	for($count = 0; $count<count($aCateBrand); $count++) {
		if(mysqli_real_escape_string($conn, $aCateBrand[$count])==='-' || mysqli_real_escape_string($conn, $aCateBrand[$count])==='') { $cateBrand="NULL"; }
		else { $cateBrand=mysqli_real_escape_string($conn, $aCateBrand[$count]); }

		if(mysqli_real_escape_string($conn, $aAMSInCase[$count])==='-' || mysqli_real_escape_string($conn, $aAMSInCase[$count])==='') { $amsInCase=0.0; }
		else { $amsInCase=mysqli_real_escape_string($conn, $aAMSInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aAMSPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aAMSPesVal[$count])==='') { $amsPesVal=0.0; }
		else { $amsPesVal=mysqli_real_escape_string($conn, $aAMSPesVal[$count]); }

		if(mysqli_real_escape_string($conn, $aITSInCase[$count])==='-' || mysqli_real_escape_string($conn, $aITSInCase[$count])==='') { $itsInCase=0.0; }
		else { $itsInCase=mysqli_real_escape_string($conn, $aITSInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aITSPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aITSPesVal[$count])==='') { $itsPesVal=0.0; }
		else { $itsPesVal=mysqli_real_escape_string($conn, $aITSPesVal[$count]); }

		if(mysqli_real_escape_string($conn, $aMAIInCase[$count])==='-' || mysqli_real_escape_string($conn, $aMAIInCase[$count])==='') { $maiInCase=0.0; }
		else { $maiInCase=mysqli_real_escape_string($conn, $aMAIInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aMAIPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aMAIPesVal[$count])==='') { $maiPesVal=0.0; }
		else { $maiPesVal=mysqli_real_escape_string($conn, $aMAIPesVal[$count]); }

		if(mysqli_real_escape_string($conn, $aTPDInCase[$count])==='-' || mysqli_real_escape_string($conn, $aTPDInCase[$count])==='') { $tpdInCase=0.0; }
		else { $tpdInCase=mysqli_real_escape_string($conn, $aTPDInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aTPDPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aTPDPesVal[$count])==='') { $tpdPesVal=0.0; }
		else { $tpdPesVal=mysqli_real_escape_string($conn, $aTPDPesVal[$count]); }

		$qry = "INSERT INTO `pwppva`(`requestId`, `cateBrand`, `amsInCase`, `amsPeso`, `itsInCase`, `itsPeso`, `maiInCase`, `maipvPeso`, `tpdInCase`, `tpdPeso`) VALUES ($requestId,'$cateBrand',$amsInCase,$amsPesVal,$itsInCase,$itsPesVal,$maiInCase,$maiPesVal,$tpdInCase,$tpdPesVal)";
		$qryRes = $conn->query($qry);
		if ($qryRes)
		{
			array_push($aResult, $qryRes);
		}
		else
		{
			array_push($aResult, "error: ".mysqli_error($conn));
		}
	}
}
elseif($_POST['type']==2){
	$requestId = mysqli_real_escape_string($conn, $_POST["iReqId"]);
	$aItmDsc = $_POST["aItmDsc"];
	$aItmQty = $_POST["aItmQty"];
	$aItmUnt = $_POST["aItmUnt"];
	$aItmTtl = $_POST["aItmTtl"];
	$aExpDsc = $_POST["aExpDsc"];
	$aExpQty = $_POST["aExpQty"];
	$aExpUnt = $_POST["aExpUnt"];
	$aExpTtl = $_POST["aExpTtl"];
	$aResult = [];

	for($count = 0; $count<count($aItmDsc); $count++) {
		if(mysqli_real_escape_string($conn, $aItmDsc[$count])==='-' || mysqli_real_escape_string($conn, $aItmDsc[$count])==='') { $itemDesc="NULL"; }
		else { $itemDesc=mysqli_real_escape_string($conn, $aItmDsc[$count]); }

		if(mysqli_real_escape_string($conn, $aItmQty[$count])==='-' || mysqli_real_escape_string($conn, $aItmQty[$count])==='') { $pcQty=0.0; }
		else { $pcQty=mysqli_real_escape_string($conn, $aItmQty[$count]); }

		if(mysqli_real_escape_string($conn, $aItmUnt[$count])==='-' || mysqli_real_escape_string($conn, $aItmUnt[$count])==='') { $pcUnitCost=0.0; }
		else { $pcUnitCost=mysqli_real_escape_string($conn, $aItmUnt[$count]); }

		if(mysqli_real_escape_string($conn, $aItmTtl[$count])==='-' || mysqli_real_escape_string($conn, $aItmTtl[$count])==='') { $pcTotalCost=0.0; }
		else { $pcTotalCost=mysqli_real_escape_string($conn, $aItmTtl[$count]); }

		if(mysqli_real_escape_string($conn, $aExpDsc[$count])==='-' || mysqli_real_escape_string($conn, $aExpDsc[$count])==='') { $expenseDesc=0.0; }
		else { $expenseDesc=mysqli_real_escape_string($conn, $aExpDsc[$count]); }

		if(mysqli_real_escape_string($conn, $aExpQty[$count])==='-' || mysqli_real_escape_string($conn, $aExpQty[$count])==='') { $pceQty=0.0; }
		else { $pceQty=mysqli_real_escape_string($conn, $aExpQty[$count]); }

		if(mysqli_real_escape_string($conn, $aExpUnt[$count])==='-' || mysqli_real_escape_string($conn, $aExpUnt[$count])==='') { $pceUnitCost=0.0; }
		else { $pceUnitCost=mysqli_real_escape_string($conn, $aExpUnt[$count]); }

		if(mysqli_real_escape_string($conn, $aExpTtl[$count])==='-' || mysqli_real_escape_string($conn, $aExpTtl[$count])==='') { $pceTotalCost=0.0; }
		else { $pceTotalCost=mysqli_real_escape_string($conn, $aExpTtl[$count]); }

		$qry = "INSERT INTO `pwppce`(`requestId`, `itemDesc`, `pcQty`, `pcUnitCost`, `pcTotalCost`, `expDscId`, `pceQty`, `pceUnitCost`, `pceTotalCost`) VALUES ($requestId,'$itemDesc',$pcQty,$pcUnitCost,$pcTotalCost,'$expenseDesc',$pceQty,$pceUnitCost,$pceTotalCost)";
		$qryRes = $conn->query($qry);
		if ($qryRes)
		{
			array_push($aResult, $qryRes);
		}
		else
		{
			array_push($aResult, "error: ".mysqli_error($conn));
		}
	}
}
elseif($_POST['type']==3){

	$iReqId = mysqli_real_escape_string($conn, $_POST["iReqId"]);
	$sStatus = mysqli_real_escape_string($conn, $_POST["sStatus"]);

	$qry = "INSERT INTO `pwpstatus`(`requestId`, `status`) VALUES ('$iReqId','$sStatus')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
}
elseif($_POST['type']==4){
	$iReqId = mysqli_real_escape_string($conn, $_SESSION["reqId"]);
	$sStatus = mysqli_real_escape_string($conn, $_POST["sStatus"]);
	$dDateTime = date("Y-m-d h:i:s");
	$qry = "UPDATE `pwpstatus` SET status = '$sStatus', `dateFiled`='$dDateTime' WHERE requestId = '$iReqId'";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
}
elseif($_POST['type']==5){
	$name= $_FILES['file01']['name'];
	$tmp_name = $_FILES['file01']['tmp_name'];
	$sType=$_FILES['file01']['type'];
	$aType=explode("/",$sType);
	$type=$aType[1];
	$pwpDate=$_POST["pwpDate"];
	$fileType=$_POST["fileType"];
	$iReqId=$_POST["iReqId"];
	$empId = $_SESSION["empId"];
	$rand = rand(1000,99999);
	$path='uploads/attachment/';
	$newName = $path.$iReqId."_".$pwpDate."_".$rand.".".$type;
	move_uploaded_file($tmp_name, $newName);
	$qry = "INSERT INTO `pwpfile`(`requestId`,`fileName`,`FileType`,`crtBy`,`updBy`) VALUES ('$iReqId','$newName','$fileType','$empId','$empId')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
	echo $newName;
}
elseif($_POST['type']==6){
	$name= $_FILES['file02']['name'];
	$tmp_name = $_FILES['file02']['tmp_name'];
	$pwpDate=$_POST["pwpDate"];
	$fileType=$_POST["fileType"];
	$iReqId=$_POST["iReqId"];
	$empId = $_SESSION["empId"];
	$rand = rand(1000,99999);
	$path='uploads/attachment/';
	$newName = $path.$iReqId."_".$pwpDate."_".$rand.".pdf";
	move_uploaded_file($tmp_name, $newName);

	$qry = "INSERT INTO `pwpfile`(`requestId`,`fileName`,`FileType`,`crtBy`,`updBy`) VALUES ('$iReqId','$newName','$fileType','$empId','$empId')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
	echo $newName;
}
elseif($_POST['type']==7){
	$name= $_FILES['file03']['name'];
	$tmp_name = $_FILES['file03']['tmp_name'];
	$pwpDate=$_POST["pwpDate"];
	$fileType=$_POST["fileType"];
	$iReqId=$_POST["iReqId"];
	$empId = $_SESSION["empId"];
	$rand = rand(1000,99999);
	$path='uploads/attachment/';
	$newName = $path.$iReqId."_".$pwpDate."_".$rand.".pdf";
	move_uploaded_file($tmp_name, $newName);

	$qry = "INSERT INTO `pwpfile`(`requestId`,`fileName`,`FileType`,`crtBy`,`updBy`) VALUES ('$iReqId','$newName','$fileType','$empId','$empId')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
	echo $newName;
}
elseif($_POST['type']==8){
	$name= $_FILES['file04']['name'];
	$tmp_name = $_FILES['file04']['tmp_name'];
	$pwpDate=$_POST["pwpDate"];
	$fileType=$_POST["fileType"];
	$iReqId=$_POST["iReqId"];
	$empId = $_SESSION["empId"];
	$rand = rand(1000,99999);
	$path='uploads/attachment/';
	$newName = $path.$iReqId."_".$pwpDate."_".$rand.".pdf";
	move_uploaded_file($tmp_name, $newName);

	$qry = "INSERT INTO `pwpfile`(`requestId`,`fileName`,`FileType`,`crtBy`,`updBy`) VALUES ('$iReqId','$newName','$fileType','$empId','$empId')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
	echo $newName;
}
elseif($_POST['type']==9){
	$name= $_FILES['file05']['name'];
	$tmp_name = $_FILES['file05']['tmp_name'];
	$pwpDate=$_POST["pwpDate"];
	$fileType=$_POST["fileType"];
	$type=$_POST['file05']['type'];
	$iReqId=$_POST["iReqId"];
	$empId = $_SESSION["empId"];
	$rand = rand(1000,99999);
	$path='uploads/attachment/';
	$newName = $path.$iReqId."_".$pwpDate."_".$rand.".".$type;
	move_uploaded_file($tmp_name, $newName);

	$qry = "INSERT INTO `pwpfile`(`requestId`,`fileName`,`FileType`,`crtBy`,`updBy`) VALUES ('$iReqId','$newName','$fileType','$empId','$empId')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
	echo $newName;
}
elseif($_POST['type']==10){
	$name= $_FILES['file06']['name'];
	$tmp_name = $_FILES['file06']['tmp_name'];
	$pwpDate=$_POST["pwpDate"];
	$fileType=$_POST["fileType"];
	$iReqId=$_POST["iReqId"];
	$empId = $_SESSION["empId"];
	$rand = rand(1000,99999);
	$path='uploads/attachment/';
	$newName = $path.$iReqId."_".$pwpDate."_".$rand.".pdf";
	move_uploaded_file($tmp_name, $newName);

	$qry = "INSERT INTO `pwpfile`(`requestId`,`fileName`,`FileType`,`crtBy`,`updBy`) VALUES ('$iReqId','$newName','$fileType','$empId','$empId')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
	echo $newName;
}
elseif($_POST['type']==11){
	$name= $_FILES['file07']['name'];
	$tmp_name = $_FILES['file07']['tmp_name'];
	$pwpDate=$_POST["pwpDate"];
	$fileType=$_POST["fileType"];
	$iReqId=$_POST["iReqId"];
	$empId = $_SESSION["empId"];
	$rand = rand(1000,99999);
	$path='uploads/attachment/';
	$newName = $path.$iReqId."_".$pwpDate."_".$rand.".pdf";
	move_uploaded_file($tmp_name, $newName);

	$qry = "INSERT INTO `pwpfile`(`requestId`,`fileName`,`FileType`,`crtBy`,`updBy`) VALUES ('$iReqId','$newName','$fileType','$empId','$empId')";
	$qryRes = $conn->query($qry);
	if ($qryRes)
	{
		echo $qryRes;
	}
	else
	{
		echo "error: ".mysqli_error($conn);
	}
	echo $newName;
}
elseif($_POST['type']==12){
	$requestID = $_POST['requestID'];
	$fileType = $_POST['fileType'];
	$query="SELECT * FROM `pwpfile` WHERE `requestId`='$requestID' AND `FileType`='$fileType' AND `active` = true ";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['fileName'] = $aQueRes["fileName"];
		$data['fileDtl'] = $aQueRes["fileDtl"];

		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==13){
	$id = $_POST['id'];
      $qry="UPDATE `pwpfile` SET `active`=false WHERE `id`='$id'";
  	  $qryRes = $conn->query($qry);
    echo $qryRes;
}
elseif($_POST['type']==14){
	$empId = $_SESSION["empId"];
	if($empId!=""){
		$reqId = $_SESSION["reqId"];
		$iPrjTyp =0;
		$dDatPWP = mysqli_real_escape_string($conn, $_POST["dDatPWP"]);
		$sActNam = mysqli_real_escape_string($conn, $_POST["sActNam"]);
		$sChaCla = mysqli_real_escape_string($conn, $_POST["sChaCla"]);
		$sTrrtry = mysqli_real_escape_string($conn, $_POST["sTrrtry"]);
		$sActTyp = mysqli_real_escape_string($conn, $_POST["sActTyp"]);
		$iTrdDsc = mysqli_real_escape_string($conn, $_POST["iTrdDsc"]);
		$iDtStrt = mysqli_real_escape_string($conn, $_POST["iDtStrt"]);
		$iDatEnd = mysqli_real_escape_string($conn, $_POST["iDatEnd"]);
		$iEvlDdl = mysqli_real_escape_string($conn, $_POST["iEvlDdl"]);

		$iTtlSal = mysqli_real_escape_string($conn, $_POST["iTtlSal"]);
		$iTtlTrg = 0;
		$iYTDTrg = mysqli_real_escape_string($conn, $_POST["iYTDTrg"]);
		$iYTDAct = mysqli_real_escape_string($conn, $_POST["iYTDAct"]);
		$iTtlDif = 0;
		$iYTDDif = mysqli_real_escape_string($conn, $_POST["iYTDDif"]);
		$iTtlGrw = 0;
		$iYTDAch = trim(mysqli_real_escape_string($conn, $_POST["iYTDAch"]),"%");
		$iBckGrd = mysqli_real_escape_string($conn, $_POST["iBckGrd"]);
		$iPrmTtl = mysqli_real_escape_string($conn, $_POST["iPrmTtl"]);
		$iObjtve = mysqli_real_escape_string($conn, $_POST["iObjtve"]);
		$iMchncs = mysqli_real_escape_string($conn, $_POST["iMchncs"]);
		$iCncsns = mysqli_real_escape_string($conn, $_POST["iCncsns"]);
		$iRskInv = mysqli_real_escape_string($conn, $_POST["iRskInv"]);
		$idPrjtdSale = mysqli_real_escape_string($conn, $_POST["idPrjtdSale"]);
		$idPrjtdCost = mysqli_real_escape_string($conn, $_POST["idPrjtdCost"]);
		$idCostToSalesRatio = mysqli_real_escape_string($conn, $_POST["idCostToSalesRatio"]);
		$idTtlPrjCst = mysqli_real_escape_string($conn, $_POST["idTtlPrjCst"]);

		if(mysqli_real_escape_string($conn, $_POST["iMontDA"])===''){
			$iMontDA = 0;
		}else{
			$iMontDA = mysqli_real_escape_string($conn, $_POST["iMontDA"]);
		}
		if(mysqli_real_escape_string($conn, $_POST["iPWPSNo"])===''){
			$iPWPSNo = 0;
		}else{
			$iPWPSNo = mysqli_real_escape_string($conn, $_POST["iPWPSNo"]);
		}
		if(mysqli_real_escape_string($conn, $_POST["iCstCnt"])===''){
			$iCstCnt = 0;
		}else{
			$iCstCnt = mysqli_real_escape_string($conn, $_POST["iCstCnt"]);
		}

		$qry="UPDATE `pwprequest` SET `pwpDate` = '$dDatPWP', `accountName` = '$sActNam', `channelClass` = '$sChaCla', `territory` = '$sTrrtry', `projType` = '$iPrjTyp', `activityType` = '$sActTyp', `tradeDisc` = '$iTrdDsc', `da` = '$iMontDA', `pwpSeries` = '$iPWPSNo', `costCenter` = '$iCstCnt', `promoFrom` = '$iDtStrt', `promoTo` = '$iDatEnd', `postPromoEval` = '$iEvlDdl', `prvSal` = '$iTtlSal', `curTrg` = '$iTtlTrg', `ytdTrg` = '$iYTDTrg', `ytdAct` = '$iYTDAct', `ttlDif` = '$iTtlDif', `ttlGrw` = '$iTtlGrw', `ytdDif` = '$iYTDDif', `ytdAch` = '$iYTDAch', `background` = '$iBckGrd', `promoTitle` = '$iPrmTtl', `objectives` = '$iObjtve', `mechanics` = '$iMchncs', `concession` = '$iCncsns', `risks` = '$iRskInv', `totProjCost` = '$idTtlPrjCst', `projectedSales` = '$idPrjtdSale', `projectedCost` = '$idPrjtdCost', `cToSRatio` = '$idCostToSalesRatio', `createdBy` = '$empId', `lastModifiedBy` = '$empId' WHERE `id`='$reqId'";
		$qryRes = $conn->query($qry);
		if ($qryRes)
		{
			echo $conn->insert_id;
		}
		else
		{
			echo "error: ".mysqli_error($conn);
		}
	}
	else
	{
		echo "error: Session Expired";
	}
}
elseif($_POST['type']==15){

	$requestId = $_SESSION["reqId"];
	$aPVAId = $_POST["aPVAId"];
	$aCateBrand = $_POST["aCateBrand"];
	$aAMSInCase = $_POST["aAMSInCase"];
	$aAMSPesVal = $_POST["aAMSPesVal"];
	$aITSInCase = $_POST["aITSInCase"];
	$aITSPesVal = $_POST["aITSPesVal"];
	$aMAIInCase = $_POST["aMAIInCase"];
	$aMAIPesVal = $_POST["aMAIPesVal"];
	$aTPDInCase = $_POST["aTPDInCase"];
	$aTPDPesVal = $_POST["aTPDPesVal"];
	$aResult = [];

	for($count = 0; $count<count($aCateBrand); $count++) {
		if(mysqli_real_escape_string($conn, $aPVAId[$count])==='-' || mysqli_real_escape_string($conn, $aPVAId[$count])==='') { $pvaId=0; }
		else { $pvaId=mysqli_real_escape_string($conn, $aPVAId[$count]); }

		if(mysqli_real_escape_string($conn, $aCateBrand[$count])==='-' || mysqli_real_escape_string($conn, $aCateBrand[$count])==='') { $cateBrand=""; }
		else { $cateBrand=mysqli_real_escape_string($conn, $aCateBrand[$count]); }

		if(mysqli_real_escape_string($conn, $aAMSInCase[$count])==='-' || mysqli_real_escape_string($conn, $aAMSInCase[$count])==='') { $amsInCase=0.0; }
		else { $amsInCase=mysqli_real_escape_string($conn, $aAMSInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aAMSPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aAMSPesVal[$count])==='') { $amsPesVal=0.0; }
		else { $amsPesVal=mysqli_real_escape_string($conn, $aAMSPesVal[$count]); }

		if(mysqli_real_escape_string($conn, $aITSInCase[$count])==='-' || mysqli_real_escape_string($conn, $aITSInCase[$count])==='') { $itsInCase=0.0; }
		else { $itsInCase=mysqli_real_escape_string($conn, $aITSInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aITSPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aITSPesVal[$count])==='') { $itsPesVal=0.0; }
		else { $itsPesVal=mysqli_real_escape_string($conn, $aITSPesVal[$count]); }

		if(mysqli_real_escape_string($conn, $aMAIInCase[$count])==='-' || mysqli_real_escape_string($conn, $aMAIInCase[$count])==='') { $maiInCase=0.0; }
		else { $maiInCase=mysqli_real_escape_string($conn, $aMAIInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aMAIPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aMAIPesVal[$count])==='') { $maiPesVal=0.0; }
		else { $maiPesVal=mysqli_real_escape_string($conn, $aMAIPesVal[$count]); }

		if(mysqli_real_escape_string($conn, $aTPDInCase[$count])==='-' || mysqli_real_escape_string($conn, $aTPDInCase[$count])==='') { $tpdInCase=0.0; }
		else { $tpdInCase=mysqli_real_escape_string($conn, $aTPDInCase[$count]); }

		if(mysqli_real_escape_string($conn, $aTPDPesVal[$count])==='-' || mysqli_real_escape_string($conn, $aTPDPesVal[$count])==='') { $tpdPesVal=0.0; }
		else { $tpdPesVal=mysqli_real_escape_string($conn, $aTPDPesVal[$count]); }

		if($pvaId==0){
			$qry = "INSERT INTO `pwppva`(`requestId`, `cateBrand`, `amsInCase`, `amsPeso`, `itsInCase`, `itsPeso`, `maiInCase`, `maipvPeso`, `tpdInCase`, `tpdPeso`) VALUES ($requestId,'$cateBrand',$amsInCase,$amsPesVal,$itsInCase,$itsPesVal,$maiInCase,$maiPesVal,$tpdInCase,$tpdPesVal)";
			$qryRes = $conn->query($qry);
			if ($qryRes) { array_push($aResult, $qryRes); }
			else { array_push($aResult, "error: ".mysqli_error($conn)); }
		}else{
			$qrySav = "UPDATE `pwppva` SET `active`=true,`cateBrand`='$cateBrand',`amsInCase`=$amsInCase,`amsPeso`=$amsPesVal,`itsInCase`=$itsInCase,`itsPeso`=$itsPesVal,`maiInCase`=$maiInCase,`maipvPeso`=$maiPesVal,`tpdInCase`=$tpdInCase,`tpdPeso`=$tpdPesVal WHERE `id`=$pvaId";
			$qrySavRes = $conn->query($qrySav);
			if ($qrySavRes){ array_push($aResult, $qrySavRes); }
			else{ array_push($aResult, "error: ".mysqli_error($conn)); }
		}
		echo json_encode ($aResult);
	}
}
elseif($_POST['type']==16){

	$requestId = $_SESSION["reqId"];
	$aPCEId = $_POST["aPCEId"];
	$aItmDsc = $_POST["aItmDsc"];
	$aItmQty = $_POST["aItmQty"];
	$aItmUnt = $_POST["aItmUnt"];
	$aItmTtl = $_POST["aItmTtl"];
	$aExpDsc = $_POST["aExpDsc"];
	$aExpQty = $_POST["aExpQty"];
	$aExpUnt = $_POST["aExpUnt"];
	$aExpTtl = $_POST["aExpTtl"];
	$aResult = [];

	for($count = 0; $count<count($aPCEId); $count++) {
		if(mysqli_real_escape_string($conn, $aPCEId[$count])==='-' || mysqli_real_escape_string($conn, $aPCEId[$count])==='') { $pceId=0; }
		else { $pceId=mysqli_real_escape_string($conn, $aPCEId[$count]); }

		if(mysqli_real_escape_string($conn, $aItmDsc[$count])==='-' || mysqli_real_escape_string($conn, $aItmDsc[$count])==='') { $itemDesc="NULL"; }
		else { $itemDesc=mysqli_real_escape_string($conn, $aItmDsc[$count]); }

		if(mysqli_real_escape_string($conn, $aItmQty[$count])==='-' || mysqli_real_escape_string($conn, $aItmQty[$count])==='') { $pcQty=0.0; }
		else { $pcQty=mysqli_real_escape_string($conn, $aItmQty[$count]); }

		if(mysqli_real_escape_string($conn, $aItmUnt[$count])==='-' || mysqli_real_escape_string($conn, $aItmUnt[$count])==='') { $pcUnitCost=0.0; }
		else { $pcUnitCost=mysqli_real_escape_string($conn, $aItmUnt[$count]); }

		if(mysqli_real_escape_string($conn, $aItmTtl[$count])==='-' || mysqli_real_escape_string($conn, $aItmTtl[$count])==='') { $pcTotalCost=0.0; }
		else { $pcTotalCost=mysqli_real_escape_string($conn, $aItmTtl[$count]); }

		if(mysqli_real_escape_string($conn, $aExpDsc[$count])==='-' || mysqli_real_escape_string($conn, $aExpDsc[$count])==='') { $expenseDesc=0.0; }
		else { $expenseDesc=mysqli_real_escape_string($conn, $aExpDsc[$count]); }

		if(mysqli_real_escape_string($conn, $aExpQty[$count])==='-' || mysqli_real_escape_string($conn, $aExpQty[$count])==='') { $pceQty=0.0; }
		else { $pceQty=mysqli_real_escape_string($conn, $aExpQty[$count]); }

		if(mysqli_real_escape_string($conn, $aExpUnt[$count])==='-' || mysqli_real_escape_string($conn, $aExpUnt[$count])==='') { $pceUnitCost=0.0; }
		else { $pceUnitCost=mysqli_real_escape_string($conn, $aExpUnt[$count]); }

		if(mysqli_real_escape_string($conn, $aExpTtl[$count])==='-' || mysqli_real_escape_string($conn, $aExpTtl[$count])==='') { $pceTotalCost=0.0; }
		else { $pceTotalCost=mysqli_real_escape_string($conn, $aExpTtl[$count]); }

		if($pceId==0){
			$qry = "INSERT INTO `pwppce`(`requestId`, `itemDesc`, `pcQty`, `pcUnitCost`, `pcTotalCost`, `expenseDesc`, `pceQty`, `pceUnitCost`, `pceTotalCost`) VALUES ($requestId,'$itemDesc',$pcQty,$pcUnitCost,$pcTotalCost,'$expenseDesc',$pceQty,$pceUnitCost,$pceTotalCost)";
			$qryRes = $conn->query($qry);
			if ($qryRes) { array_push($aResult, $qryRes); }
			else { array_push($aResult, "error: ".mysqli_error($conn)); }
		}else{
			$qrySav = "UPDATE `pwppce` SET `active`=true,`requestId`=$requestId, `itemDesc`='$itemDesc', `pcQty`=$pcQty, `pcUnitCost`=$pcUnitCost, `pcTotalCost`=$pcTotalCost, `expenseDesc`='$expenseDesc', `pceQty`=$pceQty, `pceUnitCost`=$pceUnitCost, `pceTotalCost`=$pceTotalCost WHERE `id`=$pceId";
			$qrySavRes = $conn->query($qrySav);
			if ($qrySavRes){ array_push($aResult, $qrySavRes); }
			else{ array_push($aResult, "error: ".mysqli_error($conn)); }
		}
		echo json_encode ($aResult);
	}
}
elseif($_POST['type']==17){
	$requestId = $_SESSION["reqId"];
	$aResult = [];
	$qryUpd = "UPDATE `pwppva` SET `active`=false WHERE `requestId`=$requestId";
	$qryUpdRes = $conn->query($qryUpd);
	if ($qryUpdRes){ array_push($aResult, $qryUpdRes); }
	else{ array_push($aResult, "error: ".mysqli_error($conn)); }
}
elseif($_POST['type']==18){
	$requestId = $_SESSION["reqId"];
	$aResult = [];
		$qryUpd = "UPDATE `pwppce` SET `active`=false WHERE `requestId`=$requestId";
		$qryUpdRes = $conn->query($qryUpd);
		if ($qryUpdRes){ array_push($aResult, $qryUpdRes); }
		else{ array_push($aResult, "error: ".mysqli_error($conn)); }
}
?>
