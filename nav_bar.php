
<?php
$lnk_sales = "";
$lnk_aws = "";
$lnk_mngr = "";
$lnk_auth = "";
if(isset($_SESSION['type_asn']) && !empty($_SESSION['type_asn']) && $_SESSION['type_asn']==true){
	$lnk_sales = '<li class="float_left"><a href = "pwp_sales_mngr.php">Sales</a></li>';
}
if(isset($_SESSION['type_sub']) && !empty($_SESSION['type_sub']) && $_SESSION['type_sub']==true){
	$lnk_aws = '<li class="float_left"><a href = "pwp_asm_mngr.php">ASM</a></li>';
}
if(isset($_SESSION['type_grp']) && !empty($_SESSION['type_grp']) && $_SESSION['type_grp']==true){
	$lnk_mngr = '<li class="float_left"><a href = "pwp_mngr_mngr.php">ASH</a></li>';
}
if(isset($_SESSION['usrPos']) && !empty($_SESSION['usrPos']) && $_SESSION['usrPos']==2){
	$lnk_auth = '<li class="float_left"><a href = "pwp_mm.php">MM</a></li>';
}
if(isset($_SESSION['usrPos']) && !empty($_SESSION['usrPos']) && $_SESSION['usrPos']==1){
	$lnk_auth = '<li class="float_left"><a href = "pwp_mm.php">CEO</a></li>';
}
if(isset($_SESSION['usrPos']) && !empty($_SESSION['usrPos']) && $_SESSION['usrPos']==3){
	$lnk_auth = '<li class="float_left"><a href = "pwp_vw.php">Viewer</a></li>';
}
$usr = '
<li class="float_right" hidden><a href = "usr_pfl.php" >Profile</a></li>
<li class="float_right" ><a href = "usr_chg_sig.php">Update Signature</a></li>
<li class="float_right" ><a href = "usr_chg_psw.php" >Change Password</a></li>
<li class="float_right" ><a href = "index.php">Log out</a></li>
';
echo '<div id="idBoardLink"><ul>'.$lnk_sales.$lnk_aws.$lnk_mngr.$lnk_grup.$lnk_auth.$usr.'</ul></div>';
