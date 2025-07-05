<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$aPWP = array();
function getPWPRej(){
	$aPWP = array();
	global $conn;
  $empId = $_SESSION["empId"];
	$qry_sg = "SELECT ps.*, pr.* FROM pwpstatus AS ps LEFT JOIN pwprequest AS pr ON ps.requestId = pr.id LEFT JOIN pwpgrouping AS pg ON pr.empID = pg.employeeId LEFT JOIN pwpsubgroupdetails AS psg ON psg.id = pg.subGroupId WHERE ps.status = 'Rejected' AND psg.reviewer = '$empId'";
	$qryRes_sg = $conn->query($qry_sg);

	while ($aQueRes=mysqli_fetch_array($qryRes_sg)) {
		$data['requestId'] = $aQueRes["id"];
		$data['pwpDate'] = $aQueRes["pwpDate"];
		$data['accountName'] = $aQueRes["accountName"];
		$data['promoTitle'] = $aQueRes["promoTitle"];
		$data['territory'] = $aQueRes["territory"];
		$data['projType'] = $aQueRes["projType"];
		$data['activityType'] = $aQueRes["activityType"];
		$data['itsPVTtl'] = 0;
		$data['tpdPVTtl'] = 0;
		$data['projectedCost'] = $aQueRes["projectedCost"];
		$data['cToSRatio'] = round((($aQueRes["projectedCost"]/$aQueRes["projectedSales"])*100),2)."%";
  		$requestID=$aQueRes["id"];
			$qrypva="SELECT * FROM `pwppva` WHERE `requestId`=$requestID AND `active`=true";
			$respva=$conn->query($qrypva);
		while ($arespva=mysqli_fetch_array($respva)) {
			$data['itsPVTtl'] = $arespva["itsPeso"];
			$data['tpdPVTtl'] = $arespva["tpdPeso"];
		}
		array_push($aPWP, $data);
	}
	return $aPWP;
}

if($_POST['type']==1){

	$empId = $_SESSION["empId"];
	$qry_sg = "SELECT ps.*, pr.* FROM pwpstatus AS ps LEFT JOIN pwprequest AS pr ON ps.requestId = pr.id LEFT JOIN pwpgrouping AS pg ON pr.empID = pg.employeeId LEFT JOIN pwpsubgroupdetails AS psg ON psg.id = pg.subGroupId WHERE ps.status = 'Pending' AND psg.reviewer = '$empId'";

	$qryRes_sg = $conn->query($qry_sg);

	while ($aQueRes=mysqli_fetch_array($qryRes_sg)) {
		$data['requestId'] = $aQueRes["id"];
		$data['pwpDate'] = $aQueRes["pwpDate"];
		$data['accountName'] = $aQueRes["accountName"];
		$data['promoTitle'] = $aQueRes["promoTitle"];
		$data['territory'] = $aQueRes["territory"];
		$data['projType'] = $aQueRes["projType"];
		$data['activityType'] = $aQueRes["activityType"];
		$data['itsPVTtl'] = 0;
		$data['tpdPVTtl'] = 0;
		$data['projectedCost'] = $aQueRes["projectedCost"];
		$data['cToSRatio'] = round((($aQueRes["projectedCost"]/$aQueRes["projectedSales"])*100),2)."%";

        $requestID=$aQueRes["id"];
	    $qrypva="SELECT * FROM `pwppva` WHERE `requestId`=$requestID AND `active`=true";
	    $respva=$conn->query($qrypva);
	    while ($arespva=mysqli_fetch_array($respva)) {
    		$data['itsPVTtl'] = $arespva["itsPeso"];
	    	$data['tpdPVTtl'] = $arespva["tpdPeso"];
	    }
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==2){

	$empId = $_SESSION["empId"];
	$qry_sg = "SELECT ps.*, pr.* FROM pwpstatus AS ps LEFT JOIN pwprequest AS pr ON ps.requestId = pr.id LEFT JOIN pwpgrouping AS pg ON pr.empID = pg.employeeId LEFT JOIN pwpsubgroupdetails AS psg ON psg.id = pg.subGroupId WHERE (ps.status IN ('Reviewed','Recommended','Approved','forCEO')) AND psg.reviewer = '$empId'";

	$qryRes_sg = $conn->query($qry_sg);

	while ($aQueRes=mysqli_fetch_array($qryRes_sg)) {
		$data['requestId'] = $aQueRes["id"];
		$data['pwpDate'] = $aQueRes["pwpDate"];
		$data['accountName'] = $aQueRes["accountName"];
		$data['promoTitle'] = $aQueRes["promoTitle"];
		$data['territory'] = $aQueRes["territory"];
		$data['projType'] = $aQueRes["projType"];
		$data['activityType'] = $aQueRes["activityType"];
		$data['itsPVTtl'] = 0;
		$data['tpdPVTtl'] = 0;
		$data['projectedCost'] = $aQueRes["projectedCost"];
		$data['cToSRatio'] = round((($aQueRes["projectedCost"]/$aQueRes["projectedSales"])*100),2)."%";

        $requestID=$aQueRes["id"];
	    $qrypva="SELECT * FROM `pwppva` WHERE `requestId`=$requestID AND `active`=true";
	    $respva=$conn->query($qrypva);
	    while ($arespva=mysqli_fetch_array($respva)) {
    		$data['itsPVTtl'] = $arespva["itsPeso"];
	    	$data['tpdPVTtl'] = $arespva["tpdPeso"];
	    }
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif ($_POST['type']==3){

	$iReqId = mysqli_real_escape_string($conn, $_SESSION["reqId"]);
	$iEmpId = mysqli_real_escape_string($conn, $_SESSION['empId']);
	$sStatus = mysqli_real_escape_string($conn, $_POST["sStatus"]);
	$sComment = mysqli_real_escape_string($conn, $_POST["sComment"]);
	$dDateTime = date("Y-m-d h:i:s");
	$qry = "UPDATE `pwpstatus` SET `status`='$sStatus', `reviewer`='$iEmpId', `dateReviewed`='$dDateTime', `sg1cmnt`='$sComment' WHERE requestId = '$iReqId'";
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
else if($_POST['type']==4){

	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwprequest` WHERE `id` = '$requestID'";
	$queRes=$conn->query($query);
	$aQueRes=mysqli_fetch_array($queRes);

	$aPWP['reqId'] = $aQueRes["id"];
	$aPWP['pwpDate'] = $aQueRes["pwpDate"];
	$aPWP['accountName'] = $aQueRes["accountName"];
	$aPWP['channelClass'] = $aQueRes["channelClass"];
	$aPWP['territory'] = $aQueRes["territory"];
	$aPWP['projType'] = $aQueRes["projType"];
	$aPWP['activityType'] = $aQueRes["activityType"];
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
else if($_POST['type']==5){

	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwppva` WHERE `requestId` = '$requestID' AND `active`=true";
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
else if($_POST['type']==6){
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
	echo json_encode ($aPWP);
}
else if($_POST['type']==7){
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
else if($_POST['type']==8){
	echo json_encode (getPWPRej());
}
?>
