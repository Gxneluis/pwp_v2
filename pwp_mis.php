<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style><?php include 'css/css_mis.css'; ?></style>
	<script><?php include 'js/js_mis.js'; ?></script>
</head>
<body>
<br /><br /><br />
<button onClick="location.href='forAdmin/'">Hey</button>
<?php

include 'nav_bar.php';
$iCurrYear = date("Y");
$iPrevYear = date("Y")-1;
// PWP -- Dashboard
echo '
<div class="cViewReport">
	<div id="idVwTab" class="tabContent">
		<div>
			<table border="1" id="idTbl_MIS">
				<tr>
				<th class="tblVwA00" ># <br /> PWP Date</th>
				<th class="tblVwA01" >Account Name</th>
				<th class="tblVwA02" >ASM</th>
				<th class="tblVwA03" >ASH</th>
				<th class="tblVwA04" >MM</th>
				<th class="tblVwA05" >Approved</th>
				<th class="tblVwA06" >Rejected</th>
				</tr>
			</table>
			<div id="idPgng"></div>
		</div>
	</div>
</div>
<div class="modal" id="idModal_PWPDetails" >
        <form method="get" action="includes/pdf_generator_v2.php" target="_blank">
          <input type="text" id="idPwpId" class="" name="nPwpId" hidden >
          <button id="idBtpdf" class="" >PDF</button>
        </form>
	<div id="idDiv_Request" class="cReview tabDtl" >
		<div id="cDivDtl" class="" >
			<div class="div_bold grid-cont-pwp-req" >
				<div id="" class="dtl-t1">DATE OF PWP:</div>
				<div id="" class="dtl-t2">PWP SERIES NO.:</div>
				<div id="" class="dtl-t3">NAME OF ACCOUNT</div>
				<div id="" class="dtl-t4">COST CENTER</div>
				<div id="" class="dtl-t5">CHANNEL CLASS</div>
				<div id="" class="dtl-t6">PROMO DURATION</div>
				<div id="" class="dtl-t7">TERRITORY</div>
				<div id="" class="dtl-t8">POST PROMO EVALUATION DEADLINE</div>
				<div id="" class="dtl-t9">ACTIVITY TYPE</div>
				<div id="" class="dtl-t10">TRADE DISCOUNT</div>
				<div id="" class="dtl-t11">MONTHLY DA (IF APPLICABLE)</div>
				<div id="" class="dtl-t13">TOTAL '.$iPrevYear.' SALES</div>
				<div id="" class="dtl-t14">TOTAL '.$iCurrYear.' TARGET</div>
				<div id="" class="dtl-t15">YTD TARGET</div>
				<div id="" class="dtl-t16">YTD ACTUAL</div>
				<div id="" class="dtl-t17">START</div>
				<div id="" class="dtl-t18">END</div>

				<div id="" class="dtl-i1"><input type="text" id="idPWPSNo" class="wid-45" placeholder="(For Marketing Admin Only)" ></div>
				<div id="" class="dtl-i2"><input type="text" id="idCstCnt" class="wid-45" placeholder="(For Marketing Admin or Accounting Only)" ></div>
				<div id="" class="dtl-i3"><input type="date" id="idDatPWP" class="wid-dt" ></div>
				<div id="" class="dtl-i4"><input type="text" id="idActNam" class="wid-45" ></div>
				<div id="" class="dtl-i5"><input type="text" id="idChaCla" class="wid-45" ></div>
				<div id="" class="dtl-i6"><input type="date" id="idDatFrm" class="wid-dt" ></div>
				<div id="" class="dtl-i7"><input type="date" id="idDateTo" class="wid-dt" ></div>
				<div id="" class="dtl-i8"><input type="text" id="idTrrtry" class="wid-45" ></div>
				<div id="" class="dtl-i9"><input type="date" id="idEvlDdl" class="wid-dt" ></div>
				<div id="" class="dtl-i10"><input type="text" id="idActTyp" class="wid-45" ></div>
				<div id="" class="dtl-i11"><input type="text" id="idTrdDsc" class="wid-45" ></div>
				<div id="" class="dtl-i12"><input type="text" id="idMontDA" class="wid-45" ></div>
				<div id="" class="dtl-i13"><input type="text" id="idPrjTyp" class="wid-45" hidden></div>
				<div id="" class="dtl-i14"><input type="text" id="idTtlSls" class="wid-45" ></div>
				<div id="" class="dtl-i15"><input type="text" id="idTtlTrg" class="wid-45" ></div>
				<div id="" class="dtl-i16"><input type="text" id="idYTDTrg" class="wid-45" ></div>
				<div id="" class="dtl-i17"><input type="text" id="idYTDAct" class="wid-45" ></div>
				<div id="" class="dtl-i18">Diff.<input type="text" id="idTtlDif" class="wid-40" ></div>
				<div id="" class="dtl-i19">Diff.<input type="text" id="idYTDDif" class="wid-40" ></div>
				<div id="" class="dtl-i20">Growth<input type="text" id="idTtlGrw" class="wid-40" ></div>
				<div id="" class="dtl-i21">Achieved<input type="text" id="idYTDAch" class="wid-40" ></div>

				<div class="dtl-b1a">BACKGROUND:</div>
				<div class="dtl-b1b"><textarea rows="4" id="idTxtBg"></textarea></div>
				<div class="dtl-b2a">PROMO TITLE:</div>
				<div class="dtl-b2b"><textarea rows="4" id="idTxtPrmoTtle"></textarea></div>
				<div class="dtl-b3a">OBJECTIVES:</div>
				<div class="dtl-b3b"><textarea rows="4" id="idTxtObj"></textarea></div>
				<div class="dtl-b4a">MECHANICS:</div>
				<div class="dtl-b4b"><textarea rows="4" id="idTxtMch"></textarea></div>
				<div class="dtl-b5a">CONCESSION/S:</div>
				<div class="dtl-b5b"><textarea rows="4" id="idTxtConc"></textarea></div>
				<div class="dtl-b6a">RISK/S INVOLVED:</div>
				<div class="dtl-b6b"><textarea rows="4" id="idTxtRisk"></textarea></div>

				<div id="cDivPVA" class="dtl-a" >
					<div class="div_bold btn_cntr" >
						<h3>Projected Volume Analysis</h3>
						<table border="1" id="idPVATable">
							<thead>
								<tr>
									<th rowspan="2" width="20%" >Category/Brand</th>
									<th colspan="2" >AVG. MONTHLY SALES<br />(PAST 3 OR 6 MONTHS)</th>
									<th colspan="2" >TARGET SALES</th>
									<th colspan="2" >PROJECTED VOLUME<br />(Mo.Average + Incremental)</th>
									<th colspan="2" >PROJECTED VOLUME<br />(Total Project Duration)</th>
									<th rowspan="2" width="5%" >Action</th>
								</tr>
								<tr>
									<th width="9%">In Case</th>
									<th width="9%">Peso Value</th>
									<th width="9%">In Case</th>
									<th width="9%">Peso Value</th>
									<th width="9%">In Case</th>
									<th width="9%">Peso Value</th>
									<th width="9%">In Case</th>
									<th width="9%">Peso Value</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<td>TOTAL</td>
									<td><input type="text" id="idAMSInCaseTotal"  readonly></td>
									<td><input type="text" id="idAMSPesValTotal"  readonly></td>
									<td><input type="text" id="idITSInCaseTotal"  readonly></td>
									<td><input type="text" id="idITSPesValTotal"  readonly></td>
									<td><input type="text" id="idMAIInCaseTotal"  readonly></td>
									<td><input type="text" id="idMAIPesValTotal"  readonly></td>
									<td><input type="text" id="idTPDInCaseTotal"  readonly></td>
									<td><input type="text" id="idTPDPesValTotal"  readonly></td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>

				<div id="cDivPCE" class="dtl-e" >
					<div class="div_bold btn_cntr" >
						<h3>Promo Cost Estimates</h3>
						<table border="1" id="idPCETable">
							<thead>
								<tr>
									<th width="25%">Item Description</th>
									<th width="8%">Qty</th>
									<th width="8%">Unit Cost</th>
									<th width="8%">Total Cost</th>
									<th width="25%">Expense Description</th>
									<th width="8%">Qty</th>
									<th width="8%">Unit Cost</th>
									<th width="8%">Total Cost</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<td>TOTAL</td>
									<td><input type="text" id="idItmstiQtyTotal"  readonly></td>
									<td><input type="text" id="idItmUntCstTotal"  readonly></td>
									<td><input type="text" id="idItmTtlCstTotal"  readonly></td>
									<td>TOTAL</td>
									<td><input type="text" id="idExpnseQtyTotal"  readonly></td>
									<td><input type="text" id="idExpUntCstTotal"  readonly></td>
									<td><input type="text" id="idExpTtlCstTotal"  readonly></td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="dtl-f1" >Total Project Cost</div>
				<div class="dtl-f2" ><input type="text" id="idTtlPrjCst"></div>
				<div class="dtl-f3" >Projected Sales</div>
				<div class="dtl-f4" ><input type="text" id="idPrjtdSale" class="s_txt"></div>
				<div class="dtl-f5" >Projected Cost</div>
				<div class="dtl-f6" ><input type="text" id="idPrjtdCost" class="s_txt"></div>
				<div class="dtl-f7" >Cost to Sales Ratio (%)</div>
				<div class="dtl-f8" ><input type="text" id="idCostToSalesRatio" class="s_txt"><input type="text" id="idCtoSRatPer" class="s_txt"></div>
				<div id="mdl_upld" class="dtl-f9" >
					<div class="grid-cont-file-upl" >
						<div id="" class="grd-upd-00" >
							Supporting Documents / Attachment
						</div>
						<div id="" class="grd-upd-01" >
							<p><div id="idComp"></div></p>
							<p><div id="idFcAl"></div></p>
							<p><div id="idHiDa"></div></p>
							<p><div id="idReDa"></div></p>
						</div>
						<div id="" class="grd-upd-02" >
							<p><div id="idRePh"></div></p>
							<p><div id="idSche"></div></p>
							<p><div id="idTrLe"></div></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
';
?>

</body>
</html>
