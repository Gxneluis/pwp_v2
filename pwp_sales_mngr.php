<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style><?php include 'css/css_sales.css'; ?></style>
	<script><?php include 'js/js_pwp_sales.js'; ?></script>
	<script><?php include 'js/js_pwp_sales2.js'; ?></script>
</head>
<body>
<br /><br /><br />
<?php

include 'nav_bar.php';
$iCurrYear = date("Y");
$iPrevYear = date("Y")-1;
// PWP Sales Dashboard
echo '
<button id="idBtn_CreateDraft">Create Draft</button>
<div class="cViewReport">
	<div class="tab">
	  <button class="tabLinks active" id="idDraftBtn">DRAFT</button>
	  <button class="tabLinks" id="idRejectBtn">REJECTED</button>
		<button class="tabLinks" id="idPendingBtn">for ASM APPROVAL</button>
		<button class="tabLinks" id="idReviewedBtn">for ASH APPROVAL</button>
		<button class="tabLinks" id="idApprovedBtn">for MM APPROVAL</button>
		<button class="tabLinks" id="idFinalBtn">APPROVED</button>
	</div>
	<div id="idPendingTab" class="tabContent" style="display:none">
		<input type="date" id="idFromDate" value="'.date('Y-m-d').'" hidden>
		<input type="date" id="idToDate" value="'.date('Y-m-d').'" hidden>

		<div>
			<table border="1" id="idTblPending">
				<tr>
				<th class="tblVw00" >#</th>
				<th class="tblVw01" >PWP Date</th>
				<th class="tblVw02" >Activity Type</th>
				<th class="tblVw03" >Project Title</th>
				<th class="tblVw04" >Name of account</th>
				<th class="tblVw05" >Territory</th>
				<th class="tblVw06" >Incremental Target Sales</th>
				<th class="tblVw07" >Projected Volume<br />Total Project Duration</th>
				<th class="tblVw08" >Projected Cost</th>
				<th class="tblVw09" >CtS</th>
				<th class="tblVw10" >Action</th>
				</tr>
			</table>
			<div id="idPgng1"></div>
		</div>
	</div>
	<div id="idRejectTab" class="tabContent" style="display:none">
	  <div>
	    <table border="1" id="idTblReject">
				<tr>
				<th class="tblVw00" >#</th>
				<th class="tblVw01" >PWP Date</th>
				<th class="tblVw02" >Activity Type</th>
				<th class="tblVw03" >Project Title</th>
				<th class="tblVw04" >Name of account</th>
				<th class="tblVw05" >Territory</th>
				<th class="tblVw06" >Incremental Target Sales</th>
				<th class="tblVw07" >Projected Volume<br />Total Project Duration</th>
				<th class="tblVw08" >Projected Cost</th>
				<th class="tblVw09" >CtS</th>
				<th class="tblVw10" >Action</th>
				</tr>
			</table>
			<div id="idPgng2"></div>
		</div>
	</div>
	<div id="idReviewTab" class="tabContent" style="display:none">
		<div>
			<table border="1" id="idTblReviewed">
				<tr>
				<th class="tblVw00" >#</th>
				<th class="tblVw01" >PWP Date</th>
				<th class="tblVw02" >Activity Type</th>
				<th class="tblVw03" >Project Title</th>
				<th class="tblVw04" >Name of account</th>
				<th class="tblVw05" >Territory</th>
				<th class="tblVw06" >Incremental Target Sales</th>
				<th class="tblVw07" >Projected Volume<br />Total Project Duration</th>
				<th class="tblVw08" >Projected Cost</th>
				<th class="tblVw09" >CtS</th>
				<th class="tblVw10" >Action</th>
				</tr>
			</table>
			<div id="idPgng5"></div>
		</div>
	</div>
	<div id="idApproveTab" class="tabContent" style="display:none">
		<div>
			<table border="1" id="idTblApproved">
				<tr>
				<th class="tblVw00" >#</th>
				<th class="tblVw01" >PWP Date</th>
				<th class="tblVw02" >Activity Type</th>
				<th class="tblVw03" >Project Title</th>
				<th class="tblVw04" >Name of account</th>
				<th class="tblVw05" >Territory</th>
				<th class="tblVw06" >Incremental Target Sales</th>
				<th class="tblVw07" >Projected Volume<br />Total Project Duration</th>
				<th class="tblVw08" >Projected Cost</th>
				<th class="tblVw09" >CtS</th>
				<th class="tblVw10" >Action</th>
				</tr>
			</table>
			<div id="idPgng3"></div>
		</div>
	</div>
	<div id="idDraftTab" class="tabContent">
		<div>
			<table border="1" id="idTblDraft">
				<tr>
				<th class="tblVw00" >#</th>
				<th class="tblVw01" >PWP Date</th>
				<th class="tblVw02" >Activity Type</th>
				<th class="tblVw03" >Project Title</th>
				<th class="tblVw04" >Name of account</th>
				<th class="tblVw05" >Territory</th>
				<th class="tblVw06" >Incremental Target Sales</th>
				<th class="tblVw07" >Projected Volume<br />Total Project Duration</th>
				<th class="tblVw08" >Projected Cost</th>
				<th class="tblVw09" >CtS</th>
				<th class="tblVw10" >Action</th>
				</tr>
			</table>
			<div id="idPgng4"></div>
		</div>
	</div>
	<div id="idFinalTab" class="tabContent" style="display:none">
		<div>
			<table border="1" id="idTblFinal">
				<tr>
				<th class="tblVw00" >#</th>
				<th class="tblVw01" >PWP Date</th>
				<th class="tblVw02" >Activity Type</th>
				<th class="tblVw03" >Project Title</th>
				<th class="tblVw04" >Name of account</th>
				<th class="tblVw05" >Territory</th>
				<th class="tblVw06" >Incremental Target Sales</th>
				<th class="tblVw07" >Projected Volume<br />Total Project Duration</th>
				<th class="tblVw08" >Projected Cost</th>
				<th class="tblVw09" >CtS</th>
				<th class="tblVw10" >Action</th>
				</tr>
			</table>
			<div id="idPgng10"></div>
		</div>
	</div>
</div>
<div class="modal" id="idModal_PWPDetails" >
        <form method="get" action="includes/pdf_generator_v2.php" target="_blank">
          <input type="text" id="idPwpId" class="" name="nPwpId" hidden >
          <button id="idBtpdf" class="" >PDF</button>
        </form>
	<div id="idCmtDiv" class="" >
	  By:
		<br /><input type="text" id="idCmtBy" class="" readonly>
		<br />Comment:
		<br /><input type="text" id="idCmtTxt" class="" readonly>
	</div>
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
				<div id="" class="dtl-t15">YTD TARGET</div>
				<div id="" class="dtl-t16">YTD ACTUAL</div>
				<div id="" class="dtl-t17">START</div>
				<div id="" class="dtl-t18">END</div>

				<div id="" class="dtl-i1"><input type="text" id="idPWPSNo" class="wid-45" placeholder="(For Marketing Admin Only)" ></div>
				<div id="" class="dtl-i2"><input type="text" id="idCstCnt" class="wid-45" placeholder="(For Marketing Admin or Accounting Only)" ></div>
				<div id="" class="dtl-i3"><input type="date" id="idDatPWP" class="wid-dt" ></div>
				<div id="" class="dtl-i4"><input type="text" id="idActNam" class="wid-45" ></div>
				<div id="" class="dtl-i5"><select id="idChaCla" class="wid-45" >
                    <option value="1">CONVENIENCE STORE</option>
                    <option value="2">DISTRIBUTOR</option>
                    <option value="3">DRUG STORE</option>
                    <option value="4">GROCERY</option>
                    <option value="5">HRI</option>
                    <option value="6">MARKET STALL</option>
                    <option value="7">OFFICE SALES</option>
                    <option value="8">SARI SARI STORE LARGE</option>
                    <option value="9">SARI SARI STORE MEDIUM</option>
                    <option value="10">SARI SARI STORE SMALL</option>
                    <option value="11">SUPERMARKET A</option>
                    <option value="12">SUPERMARKET B</option>
                    <option value="13">SUPERMARKET C</option>
                    <option value="14">WHOLESALER</option>
                    </select ></div>
				<div id="" class="dtl-i6"><input type="date" id="idDatFrm" class="wid-dt" ></div>
				<div id="" class="dtl-i7"><input type="date" id="idDateTo" class="wid-dt" ></div>
				<div id="" class="dtl-i8"><input type="text" id="idTrrtry" class="wid-45" ></div>
				<div id="" class="dtl-i9"><input type="date" id="idEvlDdl" class="wid-dt" ></div>
				<div id="" class="dtl-i10"><select id="idActTyp" class="wid-45" >
						<option value="1">ANNIVERSARY SUPPORT</option>
						<option value="2">CHANGE VENDOR FEE</option>
						<option value="3">CHRISTMAS SUPPORT</option>
						<option value="4">DEALS</option>
						<option value="5">DELIVERY PENALTY</option>
						<option value="35">DISPLAY ALLOWANCE</option>
						<option value="6">DISTRIBUTOR INCENTIVES</option>
						<option value="7">DSP INCENTIVES</option>
						<option value="8">ECOMMERCE COMMISSION FEES</option>
						<option value="9">ECOMMERCE HANDLING FEES</option>
						<option value="10">ECOMMERCE SHIPPING FEES</option>
						<option value="11">EVENTS SPONSORSHIPS / ACTIVATIONS</option>
						<option value="12">GONDOLA FABRICATION</option>
						<option value="13">GROWTH INCENTIVES</option>
						<option value="14">IN HOUSE MERCHANDISER</option>
						<option value="32">INTRO DISCOUNT</option>
						<option value="15">LISTING FEE ORAL CAT.</option>
						<option value="16">LISTING FEE PAPER CAT.</option>
						<option value="17">LISTING FEE PERSONAL CARE CAT.</option>
						<option value="18">MANPOWER - SPECIAL BUNDLING</option>
						<option value="19">MDU</option>
						<option value="20">MERCHANDISER INCENTIVES</option>
						<option value="21">MERCHANDISER PENALTY AND CHARGES</option>
						<option value="22">MERCHANDISER SALARIES</option>
						<option value="23">MERCHANDISING GEN. ASSEMBLY</option>
						<option value="24">MERCHANDISING SUPPLIES</option>
						<option value="33">MISCELLANEOUS</option>
						<option value="25">OPENING SUPPORT</option>
						<option value="34">OTHERS</option>
						<option value="26">PASS ON DISCOUNT</option>
						<option value="27">PORTAL PAYMENT</option>
						<option value="28">PRIMARY SHELF</option>
						<option value="29">PROMO BUNDLING</option>
						<option value="30">REBATES / PRICE OFF</option>
						<option value="31">THEMATIC SUPPORT / MAILER / JOINING FEE</option>
          </select></div>
				<div id="" class="dtl-i13"><input type="text" id="idPrjTyp" class="wid-45" hidden></div>
				<div id="" class="dtl-i11"><input type="text" id="idTrdDsc" class="wid-45" ></div>
				<div id="" class="dtl-i12"><input type="text" id="idMontDA" class="wid-45" ></div>
				<div id="" class="dtl-i14"><input type="text" id="idTtlSls" class="wid-45" ></div>
				<div id="" class="dtl-i16"><input type="text" id="idYTDTrg" class="wid-45" ></div>
				<div id="" class="dtl-i17"><input type="text" id="idYTDAct" class="wid-45" ></div>
				<div id="" class="dtl-i19">Diff.<input type="text" id="idYTDDif" class="wid-40" ></div>
				<div id="" class="dtl-i21">Achieved<input type="text" id="idYTDAch" class="wid-40" ></div>

				<div class="dtl-b1a">BACKGROUND:</div>
				<div class="dtl-b1b"><textarea rows="4" id="idTxtBg" maxlength="200"></textarea></div>
				<div class="dtl-b2a">PROMO TITLE:</div>
				<div class="dtl-b2b"><textarea rows="4" id="idTxtPrmoTtle" maxlength="50"></textarea></div>
				<div class="dtl-b3a">OBJECTIVES:</div>
				<div class="dtl-b3b"><textarea rows="4" id="idTxtObj" maxlength="200"></textarea></div>
				<div class="dtl-b4a">MECHANICS:</div>
				<div class="dtl-b4b"><textarea rows="4" id="idTxtMch" maxlength="200"></textarea></div>
				<div class="dtl-b5a">CONCESSION/S:</div>
				<div class="dtl-b5b"><textarea rows="4" id="idTxtConc" maxlength="100"></textarea></div>
				<div class="dtl-b6a">RISK/S INVOLVED:</div>
				<div class="dtl-b6b"><textarea rows="4" id="idTxtRisk" maxlength="100"></textarea></div>

				<div id="cDivPVA" class="dtl-a" >
					<div class="div_bold btn_cntr" >
						<h3>Projected Volume Analysis<button onclick="addPVA()">+</button></h3>
						<table border="1" id="idPVATable">
							<thead>
								<tr>
									<th rowspan="2" width="20%" >Category/Brand</th>
									<th colspan="2" >AVG. MONTHLY SALES<br />(PAST 3 or 6 MONTHS)</th>
									<th colspan="2" >INCREMENTAL TARGET SALES</th>
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
						<h3>Promo Cost Estimates<button onclick="addPCE()">+</button></h3>
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
				<div class="dtl-f2" ><input type="text" id="idTtlPrjCst" width="200" readonly ></div>
				<div class="dtl-f3" >Projected Sales</div>
				<div class="dtl-f4" ><input type="text" id="idPrjtdSale" class="" width="200" ></div>
				<div class="dtl-f5" >Projected Cost</div>
				<div class="dtl-f6" ><input type="text" id="idPrjtdCost" class="" width="200" readonly ></div>
				<div class="dtl-f7" >Cost to Sales Ratio (%)</div>
				<div class="dtl-f8" ><input type="text" id="idCostToSalesRatio" class="s_txt" hidden ><input type="text" id="idCtoSRatPer" class="" width="200" readonly ></div>
				<div id="" class="dtl-f9">
					<div class="" id="idVwForm" >
						<div class="grid-cont-file-upl">
							<div id="" class="grd-upd-00" >
								Supporting Documents / Attachment
							</div>
							<div id="" class="grd-upd-01" >
								<p><a href="" id="idComp"></a></p>
								<p><a href="" id="idFcAl"></a></p>
								<p><a href="" id="idHiDa"></a></p>
								<p><a href="" id="idReDa"></a></p>
							</div>
							<div id="" class="grd-upd-02" >
								<p><a href="" id="idRePh"></a></p>
								<p><a href="" id="idSche"></a></p>
								<p><a href="" id="idTrLe"></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button id="idBtn_dSave">Save Draft</button>
		<button id="idBtn_dUpdate">Update Draft</button>
		<button id="idBtn_dSbmt">Submit Draft</button>
	</div>
</div>
';
?>

</body>
</html>
