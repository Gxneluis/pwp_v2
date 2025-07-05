<?php
// User Account Queries
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$aPWP = array();
function getActTyp($iId){
	global $conn;
	$query="SELECT * FROM `pwpacttyp` WHERE `id` = '$iId'";
	$queRes=$conn->query($query);
	$aQueRes=mysqli_fetch_array($queRes);
	return $aQueRes["atName"];
}
function getChaCla($iId){
	global $conn;
	$query="SELECT * FROM `pwpchacla` WHERE `id` = '$iId'";
	$queRes=$conn->query($query);
	$aQueRes=mysqli_fetch_array($queRes);
	return $aQueRes["ccName"];
}
if($_POST['type']==1){

	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwprequest` WHERE `id` = '$requestID'";
	$queRes=$conn->query($query);
	$aQueRes=mysqli_fetch_array($queRes);

	$aPWP['reqId'] = $aQueRes["id"];
	$aPWP['pwpDate'] = $aQueRes["pwpDate"];
	$aPWP['accountName'] = $aQueRes["accountName"];
	$aPWP['channelClass'] = getChaCla($aQueRes["channelClass"]);
	$aPWP['territory'] = $aQueRes["territory"];
	$aPWP['projType'] = $aQueRes["projType"];
	$aPWP['activityType'] = getActTyp($aQueRes["activityType"]);
	$aPWP['tradeDisc'] = $aQueRes["tradeDisc"];
	$aPWP['da'] = $aQueRes["da"];
	$aPWP['pwpSeries'] = $aQueRes["pwpSeries"];
	$aPWP['costCenter'] = $aQueRes["costCenter"];
	$aPWP['promoFrom'] = $aQueRes["promoFrom"];
	$aPWP['promoTo'] = $aQueRes["promoTo"];
	$aPWP['postPromoEval'] = $aQueRes["postPromoEval"];
	$aPWP['prvSal'] = $aQueRes["prvSal"];
	$aPWP['curTrg'] = $aQueRes["curTrg"];
	$aPWP['ytdTrg'] = $aQueRes["ytdTrg"];
	$aPWP['ytdAct'] = $aQueRes["ytdAct"];
	$aPWP['ttlDif'] = $aQueRes["ttlDif"];
	$aPWP['ttlGrw'] = $aQueRes["ttlGrw"];
	$aPWP['ytdDif'] = $aQueRes["ytdDif"];
	$aPWP['ytdAch'] = $aQueRes["ytdAch"];

	$aPWP['background'] = $aQueRes["background"];
	$aPWP['promoTitle'] = $aQueRes["promoTitle"];
	$aPWP['objectives'] = $aQueRes["objectives"];
	$aPWP['mechanics'] = $aQueRes["mechanics"];
	$aPWP['concession'] = $aQueRes["concession"];
	$aPWP['risks'] = $aQueRes["risks"];

	$aPWP['pvaTotal'] = $aQueRes["pvaTotal"];
	$aPWP['pcTotal'] = $aQueRes["pcTotal"];
	$aPWP['pceTotal'] = $aQueRes["pceTotal"];

	$aPWP['totProjCost'] = $aQueRes["totProjCost"];
	$aPWP['projectedSales'] = $aQueRes["projectedSales"];
	$aPWP['projectedCost'] = $aQueRes["projectedCost"];
	$aPWP['cToSRatio'] = $aQueRes["cToSRatio"];

	$_SESSION['reqId'] = $aPWP['reqId'];
	echo json_encode ($aPWP);
}
elseif($_POST['type']==2){

	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwppva` WHERE `requestId` = '$requestID' AND `active` = true ";
	$queRes=$conn->query($query);
	$_SESSION['reqId'] = $_POST['requestID'];
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["requestId"];
		$data['cateBrand'] = $aQueRes["cateBrand"];
		$data['amsInCase'] = $aQueRes["amsInCase"];
		$data['amsPeso'] = $aQueRes["amsPeso"];
		$data['itsInCase'] = $aQueRes["itsInCase"];
		$data['itsPeso'] = $aQueRes["itsPeso"];
		$data['maiInCase'] = $aQueRes["maiInCase"];
		$data['maipvPeso'] = $aQueRes["maipvPeso"];
		$data['tpdInCase'] = $aQueRes["tpdInCase"];
		$data['tpdPeso'] = $aQueRes["tpdPeso"];

		array_push($aPWP, $data);
	}

	echo json_encode ($aPWP);
}
elseif($_POST['type']==3){

	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwppce` WHERE `requestId` = '$requestID' AND `active` = true ";
	$queRes=$conn->query($query);
	$_SESSION['reqId'] = $_POST['requestID'];
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["requestId"];
		$data['itemDesc'] = $aQueRes["itemDesc"];
		$data['pcQty'] = $aQueRes["pcQty"];
		$data['pcUnitCost'] = $aQueRes["pcUnitCost"];
		$data['pcTotalCost'] = $aQueRes["pcTotalCost"];
		$data['expenseDesc'] = $aQueRes["expenseDesc"];
		$data['pceQty'] = $aQueRes["pceQty"];
		$data['pceUnitCost'] = $aQueRes["pceUnitCost"];
		$data['pceTotalCost'] = $aQueRes["pceTotalCost"];

		array_push($aPWP, $data);
	}

	echo json_encode ($aPWP);
}
elseif($_POST['type']==4){
	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwpfile` WHERE `requestId`='$requestID' AND `active` = true ";
	$queRes=$conn->query($query);
	$_SESSION['reqId'] = $_POST['requestID'];
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['fileName'] = $aQueRes["fileName"];
		$data['fileDtl'] = $aQueRes["fileDtl"];
		$data['fileType'] = $aQueRes["FileType"];
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
?>
