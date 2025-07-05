<?php
session_start();
include 'query/pwp.php';
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$aDetails = []; $aPVA = []; $aPCE = [];
$aValue = $_POST["aValue"];

if($aValue[7]===''){ $iDA = 0; }
else{ $iDA = $aValue[7]; }
if($aValue[8]===''){ $iPWPSerNo = 0; }
else{ $iPWPSerNo = $aValue[8]; }
if($aValue[9]==''){ $iCostCent = 0; }
else{ $iCostCent = $aValue[9]; }

array_push($aDetails, $aValue[0], $aValue[1], $aValue[2], $aValue[3], $aValue[4], $aValue[5], $aValue[6], $iDA, $iPWPSerNo, $iCostCent, $aValue[10], $aValue[11], $aValue[12], $aValue[13], $aValue[14], $aValue[15], $aValue[16], $aValue[17], $aValue[18], $aValue[19], $aValue[20]);
array_push($aPVA, $aValue[21], $aValue[22], $aValue[23], $aValue[24], $aValue[25], $aValue[26], $aValue[27]);
array_push($aPCE, $aValue[28], $aValue[29], $aValue[30], $aValue[31], $aValue[32], $aValue[33], $aValue[34], $aValue[35]);
echo saveDraft($aDetails);
// echo json_encode ($aValue);
// echo json_encode ($aDetails);
// echo json_encode ($aPVA);
// echo json_encode ($aPCE);
echo "";