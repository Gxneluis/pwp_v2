<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$aPWP = array();
function getChaCla($iChaCla){
	global $conn;
	$query="SELECT * FROM `pwpchacla` WHERE `id` = '$iChaCla'";
	$queRes=$conn->query($query);
	$aQueRes=mysqli_fetch_array($queRes);
	return $aQueRes["ccName"];
	// return $iChaCla;
}
function getActTyp($idActTyp){
	global $conn;
	$query="SELECT * FROM `pwpacttyp` WHERE `id` = '$idActTyp'";
	$queRes=$conn->query($query);
	$aQueRes=mysqli_fetch_array($queRes);
	return $aQueRes["atName"];
}
function getPWPReq(){
	$aPWP = array();
	global $conn;
  $qry_sg = "SELECT ps.*, pr.* FROM pwprequest AS pr LEFT JOIN pwpstatus AS ps on ps.requestId = pr.id WHERE ps.status IN ('Pending','Reviewed','Recommended','Approved','Rejected')";
  $qryRes_sg = $conn->query($qry_sg);
	while ($aQueRes=mysqli_fetch_array($qryRes_sg)) {
	  $data['requestId'] = $aQueRes["id"];
		$data['pwpDate'] = $aQueRes["pwpDate"];
		$data['promoTitle'] = $aQueRes["promoTitle"];
		$data['accountName'] = $aQueRes["accountName"];
		$data['channelClass']= getChaCla($aQueRes["channelClass"]);
		$data['asmDate'] = $aQueRes["dateFiled"];
		$data['ashDate'] = $aQueRes["dateReviewed"];
		$data['mmDate'] = $aQueRes["dateApproved"];
		$data['appDate'] = $aQueRes["dateSigned1"];
		$status = $aQueRes["status"];
		$data['rejDate'] = "";
  	if($status=="Rejected"){
	  	if($aQueRes["dateSigned1"]!=NULL) { $data['rejDate'] = $aQueRes["dateSigned1"]; }
			elseif($aQueRes["dateApproved"]!=NULL) { $data['rejDate'] = $aQueRes["dateApproved"]; }
			elseif($aQueRes["dateReviewed"]!=NULL) { $data['rejDate'] = $aQueRes["dateReviewed"]; }
		}
		array_push($aPWP, $data);
	}
	return $aPWP;
}
function getPWPBrkDwn(){
  $aPWP = array();
	global $conn;
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

	return $aPWP;
}
function getAthFil(){
  $aPWP = array();
	global $conn;
	$requestID = $_POST['requestID'];
	$fileType = $_POST['fileType'];
	$query="SELECT * FROM `pwpfile` WHERE `requestId`='$requestID' AND `FileType`='$fileType' AND `active` = true ";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['fileName'] = $aQueRes["fileName"];
		$data['fileDtl'] = $aQueRes["fileDtl"];

		array_push($aPWP, $data);
	}
	return $aPWP;
}
function getPVA(){
  $aPWP = array();
	global $conn;
	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwppva` WHERE `requestId` = '$requestID'";
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
  return $aPWP;
}
function getPCE(){
  $aPWP = array();
	global $conn;
	$requestID = $_POST['requestID'];
	$query="SELECT *,(SELECT pce_ExpDsc FROM pwppceexpdsc B WHERE expDscId=B.id) AS ExpDscDetail FROM `pwppce` WHERE `requestId` = '$requestID' AND `active`=true";
	$queRes=$conn->query($query);
	$_SESSION['reqId'] = $_POST['requestID'];
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["requestId"];
		$data['itemDesc'] = $aQueRes["itemDesc"];
		$data['pcQty'] = $aQueRes["pcQty"];
		$data['pcUnitCost'] = $aQueRes["pcUnitCost"];
		$data['pcTotalCost'] = $aQueRes["pcTotalCost"];
		if($aQueRes["expenseDesc"] == ""){ $data['expenseDesc'] = $aQueRes["expenseDesc"]; }
        else { $data['expenseDesc'] = $aQueRes["ExpDscDetail"]; }
		$data['pceQty'] = $aQueRes["pceQty"];
		$data['pceUnitCost'] = $aQueRes["pceUnitCost"];
		$data['pceTotalCost'] = $aQueRes["pceTotalCost"];

		array_push($aPWP, $data);
	}
	return $aPWP;
}

if($_POST['type']==1){
	echo json_encode (getPWPReq());
}
elseif($_POST['type']==2){
	echo json_encode (getPWPBrkDwn());
}
elseif($_POST['type']==3){
	echo json_encode (getPVA());
}
elseif($_POST['type']==4){
	echo json_encode (getPCE());
}
elseif($_POST['type']==5){
	echo json_encode (getAthFil());
}
?>
