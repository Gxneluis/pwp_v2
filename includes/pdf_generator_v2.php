<?php
require_once 'tcpdf/tcpdf.php';
require_once 'config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$sFldDta = '';
$sDsp = '';
$sSapDsc = '';
$sReqDte = '';
$sEffDte = '';
$iamsICs = 0;
$iamsPes = 0;
$iitsICs = 0;
$iitsPes = 0;
$imaiICs = 0;
$imaiPes = 0;
$itpdICs = 0;
$itpdPes = 0;
$itmQty = 0;
$itmUntCst = 0;
$itmTtlCst = 0;
$expQty = 0;
$expUntCst = 0;
$expTtlCst = 0;
$iPVACnt = 0;
$iPCECnt = 0;
function gAry($dta1,$dta2,$dta3,$dta4,$dta5){
  $sTmp = $dta1.$dta2.$dta3.$dta4.$dta5;
  $sNw1 = str_replace("{","",$sTmp);
  $sNw2 = str_replace("}","",$sNw1);
  return $sNw2;
}
function splt2Ary($sString){
  $aTmp = explode("~",$sString);
  foreach($aTmp as $sVal ){
    $aVal = explode(":",$sVal);
    $aNew[$aVal[0]] = $aVal[1];
  }
  return $aNew;
}
function gFldDta(){
// Get Field Data
  global $conn;
  $atgrq = array();
  $tgrq_qry = "SELECT * FROM `tgrq_flddat` WHERE `active`=1 ORDER BY odr ASC";
  $tgrq_res = $conn->query($tgrq_qry);

  $tgrq_qry = "SELECT * FROM `tgrq_flddat` WHERE `active`=1 ORDER BY odr ASC";
  $tgrq_res = $conn->query($tgrq_qry);
  while ($aQueRes=mysqli_fetch_array($tgrq_res)) {
    $data['nam'] = $aQueRes["nam"];
    array_push($atgrq, $data);
  }
  $aTemp["fldDatUsg"] = $_SESSION["fldDatUsg"];
  array_push($atgrq,$aTemp);
  return $atgrq;
}
function gPWPDta($reqId){
// Get PWP Data
  global $conn;
  $apwp = array();
  $pwp_qry = "SELECT A.*,B.*, ( SELECT C.atName FROM pwpacttyp C WHERE C.id=A.activityType ) 'acttyp', ( SELECT D.ccName FROM pwpchacla D WHERE D.id=A.channelClass ) 'chacla' FROM `pwprequest` A LEFT JOIN `pwpstatus` B ON A.id=B.requestId WHERE A.id='$reqId'";
  $pwp_res = $conn->query($pwp_qry);
  while ($aQueRes=mysqli_fetch_array($pwp_res)) {
    $data['pwpDat'] = $aQueRes["pwpDate"];
    $data['acnNam'] = $aQueRes["accountName"];
    $data['chlCls'] = $aQueRes["chacla"];
    $data['ter'] = $aQueRes["territory"];
    $data['actTyp'] = $aQueRes["acttyp"];
    $data['trdDsc'] = $aQueRes["tradeDisc"];
    $data['da'] = $aQueRes["da"];
    $data['pwpSer'] = $aQueRes["pwpSeries"];
    $data['cstCnt'] = $aQueRes["costCenter"];
    $data['prmFrm'] = $aQueRes["promoFrom"];
    $data['prmTo'] = $aQueRes["promoTo"];
    $data['pstPrmEvl'] = $aQueRes["postPromoEval"];
    $data['prvSal'] = $aQueRes["prvSal"];
    $data['ytdTrg'] = $aQueRes["ytdTrg"];
    $data['ytdAct'] = $aQueRes["ytdAct"];
    $data['ytdDif'] = $aQueRes["ytdDif"];
    $data['ytdAch'] = $aQueRes["ytdAch"];
    $data['bck'] = $aQueRes["background"];
    $data['prmTtl'] = $aQueRes["promoTitle"];
    $data['obj'] = $aQueRes["objectives"];
    $data['mch'] = $aQueRes["mechanics"];
    $data['con'] = $aQueRes["concession"];
    $data['rsk'] = $aQueRes["risks"];
    $data['totPrjCst'] = $aQueRes["totProjCost"];
    $data['prjSls'] = $aQueRes["projectedSales"];
    $data['prjCst'] = $aQueRes["projectedCost"];
    $data['cToSRat'] = $aQueRes["cToSRatio"];
    array_push($apwp, $data);
  }
  return $apwp;
}
function gPVA($reqId){
// Get PWP Data
  global $conn;
  $apwp = array();
  $pwp_qry = "SELECT * FROM `pwppva` WHERE requestId='$reqId'";
  $pwp_res = $conn->query($pwp_qry);
  while ($aQueRes=mysqli_fetch_array($pwp_res)) {
    $data['catBrn'] = $aQueRes["cateBrand"];
    $data['amsICs'] = $aQueRes["amsInCase"];
    $data['amsPes'] = $aQueRes["amsPeso"];
    $data['itsICs'] = $aQueRes["itsInCase"];
    $data['itsPes'] = $aQueRes["itsPeso"];
    $data['maiICs'] = $aQueRes["maiInCase"];
    $data['maiPes'] = $aQueRes["maiPeso"];
    $data['tpdICs'] = $aQueRes["tpdInCase"];
    $data['tpdPes'] = $aQueRes["tpdPeso"];
    array_push($apwp, $data);
  }
  return $apwp;
}
function gPCE($reqId){
// Get PWP Data
  global $conn;
  $apwp = array();
  $pwp_qry = "SELECT * FROM `pwppce` WHERE requestId='$reqId'";
  $pwp_res = $conn->query($pwp_qry);
  while ($aQueRes=mysqli_fetch_array($pwp_res)) {
    $data['itmDsc'] = $aQueRes["itemDesc"];
    $data['itmQty'] = $aQueRes["pcQty"];
    $data['itmUntCst'] = $aQueRes["pcUnitCost"];
    $data['itmTtlCst'] = $aQueRes["pcTotalCost"];
    if($aQueRes["expenseDesc"]=='' || $aQueRes["expenseDesc"]==0){
      $data['expDsc'] = $aQueRes["expenseDesc"];
    } else {
      $dts = gPCEExpDsc($aQueRes["expDscId"]);
      $data['expDsc'] = $dts[0]['sExpDsc'];
    }
    $data['expQty'] = $aQueRes["pceQty"];
    $data['expUntCst'] = $aQueRes["pceUnitCost"];
    $data['expTtlCst'] = $aQueRes["pceTotalCost"];
    array_push($apwp, $data);
  }
  return $apwp;
}
function gPCEExpDsc($iExpDsc){
// Get PWP Data
  global $conn;
  $apwp = array();
  $pwp_qry = "SELECT * FROM `pwppceexpdsc` WHERE id='$iExpDsc'";
  $pwp_res = $conn->query($pwp_qry);
  while ($aQueRes=mysqli_fetch_array($pwp_res)) {
    $data['sExpDsc'] = $aQueRes["pce_ExpDsc"];
    array_push($apwp, $data);
  }
  return $apwp;
}
function gSig($iPWP){
// Get PWP Data
  global $conn;
  $apwp = array();
  $pwp_qry = "SELECT ( SELECT H.firstName FROM `pwprequest` G LEFT JOIN `accounts` H ON G.empId=H.id WHERE A.requestId=G.id ) 'aFN0', ( SELECT K.lastName FROM `pwprequest` L LEFT JOIN `accounts` K ON L.empId=K.id WHERE A.requestId=L.id ) 'aLN0', ( SELECT J.signature FROM `pwprequest` I LEFT JOIN `accounts` J ON I.empId=J.id WHERE A.requestId=I.id ) 'aSig0', B.firstName 'aFN1', B.lastName 'aLN1', B.signature 'aSig1', C.firstName 'aFN2', C.lastName 'aLN2', C.signature 'aSig2', D.firstName 'aFN3', D.lastName 'aLN3', D.signature 'aSig3', E.firstName 'aFN4', E.lastName 'aLN4', E.signature 'aSig4', F.firstName 'aFN5', F.lastName 'aLN5', F.signature 'aSig5' FROM `pwpstatus` A LEFT JOIN `accounts` B ON A.reviewer=B.id LEFT JOIN `accounts` C ON A.approver=C.id LEFT JOIN `accounts` D ON A.signer1=D.id LEFT JOIN `accounts` E ON A.signer2=E.id LEFT JOIN `accounts` F ON A.signer3=F.id WHERE A.requestId='$iPWP'";
  $pwp_res = $conn->query($pwp_qry);
  while ($aQueRes=mysqli_fetch_array($pwp_res)) {
    $data['aUsr0'] = $aQueRes["aFN0"] . ' ' . $aQueRes["aLN0"];
    $data['aSig0'] = $aQueRes["aSig0"];
    $data['aUsr1'] = $aQueRes["aFN1"] . ' ' . $aQueRes["aLN1"];
    $data['aSig1'] = $aQueRes["aSig1"];
    $data['aUsr2'] = $aQueRes["aFN2"] . ' ' . $aQueRes["aLN2"];
    $data['aSig2'] = $aQueRes["aSig2"];
    $data['aUsr3'] = $aQueRes["aFN3"] . ' ' . $aQueRes["aLN3"];
    $data['aSig3'] = $aQueRes["aSig3"];
    $data['aUsr4'] = $aQueRes["aFN4"] . ' ' . $aQueRes["aLN4"];
    $data['aSig4'] = $aQueRes["aSig4"];
    $data['aUsr5'] = $aQueRes["aFN5"] . ' ' . $aQueRes["aLN5"];
    $data['aSig5'] = $aQueRes["aSig5"];
    array_push($apwp, $data);
  }
  return $apwp;
}

//$pdf_Name =  str_pad('105', 6,'0',STR_PAD_LEFT);
$pdf_Name =  'PWP_'.str_pad($_GET['nPwpId'], 6,'0',STR_PAD_LEFT).'_'.date("his").'.pdf';
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage();
$aFldDts = gFldDta();
$pwpId = gPWPDta($_GET['nPwpId']);
$aPCE = gPCE($_GET['nPwpId']);
$aPVA = gPVA($_GET['nPwpId']);
$iPCECnt = count($aPCE);
$iPVACnt = count($aPVA);
$gSig = gSig($_GET['nPwpId']);
$gSig0 = '';
$gSig1 = '';
$gSig2 = '';
$gSig3 = '';

$ctsR = (($pwpId[0]['prjCst'])/($pwpId[0]['prjSls']))*100;
if($gSig[0]['aSig0']!=''){ $gSig0 = '<img src="../uploads/signature/' . $gSig[0]['aSig0'] . '" height="25px"> '; }
if($gSig[0]['aSig1']!=''){ $gSig1 = '<img src="../uploads/signature/' . $gSig[0]['aSig1'] . '" height="25px"> '; }
if($gSig[0]['aSig2']!=''){ $gSig2 = '<img src="../uploads/signature/' . $gSig[0]['aSig2'] . '" height="25px">'; }
if($gSig[0]['aSig3']!=''){ $gSig3 = '<img src="../uploads/signature/' . $gSig[0]['aSig3'] . '" height="25px">'; }
$sDsp .= '';
$pdf->SetFont('', '', 8);
$html0 = <<<EOD
<div style="text-align:center;"> <img src="img/qpmiLogoPng.PNG" alt="W3Schools.com" height="50px"> </div>
EOD;
$html1 = <<<EOD
EOD;
$html1 .=
'<table border="0">
  <tr>
    <td style="width:80px;" >  </td>
    <td style="width:63px;" >  </td>
    <td style="width:63px;" >  </td>
    <td style="width:63px;" >  </td>
    <td style="width:80px;" >  </td>
    <td style="width:63px;" >  </td>
    <td style="width:63px;" >  </td>
    <td style="width:63px;" >  </td>
  </tr>
  <tr>
    <td > Date of PWP : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" >' . $pwpId[0]['pwpDat'] . '</td>
    <td >  </td>
    <td > PWP Series No. : </td>
    <td colspan="2" style="border-bottom: 1px solid black;">  </td>
    <td >  </td>
  </tr>
  <tr>
    <td > Name of Account : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" >' . $pwpId[0]['acnNam'] . '</td>
    <td >  </td>
    <td > Cost Center : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" >  </td>
    <td >  </td>
  </tr>
  <tr>
    <td > Channel Class : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" >' . $pwpId[0]['chlCls'] . '</td>
    <td >  </td>
    <td colspan="1" > Promo Duration : </td>
    <td style="text-align:center; border-bottom: 1px solid black;" >' . $pwpId[0]['prmFrm'] . '</td>
    <td style="text-align:center; border-bottom: 1px solid black;" >' . $pwpId[0]['prmTo'] . '</td>
    <td >  </td>
  </tr>
  <tr>
    <td > Territory : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" >' . $pwpId[0]['ter'] . '</td>
    <td >  </td>
    <td colspan="1" > Evaluation Deadline : </td>
    <td colspan="2" style="text-align:center; border-bottom: 1px solid black;" >' . $pwpId[0]['pstPrmEvl'] . '</td>
    <td colspan="1" >  </td>
  </tr>
  <tr>
    <td > Activity Type : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" >' . $pwpId[0]['actTyp'] . '</td>
    <td >  </td>
    <td > Full Year Sales : </td>
    <td colspan="2" style="text-align:right; border-bottom: 1px solid black;" >' . number_format((float)$pwpId[0]['prvSal'], 2, '.', ',') . '</td>
    <td colspan="1" ></td>
  </tr>
  <tr>
    <td > Trade Discount : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" >' . $pwpId[0]['trdDsc'] . '</td>
    <td >  </td>
    <td > YTD Sales : </td>
    <td style="text-align:right; border-bottom: 1px solid black;" >' . number_format((float)$pwpId[0]['ytdTrg'], 2, '.', ',') . '</td>
    <td > Difference : </td>
    <td style="text-align:right; border-bottom: 1px solid black;" >' . number_format((float)$pwpId[0]['ytdDif'], 2, '.', ',') . '</td>
  </tr>
  <tr>
    <td > DA (if Applicable) : </td>
    <td colspan="2" style="border-bottom: 1px solid black;" > </td>
    <td >  </td>
    <td > YTD Sales : </td>
    <td style="text-align:right; border-bottom: 1px solid black;" >' . number_format((float)$pwpId[0]['ytdAct'], 2, '.', ',') . '</td>
    <td > Achieved : </td>
    <td style="text-align:right; border-bottom: 1px solid black;" >' . number_format((float)$pwpId[0]['ytdAch'], 2, '.', ',') . '</td>
  </tr>
</table>
';

$html2 = <<<EOD
EOD;
$html2 .= '
<table border="1" >
  <tr>
    <td style="width:75px;text-align:right;" > Background: &nbsp; <br /> </td> 
    <td style="width:450px;" > ' . $pwpId[0]['bck'] . ' </td> 
  </tr>
  <tr>
    <td style="text-align:right;" > Promo Title: &nbsp; <br /> </td>
    <td > ' . $pwpId[0]['prmTtl'] . ' </td>
  </tr>
  <tr>
    <td style="text-align:right;" > Objectives: &nbsp; <br /> </td>
    <td > ' . $pwpId[0]['obj'] . ' </td>
  </tr>
  <tr>
    <td style="text-align:right;" > Mechanics: &nbsp; <br /> </td>
    <td > ' . $pwpId[0]['mch'] . ' </td>
  </tr>
  <tr>
    <td style="text-align:right;" > Concesions: &nbsp; <br /> </td>
    <td > ' . $pwpId[0]['con'] . ' </td>
  </tr>
  <tr>
    <td style="text-align:right;" > Risk/s Involved: &nbsp; <br /> </td>
    <td > ' . $pwpId[0]['rsk'] . ' </td>
  </tr>
</table>
';

$html3 = <<<EOD
EOD;
$html3 .='
<table border="1" style="text-align:center;" >
  <tr>
    <th colspan="9" style="font-size:10;" > <b> PROJECTED VOLUME ANALYSIS </b> </th>
  </tr>
  <tr>
    <td rowspan="2" style="width:138px;" > CATEGORY / BRAND </td>
    <td colspan="2" style="width:100px;" > AVG.MONTHLY SALES </td>
    <td colspan="2" style="width:100px;" > TARGET SALES </td>
    <td colspan="2" style="width:100px;" > (MO. AVERAGE) </td>
    <td colspan="2" style="width:100px;" > (PROJECT DURATION) </td>
  </tr>
  <tr>
    <td style="width:40px;" > IN CASE </td>
    <td style="width:60px;" > PESO VALUE </td>
    <td style="width:40px;" > IN CASE </td>
    <td style="width:60px;" > PESO VALUE </td>
    <td style="width:40px;" > IN CASE </td>
    <td style="width:60px;" > PESO VALUE </td>
    <td style="width:40px;" > IN CASE </td>
    <td style="width:60px;" > PESO VALUE </td>
  </tr>';
for ($iPVA=0; $iPVA<count($aPVA); $iPVA++){
$html3 .='
  <tr>
    <td style="text-align:left;" > ' . $aPVA[$iPVA]['catBrn'] . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['amsICs'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['amsPes'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['itsICs'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['itsPes'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['maiICs'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['maiPes'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['tpdICs'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPVA[$iPVA]['tpdPes'], 2, '.', ',') . ' </td>
  </tr>';
$iamsICs += $aPVA[$iPVA]['amsICs'];
$iamsPes += $aPVA[$iPVA]['amsPes'];
$iitsICs += $aPVA[$iPVA]['itsICs'];
$iitsPes += $aPVA[$iPVA]['itsPes'];
$imaiICs += $aPVA[$iPVA]['maiICs'];
$imaiPes += $aPVA[$iPVA]['maiPes'];
$itpdICs += $aPVA[$iPVA]['tpdICs'];
$itpdPes += $aPVA[$iPVA]['tpdPes'];
}
$html3 .='
  <tr>
    <td style="text-align:left;" >  </td>
    <td style="text-align:right;" > <b>' . number_format((float)$iamsICs, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$iamsPes, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$iitsICs, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$iitsPes, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$imaiICs, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$imaiPes, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$itpdICs, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$itpdPes, 2, '.', ',') . '</b> </td>
  </tr>';

$html3 .= '</table>';

$html4 = <<<EOD
EOD;
$html4 .='
<table border="1" style="text-align:center;" >
  <tr>
    <th colspan="8" style="font-size:10;"> <b> PROMO COST ESTIMATES </b> </th>
  </tr>
  <tr>
    <td style="width:104px;" > ITEM DESCRIPTION </td>
    <td style="width:45px;" > QTY. </td>
    <td style="width:55px;" > UNIT COST </td>
    <td style="width:65px;" > TOTAL COST </td>
    <td style="width:104px;" > EXPENSE DESCRIPTION </td>
    <td style="width:45px;" > QTY. </td>
    <td style="width:55px;" > UNIT COST </td>
    <td style="width:65px;" > TOTAL COST </td>
  </tr>';
for ($iPCE=0; $iPCE<count($aPCE); $iPCE++){
$html4 .='
  <tr>
    <td style="text-align:left;" > ' . $aPCE[$iPCE]['itmDsc'] . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPCE[$iPCE]['itmQty'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPCE[$iPCE]['itmUntCst'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPCE[$iPCE]['itmTtlCst'], 2, '.', ',') . ' </td>
    <td style="text-align:left;" > ' . $aPCE[$iPCE]['expDsc'] . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPCE[$iPCE]['expQty'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPCE[$iPCE]['expUntCst'], 2, '.', ',') . ' </td>
    <td style="text-align:right;" > ' . number_format((float)$aPCE[$iPCE]['expTtlCst'], 2, '.', ',') . ' </td>
  </tr>';
$itmQty += $aPCE[$iPCE]['itmQty'];
$itmUntCst += $aPCE[$iPCE]['itmUntCst'];
$itmTtlCst += $aPCE[$iPCE]['itmTtlCst'];
$expQty += $aPCE[$iPCE]['expQty'];
$expUntCst += $aPCE[$iPCE]['expUntCst'];
$expTtlCst += $aPCE[$iPCE]['expTtlCst'];
}
$html4 .='
  <tr>
    <td style="text-align:left;" > </td>
    <td style="text-align:right;" > <b>' . number_format((float)$itmQty, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$itmUntCst, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$itmTtlCst, 2, '.', ',') . '</b> </td>
    <td style="text-align:left;" > </td>
    <td style="text-align:right;" > <b>' . number_format((float)$expQty, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$expUntCst, 2, '.', ',') . '</b> </td>
    <td style="text-align:right;" > <b>' . number_format((float)$expTtlCst, 2, '.', ',') . '</b> </td>
  </tr></table>';

$html5 = <<<EOD
EOD;
$html5 .= '
<table border="0">
<tr><td>
<table border="1" style="text-align:center;" >
  <tr>
    <td style="width:100px;text-align:right;" > <b> Total Project Cost &nbsp; </b> </td>
    <td style="width:125px;text-align:right;" > ' . number_format((float)$pwpId[0]['totPrjCst'], 2, '.', ',') . ' &nbsp; </td>
  </tr>
  <tr>
    <td style="text-align:right;" > <b> Projected Sales &nbsp; </b> </td>
    <td style="text-align:right;" > ' . number_format((float)$pwpId[0]['prjSls'], 2, '.', ',') . ' &nbsp; </td>
  </tr>
  <tr>
    <td style="text-align:right;" > <b> Projected Cost &nbsp; </b> </td>
    <td style="text-align:right;" > ' . number_format((float)$pwpId[0]['prjCst'], 2, '.', ',') . ' &nbsp; </td>
  </tr>
  <tr>
    <td style="text-align:right;" > <b> Cost to Sales Ratio (%) &nbsp; </b> </td>
    <td style="text-align:right;" > ' . number_format((float)$ctsR, 2, '.', ',') . '% &nbsp; </td>
  </tr>
</table>
</td>
<td>
</td></tr></table>
';

$html6 = <<<EOD
EOD;

$html6 .= '
<table border="0" style="text-align:center;">
  <tr>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
    <td style="width:45px;" >  </td>
  </tr>
  <tr>
    <td colspan="4" style="text-align:left;" > Requestor: </td>
    <td colspan="4" style="text-align:left;" > Checker: </td>
    <td colspan="4" style="text-align:left;" > Approver </td>
  </tr>
  <tr>
    <td colspan="4" style="line-height: 30px;"> ' . $gSig0 . ' </td>
    <td colspan="4" > ' . $gSig1 . ' </td>
    <td colspan="4" > ' . $gSig2 . ' </td>
  </tr>
  <tr>
    <td colspan="1" >  </td>
    <td colspan="2" style="border-top: 1px solid black;" >' . $gSig[0]['aUsr0'] . '</td>
    <td colspan="1" >  </td>
    <td colspan="1" >  </td>
    <td colspan="2" style="border-top: 1px solid black;" >' . $gSig[0]['aUsr1'] . '</td>
    <td colspan="1" >  </td>
    <td colspan="1" >  </td>
    <td colspan="2" style="border-top: 1px solid black;" >' . $gSig[0]['aUsr2'] . '</td>
    <td colspan="1" >  </td>
  </tr>
  <tr>
    <td colspan="4" style="text-align:left;" > Marketing: </td>
    <td colspan="4" > </td>
    <td colspan="4" > </td>
  </tr>
  <tr>
    <td colspan="4" style="line-height: 30px;"> ' . $gSig3 . ' </td>
    <td colspan="4" >  </td>
    <td colspan="4" >  </td>
  </tr>
  <tr>
    <td colspan="1" >  </td>
    <td colspan="2" style="border-top: 1px solid black;" >' . $gSig[0]['aUsr3'] . '</td>
    <td colspan="1" >  </td>
    <td colspan="1" >  </td>
    <td colspan="2" >  </td>
    <td colspan="1" >  </td>
    <td colspan="1" >  </td>
    <td colspan="2" style="border-top: 1px solid black;" >Steven Leung</td>
    <td colspan="1" >  </td>
  </tr>
</table>';
if(($iPCECnt + $iPVACnt) < 10){
  $pdf->writeHTML($html0);
  $pdf->Ln(5);
  $pdf->writeHTML($html1);
  $pdf->Ln(5);
  $pdf->writeHTML($html2);
  $pdf->Ln(5);
  $pdf->writeHTML($html3);
  $pdf->Ln(5);
  $pdf->writeHTML($html4);
  $pdf->Ln(5);
  $pdf->writeHTML($html5);
  $pdf->Ln(5);
  $pdf->writeHTML($html6);
}else{
  $pdf->writeHTML($html0);
  $pdf->Ln(5);
  $pdf->writeHTML($html1);
  $pdf->Ln(5);
  $pdf->writeHTML($html2);
  $pdf->Ln(5);
  $pdf->writeHTML($html5);
  $pdf->Ln(5);
  $pdf->writeHTML($html6);
  $pdf->AddPage();
  $pdf->writeHTML($html3);
  $pdf->Ln(5);
  $pdf->writeHTML($html4);
}
$pdf->Output($pdf_Name, 'I'); 
?>
