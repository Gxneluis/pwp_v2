<?php
// User Account Queries
include '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

function saveDraft($aDetails){
	global $conn;

	$dDatePWP = $aDetails[0];
	$sNameOfAccnt = $aDetails[1];
	$sChannelClass  = $aDetails[2];
	$sTerritory = $aDetails[3];
	$sActivityType = $aDetails[4];
	$iCurrYrTrgt = $aDetails[5];
	$iTrdDisc = $aDetails[6];
	$iDA = $aDetails[7];
	$iPWPSerNo = $aDetails[8];
	$iCostCent = $aDetails[9];
	$iDateFrom = $aDetails[10];
	$iDateTo = $aDetails[11];
	$iPostPrmoEvalDdln = $aDetails[12];
	$idYTDPrevSale = $aDetails[13];
	$idYTDCurrSale = $aDetails[14];
	$iVariance = $aDetails[15];
	$iTxtBg = $aDetails[16];
	$iTxtPrmoTtle = $aDetails[17];
	$idTxtConc = $aDetails[20];

	$qry="INSERT INTO `pwprequest`
	( `pwpDate`, `accountName`, `channelClass`,`territory`, `activityType`, `currentTarget`, `tradeDisc`, `da`, `pwpSeries`, `costCenter`, `promoFrom`, `promoTo`, `postPromoEval`, `ytdCurrent`, `ytdPrevious`, `variance`, `background`, `promoTitle`, `concession` ) 
	VALUES ('$dDatePWP', '$sNameOfAccnt', '$sChannelClass', '$sTerritory', '$sActivityType', '$iCurrYrTrgt', '$iTrdDisc', '$iDA', '$iPWPSerNo', '$iCostCent', '$iDateFrom', '$iDateTo', '$iPostPrmoEvalDdln', '$idYTDCurrSale', '$idYTDPrevSale', '$iVariance', '$iTxtBg', '$iTxtPrmoTtle', '$idTxtConc')";
	$qryRes = $conn->query($qry);
	// if ($qryRes)
	// {
	// 	reurn $conn->insert_id;
	// }
	// else
	// {
		return "error: ".mysqli_error($conn);
	// }
	echo $qryRes;
	return 0;
}