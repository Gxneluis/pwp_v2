<?php
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$aPWP = array();

if($_POST['type']==0){
	$qry_grp="SELECT * FROM pwpgroupdetails WHERE `approvers` = '$empID'";
	$qryRes_grp = $conn->query($qry_grp);
	if($qryRes_grp.length()!=0){
		$_SESSION['type_grp'] = true;
	}

	$qry_sub="SELECT * FROM pwpsubgroupdetails WHERE `reviewer` = '$empID'";
	$qryRes_sub = $conn->query($qry_sub);
	if($qryRes_grp.length()!=0){
		$_SESSION['type_sub'] = true;
	}

	$qry_asn="SELECT * FROM pwpgrouping WHERE `employeeId` = '$empID'";
	$qryRes_asn = $conn->query($qry_asn);
	if($qryRes_grp.length()!=0){
		$_SESSION['type_asn'] = true;
	}
}
elseif($_POST['type']==1){
	$empId = $_SESSION["empId"];
	$query="SELECT pr.* FROM pwprequest AS pr LEFT JOIN pwpstatus AS ps ON pr.id = ps.requestId WHERE pr.empID = '$empId' AND status = 'Pending'";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["id"];
		$data['createDate'] = $aQueRes["createDate"];
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
    		$data['itsPVTtl'] += $arespva["itsPeso"];
	    	$data['tpdPVTtl'] += $arespva["tpdPeso"];
        }
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==2){
	$empId = $_SESSION["empId"];
	$query="SELECT pr.* FROM pwprequest AS pr LEFT JOIN pwpstatus AS ps ON pr.id = ps.requestId WHERE pr.empID = '$empId' AND status = 'Rejected'";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["id"];
		$data['createDate'] = $aQueRes["createDate"];
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
			$data['itsPVTtl'] += $arespva["itsPeso"];
			$data['tpdPVTtl'] += $arespva["tpdPeso"];
    }
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==3){
	$empId = $_SESSION["empId"];
	$query="SELECT pr.* FROM pwprequest AS pr LEFT JOIN pwpstatus AS ps ON pr.id = ps.requestId WHERE pr.empID = $empId AND status='Recommended'";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["id"];
		$data['createDate'] = $aQueRes["createDate"];
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
		$data['cmtBy'] = "";
		$data['cmtTxt'] = "";

        $requestID=$aQueRes["id"];
	    $qrypva="SELECT * FROM `pwppva` WHERE `requestId`=$requestID AND `active`=true";
	    $respva=$conn->query($qrypva);
	    while ($arespva=mysqli_fetch_array($respva)) {
    		$data['itsPVTtl'] += $arespva["itsPeso"];
	    	$data['tpdPVTtl'] += $arespva["tpdPeso"];
        }
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==4){
	$empId = $_SESSION["empId"];
	$query="SELECT pr.* FROM pwprequest AS pr LEFT JOIN pwpstatus AS ps ON pr.id = ps.requestId WHERE pr.empID = '$empId' AND status = 'Draft'";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["id"];
		$data['createDate'] = $aQueRes["createDate"];
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
		$data['cmtBy'] = "";
		$data['cmtTxt'] = "";

        $requestID=$aQueRes["id"];
	    $qrypva="SELECT * FROM `pwppva` WHERE `requestId`=$requestID AND `active`=true";
	    $respva=$conn->query($qrypva);
	    while ($arespva=mysqli_fetch_array($respva)) {
    		$data['itsPVTtl'] += $arespva["itsPeso"];
	    	$data['tpdPVTtl'] += $arespva["tpdPeso"];
        }
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==5){
	$empId = $_SESSION["empId"];
	$query="SELECT pr.* FROM pwprequest AS pr LEFT JOIN pwpstatus AS ps ON pr.id = ps.requestId WHERE pr.empID = '$empId' AND status = 'Reviewed'";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["id"];
		$data['createDate'] = $aQueRes["createDate"];
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
		$data['cmtBy'] = "";
		$data['cmtTxt'] = "";

        $requestID=$aQueRes["id"];
	    $qrypva="SELECT * FROM `pwppva` WHERE `requestId`=$requestID AND `active`=true";
	    $respva=$conn->query($qrypva);
	    while ($arespva=mysqli_fetch_array($respva)) {
    		$data['itsPVTtl'] += $arespva["itsPeso"];
	    	$data['tpdPVTtl'] += $arespva["tpdPeso"];
        }
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==6){

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
		$aPWP["cmtTxt"]="";
		$aPWP["cmtBy"]="";

	$cmtBy=0;
	$qrySts="SELECT * FROM `pwpstatus` WHERE `requestId` = '$requestID'";
	$queSts=$conn->query($qrySts);
	$aQueSts=mysqli_fetch_array($queSts);
	if(!empty($aQueSts["signer1"]) AND $aQueSts["signer1"]!=""){
		$aPWP["cmtTxt"]=$aQueSts["sg3cmnt"];
		$cmtBy=$aQueSts["signer1"];
		$aPWP["signer3"]=$aQueSts["signer1"];
	}elseif(!empty($aQueSts["approver"]) AND $aQueSts["approver"]!=""){
		$aPWP["cmtTxt"]=$aQueSts["sg2cmnt"];
		$cmtBy=$aQueSts["approver"];
		$aPWP["signer2"]=$aQueSts["approver"];
	}elseif(!empty($aQueSts["reviewer"]) AND $aQueSts["reviewer"]!=""){
		$aPWP["cmtTxt"]=$aQueSts["sg1cmnt"];
		$cmtBy=$aQueSts["reviewer"];
		$aPWP["signer1"]=$aQueSts["reviewer"];
	}
	if($cmtBy!=0){
		$qryAct="SELECT * FROM `accounts` WHERE `id` = $cmtBy";
		$actRes=$conn->query($qryAct);
		$aActRes=mysqli_fetch_array($actRes);
		$aPWP["cmtBy"]=$aActRes["firstName"]." ".$aActRes["lastName"];
	}
	echo json_encode ($aPWP);
}
elseif($_POST['type']==7){

	$requestID = $_POST['requestID'];
	$query="SELECT * FROM `pwppva` WHERE `requestId` = '$requestID' AND `active`=true";
	$queRes=$conn->query($query);
	$_SESSION['reqId'] = $_POST['requestID'];
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['pvaId'] = $aQueRes["id"];
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
elseif($_POST['type']==8){
	$requestID = $_POST['requestID'];
	$query="SELECT *,(SELECT pce_ExpDsc FROM pwppceexpdsc B WHERE expDscId=B.id) AS ExpDscDetail FROM `pwppce` WHERE `requestId` = '$requestID' AND `active`=true";
	$queRes=$conn->query($query);
	$_SESSION['reqId'] = $_POST['requestID'];
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['pceId'] = $aQueRes["id"];
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
elseif($_POST['type']==9){
  echo "";
}
elseif($_POST['type']==10){
	$empId = $_SESSION["empId"];
	$query="SELECT pr.* FROM pwprequest AS pr LEFT JOIN pwpstatus AS ps ON pr.id = ps.requestId WHERE pr.empID = $empId AND status IN ('Approved','forCEO')";
	$queRes=$conn->query($query);
	while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['requestId'] = $aQueRes["id"];
		$data['createDate'] = $aQueRes["createDate"];
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
		$data['cmtBy'] = "";
		$data['cmtTxt'] = "";
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
elseif($_POST['type']==11){
    $qry="SELECT * FROM `pwppceexpdsc` WHERE pce_ExpDsc_act = TRUE";
	$qryRes = $conn->query($qry);
	while ($aQueRes=mysqli_fetch_array($qryRes)) {
		$data['id'] = $aQueRes["id"];
		$data['pce_ExpDsc'] = $aQueRes["pce_ExpDsc"];
		array_push($aPWP, $data);
	}
	echo json_encode ($aPWP);
}
?>
