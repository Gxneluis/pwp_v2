<?php
echo '<!DOCTYPE html>';
require_once '../includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();

$uName = $_POST['uName'];
$pWord = $_POST['pWord'];
$ePass = md5($pWord);
$qry="SELECT * FROM accounts WHERE `username` = '$uName' AND `password` = '$ePass'";
$qryRes = $conn->query($qry);
$aQueRes=mysqli_fetch_array($qryRes);
// Set Session
$_SESSION['empId'] = $aQueRes["id"];
$_SESSION['fName'] = $aQueRes["firstName"];
$_SESSION['mName'] = $aQueRes["middleName"];
$_SESSION['lName'] = $aQueRes["lastName"];
$_SESSION['usrPos'] = $aQueRes["position"];
// Set Array
$aPWP['empId'] = $aQueRes["id"];
$aPWP['fName'] = $aQueRes["firstName"];
$aPWP['mName'] = $aQueRes["middleName"];
$aPWP['lName'] = $aQueRes["lastName"];
$aPWP['usrPos'] = $aQueRes["position"];
// Set Employee ID
$empID = $_SESSION["empId"];
// Check if Account has ASH access
$qry_grp="SELECT * FROM pwpgroupdetails WHERE `approvers` = '$empID'";
$qryRes_grp = $conn->query($qry_grp);
if($qryRes_grp->num_rows!=0){ $_SESSION['type_grp'] = true; }
// Check if Account has ASM access
$qry_sub="SELECT * FROM pwpsubgroupdetails WHERE `reviewer` = '$empID'";
$qryRes_sub = $conn->query($qry_sub);
if($qryRes_sub->num_rows!=0){ $_SESSION['type_sub'] = true; }
// Check if Account has Sales access
$qry_asn="SELECT * FROM pwpgrouping WHERE `employeeId` = '$empID'";
$qryRes_asn = $conn->query($qry_asn);
if($qryRes_asn->num_rows!=0){ $_SESSION['type_asn'] = true; }

if( $uName==$pWord ){ header("location:usr_NewPsw.php"); }
elseif( $_SESSION['type_asn'] == true ){ header("location:pwp_sales_mngr.php"); }
elseif( $_SESSION['type_sub'] == true ){ header("location:pwp_asm_mngr.php"); }
elseif( $_SESSION['type_grp'] == true ){ header("location:pwp_mngr_mngr.php"); }
elseif( $_SESSION['usrPos'] == 1 ){ header("location:pwp_mm.php"); }
elseif( $_SESSION['usrPos'] == 2 ){ header("location:pwp_mm.php"); }
elseif( $_SESSION['usrPos'] == 3 ){ header("location:pwp_gm.php"); }
else{ header("location:index.php"); }
