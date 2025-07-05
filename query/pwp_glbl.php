<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();

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
