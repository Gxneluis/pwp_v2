var aGData = [];
iObj = 0;
iMch = 0;
function valiFields(){
  aErr = [];
  aErr["bVal"]=true;
  aErr["sMsg"]="";
  // content validation - check if fields have value
  if(document.getElementById("idDatPWP").value==""){ aErr["sMsg"]+="\n PWP Date not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idActNam").value==""){ aErr["sMsg"]+="\n Account Name not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idChaCla").value==""){  aErr["sMsg"]+="\n Channel Class not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idDatFrm").value==""){  aErr["sMsg"]+="\n Promo Start Date not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idDateTo").value==""){  aErr["sMsg"]+="\n Promo End Date not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idTrrtry").value==""){  aErr["sMsg"]+="\n Territory not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idEvlDdl").value==""){  aErr["sMsg"]+="\n Evaluation Deadline not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idActTyp").value==""){  aErr["sMsg"]+="\n Activity Type not Found"; aErr["bVal"]=false;}
//  if(document.getElementById("idPrjTyp").value==""){ return false; }
  if(document.getElementById("idTrdDsc").value==""){  aErr["sMsg"]+="\n Trade Discount not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idTtlSls").value==""){  aErr["sMsg"]+="\n Total Sales not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idYTDTrg").value==""){  aErr["sMsg"]+="\n YTD Target not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idYTDAct").value==""){  aErr["sMsg"]+="\n YTD Actual not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idYTDDif").value==""){  aErr["sMsg"]+="\n YTD Diff not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idYTDAch").value==""){  aErr["sMsg"]+="\n YTD Achieved not Found"; aErr["bVal"]=false;}

  if(document.getElementById("idTxtBg").value==""){  aErr["sMsg"]+="\n Background not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtPrmoTtle").value==""){  aErr["sMsg"]+="\n Promo Title not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtObj").value==""){  aErr["sMsg"]+="\n Objective not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtMch").value==""){  aErr["sMsg"]+="\n Mechanic not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtConc").value==""){  aErr["sMsg"]+="\n Concessions not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtRisk").value==""){  aErr["sMsg"]+="\n Risks not Found"; aErr["bVal"]=false;}

  if(document.getElementById("idTtlPrjCst").value==""){  aErr["sMsg"]+="\n Total Project not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idPrjtdSale").value==""){  aErr["sMsg"]+="\n Projected Sales not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idPrjtdCost").value==""){  aErr["sMsg"]+="\n Projected Cost not Found"; aErr["bVal"]=false;}
  if(document.getElementById("idCtoSRatPer").value==""){  aErr["sMsg"]+="\n Cost to Sale Ratio not Found"; aErr["bVal"]=false;}
// length validation - checks if fields are not exceeding length limit
  if(document.getElementById("idActNam").value.length>50){  aErr["sMsg"]+="\n Account Name exceed Limit"; aErr["bVal"]=false;}
  if(document.getElementById("idTrrtry").value.length>50){  aErr["sMsg"]+="\n Territory exceed Limit"; aErr["bVal"]=false;}

  if(document.getElementById("idTxtBg").value.length>200){  aErr["sMsg"]+="\n Background exceed Limit"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtPrmoTtle").value.length>50){  aErr["sMsg"]+="\n Promo Title exceed Limit"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtObj").value.length>200){  aErr["sMsg"]+="\n PWP Objective exceed Limit"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtMch").value.length>200){  aErr["sMsg"]+="\n PWP Mechanic exceed Limit"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtConc").value.length>100){  aErr["sMsg"]+="\n Concession exceed Limit"; aErr["bVal"]=false;}
  if(document.getElementById("idTxtRisk").value.length>100){  aErr["sMsg"]+="\n Risk exceed Limit"; aErr["bVal"]=false;}
  //
  if(document.getElementById("idTtlSls").value.includes(",")){  aErr["sMsg"]+="\n Total Sales contain Comma"; aErr["bVal"]=false;}
  if(document.getElementById("idYTDTrg").value.includes(",")){  aErr["sMsg"]+="\n YTD Target contain Comma"; aErr["bVal"]=false;}
  if(document.getElementById("idYTDAct").value.includes(",")){  aErr["sMsg"]+="\n YTD Actual contain Comma"; aErr["bVal"]=false;}
  //
  if(document.getElementById("idPrjtdSale").value==0){  aErr["sMsg"]+="\n Projected Sale Field Cannot be 0"; aErr["bVal"]=false;}
  if(document.getElementById("idPrjtdCost").value==0){  aErr["sMsg"]+="\n Projected Cost Field Cannot be 0"; aErr["bVal"]=false;}
  if(document.getElementById("idTtlPrjCst").value==0){  aErr["sMsg"]+="\n Total Project CostField Cannot be 0"; aErr["bVal"]=false;}
  return aErr;
}
function clearTbl(){
	document.getElementById("idPWPSNo").value = "";
	document.getElementById("idCstCnt").value = "";
	document.getElementById("idDatPWP").value = "";
	document.getElementById("idActNam").value = "";
	document.getElementById("idChaCla").value = "";
	document.getElementById("idDatFrm").value = "";
	document.getElementById("idDateTo").value = "";
	document.getElementById("idTrrtry").value = "";
	document.getElementById("idEvlDdl").value = "";
	document.getElementById("idActTyp").value = "";
	document.getElementById("idTrdDsc").value = "";
	document.getElementById("idMontDA").value = "";
	document.getElementById("idPrjTyp").value = "";
	document.getElementById("idYTDTrg").value = "";
	document.getElementById("idYTDAct").value = "";
	document.getElementById("idYTDDif").value = "";
	document.getElementById("idYTDAch").value = "";

	document.getElementById("idTxtBg").value = "";
	document.getElementById("idTxtPrmoTtle").value = "";
	document.getElementById("idTxtObj").value = "";
	document.getElementById("idTxtMch").value = "";
	document.getElementById("idTxtConc").value = "";
	document.getElementById("idTxtRisk").value = "";
}
function clearPVA(){
	oTbl = document.getElementById("idPVATable");
	aTbl = oTbl.getElementsByTagName("tbody")[0];
	iTarget = aTbl.rows.length;
	for(iRun = 0; iRun<iTarget;iRun++){
		aTbl.deleteRow(0);
	}

	document.getElementById("idAMSInCaseTotal").value = 0;
	document.getElementById("idAMSPesValTotal").value = 0;
	document.getElementById("idITSInCaseTotal").value = 0;
	document.getElementById("idITSPesValTotal").value = 0;
	document.getElementById("idMAIInCaseTotal").value = 0;
	document.getElementById("idMAIPesValTotal").value = 0;
	document.getElementById("idTPDInCaseTotal").value = 0;
	document.getElementById("idTPDPesValTotal").value = 0;
}
function clearPCE(){
	oTbl = document.getElementById("idPCETable");
	aTbl = oTbl.getElementsByTagName("tbody")[0];
	iTarget = aTbl.rows.length;
	for(iRun = 0; iRun<iTarget;iRun++){
		aTbl.deleteRow(0);
	}
	document.getElementById("idItmstiQtyTotal").value = 0;
	document.getElementById("idItmUntCstTotal").value = 0;
	document.getElementById("idItmTtlCstTotal").value = 0;
	document.getElementById("idExpnseQtyTotal").value = 0;
	document.getElementById("idExpUntCstTotal").value = 0;
	document.getElementById("idExpTtlCstTotal").value = 0;
}
function chngTab(evnt, tabId){
	var i, tabContent, tabLinks;
    $("#idModal_PWPDetails").css('display','none');

	tabContent = document.getElementsByClassName("tabContent");
	for(i=0; i<tabContent.length; i++){
		tabContent[i].style.display="none";
	}

	tabLinks = document.getElementsByClassName("tabLinks");
	for(i=0; i<tabLinks.length; i++){
		tabLinks[i].className = tabLinks[i].className.replace(" active","")
	}

	document.getElementById(tabId).style.display = "block";
	evnt.currentTarget.className += " active";
}
function deLElem(sData){
	oDel = document.getElementById("idDiv"+sData);
	oDel.remove();
}
function delRow(data){
	currentRow = $(data).closest('tr').remove();
    computeTotal("txtAMSInCase","idAMSInCaseTotal");
    computeTotal("txtAMSPesVal","idAMSPesValTotal");
    computeTotal("txtITSInCase","idITSInCaseTotal");
    computeTotal("txtITSPesVal","idITSPesValTotal");
    computeTotal("txtMAIInCase","idMAIInCaseTotal");
    computeTotal("txtMAIPesVal","idMAIPesValTotal");
    computeTotal("txtTPDInCase","idTPDInCaseTotal");
    computeTotal("txtTPDPesVal","idTPDPesValTotal");
    computePrjCst();
    computePrjSal();
    computeTotal("txtItmQty","idItmstiQtyTotal");
    computeTotal("txtItmUnt","idItmUntCstTotal");
    computeTotal("txtItmTtl","idItmTtlCstTotal");
    computeTotal("txtExpQty","idExpnseQtyTotal");
    computeTotal("txtExpUnt","idExpUntCstTotal");
    computeTotal("txtExpTtl","idExpTtlCstTotal");
}
function addPVA(){
	oPVATable = document.getElementById("idPVATable").getElementsByTagName("tbody")[0];
	oRow = oPVATable.insertRow(-1);
	oCell0 = oRow.insertCell(0);
	oCell1 = oRow.insertCell(1);
	oCell2 = oRow.insertCell(2);
	oCell3 = oRow.insertCell(3);
	oCell4 = oRow.insertCell(4);
	oCell5 = oRow.insertCell(5);
	oCell6 = oRow.insertCell(6);
	oCell7 = oRow.insertCell(7);
	oCell8 = oRow.insertCell(8);
	oCell9 = oRow.insertCell(9);
	oCell0.innerHTML = '<input type="text" class="cCateBrand"  name="txtCateBrand" >';
	oCell1.innerHTML = '<input type="number" class="cAMSInCase"  name="txtAMSInCase" >';
	oCell2.innerHTML = '<input type="number" class="cAMSPesVal"  name="txtAMSPesVal" >';
	oCell3.innerHTML = '<input type="number" class="cITSInCase"  name="txtITSInCase" >';
	oCell4.innerHTML = '<input type="number" class="cITSPesVal"  name="txtITSPesVal" >';
	oCell5.innerHTML = '<input type="number" class="cMAIInCase"  name="txtMAIInCase" readonly >';
	oCell6.innerHTML = '<input type="number" class="cMAIPesVal"  name="txtMAIPesVal" readonly >';
	oCell7.innerHTML = '<input type="number" class="cTPDInCase"  name="txtTPDInCase" >';
	oCell8.innerHTML = '<input type="number" class="cTPDPesVal"  name="txtTPDPesVal" >';
	oCell9.innerHTML = '<button onclick="delRow(this)" >-</button>';
}
function insertPVA(aData,sEvent){
	oPVATable = document.getElementById("idPVATable").getElementsByTagName("tbody")[0];
	oRow = oPVATable.insertRow(-1);
	oCell0 = oRow.insertCell(0);
	oCell1 = oRow.insertCell(1);
	oCell2 = oRow.insertCell(2);
	oCell3 = oRow.insertCell(3);
	oCell4 = oRow.insertCell(4);
	oCell5 = oRow.insertCell(5);
	oCell6 = oRow.insertCell(6);
	oCell7 = oRow.insertCell(7);
	oCell8 = oRow.insertCell(8);
	oCell9 = oRow.insertCell(9);
  if(sEvent==0){
  	oCell0.innerHTML = '<input type="text" class="cCateBrand"  name="txtCateBrand" value="'+aData.cateBrand+'" readonly >';
  	oCell1.innerHTML = '<input type="text" class="cAMSInCase"  name="txtAMSInCase" value="'+aData.amsInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell2.innerHTML = '<input type="text" class="cAMSPesVal"  name="txtAMSPesVal" value="'+aData.amsPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell3.innerHTML = '<input type="text" class="cITSInCase"  name="txtITSInCase" value="'+aData.itsInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell4.innerHTML = '<input type="text" class="cITSPesVal"  name="txtITSPesVal" value="'+aData.itsPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell5.innerHTML = '<input type="text" class="cMAIInCase"  name="txtMAIInCase" value="'+aData.maiInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell6.innerHTML = '<input type="text" class="cMAIPesVal"  name="txtMAIPesVal" value="'+aData.maipvPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell7.innerHTML = '<input type="text" class="cTPDInCase"  name="txtTPDInCase" value="'+aData.tpdInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell8.innerHTML = '<input type="text" class="cTPDPesVal"  name="txtTPDPesVal" value="'+aData.tpdPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell9.innerHTML = '<button onclick="delRow(this)">-</button>';
  }else{
  	oCell0.innerHTML = '<input type="text" class="cPVAId"  name="txtPVAId" value="'+aData.pvaId+'" hidden ><input type="text" class="cCateBrand"  name="txtCateBrand" value="'+aData.cateBrand+'" >';
  	oCell1.innerHTML = '<input type="number" class="cAMSInCase"  name="txtAMSInCase" value="'+aData.amsInCase+'" >';
  	oCell2.innerHTML = '<input type="number" class="cAMSPesVal"  name="txtAMSPesVal" value="'+aData.amsPeso+'" >';
  	oCell3.innerHTML = '<input type="number" class="cITSInCase"  name="txtITSInCase" value="'+aData.itsInCase+'" >';
  	oCell4.innerHTML = '<input type="number" class="cITSPesVal"  name="txtITSPesVal" value="'+aData.itsPeso+'" >';
  	oCell5.innerHTML = '<input type="number" class="cMAIInCase"  name="txtMAIInCase" value="'+aData.maiInCase+'" >';
  	oCell6.innerHTML = '<input type="number" class="cMAIPesVal"  name="txtMAIPesVal" value="'+aData.maipvPeso+'" >';
  	oCell7.innerHTML = '<input type="number" class="cTPDInCase"  name="txtTPDInCase" value="'+aData.tpdInCase+'" >';
  	oCell8.innerHTML = '<input type="number" class="cTPDPesVal"  name="txtTPDPesVal" value="'+aData.tpdPeso+'" >';
  	oCell9.innerHTML = '<button onclick="delRow(this)">-</button>';
  }
  document.getElementById("idAMSInCaseTotal").value = (parseFloat(aData.amsInCase) + parseFloat(document.getElementById("idAMSInCaseTotal").value)).toFixed(2);
	document.getElementById("idAMSPesValTotal").value = (parseFloat(aData.amsPeso) + parseFloat(document.getElementById("idAMSPesValTotal").value)).toFixed(2);
	document.getElementById("idITSInCaseTotal").value = (parseFloat(aData.itsInCase) + parseFloat(document.getElementById("idITSInCaseTotal").value)).toFixed(2);
	document.getElementById("idITSPesValTotal").value = (parseFloat(aData.itsPeso) + parseFloat(document.getElementById("idITSPesValTotal").value)).toFixed(2);
	document.getElementById("idMAIInCaseTotal").value = (parseFloat(aData.maiInCase) + parseFloat(document.getElementById("idMAIInCaseTotal").value)).toFixed(2);
	document.getElementById("idMAIPesValTotal").value = (parseFloat(aData.maipvPeso) + parseFloat(document.getElementById("idMAIPesValTotal").value)).toFixed(2);
	document.getElementById("idTPDInCaseTotal").value = (parseFloat(aData.tpdInCase) + parseFloat(document.getElementById("idTPDInCaseTotal").value)).toFixed(2);
	document.getElementById("idTPDPesValTotal").value = (parseFloat(aData.tpdPeso) + parseFloat(document.getElementById("idTPDPesValTotal").value)).toFixed(2);
}
function sPCEExpDsc(sId,aData){
  select = document.getElementById(sId);
  for (var iRun = 0; iRun<aData.length; iRun++){
    var opt = document.createElement('option');
    opt.value = aData[iRun]['id'];
    opt.innerHTML = aData[iRun]['pce_ExpDsc'];
    select.appendChild(opt);
  }
}
function gPCEExpDsc(sId){
  $.ajax({
    url:"query/pwp_qry.php",
    method:"POST",
    dataType: "json",
    data:{ type:11 },
    success:function(data) {
      sPCEExpDsc(sId,data);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus+"\nError: " + errorThrown);
    }
  });
}
function addPCE(){
	oPCETable = document.getElementById("idPCETable").getElementsByTagName("tbody")[0];
	oRow = oPCETable.insertRow(-1);
	oCell1 = oRow.insertCell(0);
	oCell2 = oRow.insertCell(1);
	oCell3 = oRow.insertCell(2);
	oCell4 = oRow.insertCell(3);
	oCell5 = oRow.insertCell(4);
	oCell6 = oRow.insertCell(5);
	oCell7 = oRow.insertCell(6);
	oCell8 = oRow.insertCell(7);
	oCell9 = oRow.insertCell(8);
  dDate = new Date();
  dTime = dDate.getTime();
	oCell1.innerHTML = '<input type="text" class="cItmDsc"  name="txtItmDsc">';
	oCell2.innerHTML = '<input type="text" class="cItmQty"  name="txtItmQty">';
	oCell3.innerHTML = '<input type="text" class="cItmUnt"  name="txtItmUnt">';
	oCell4.innerHTML = '<input type="text" class="cItmTtl"  name="txtItmTtl" readOnly >';
    oCell5.innerHTML = '<select class="cExpDsc" name="txtExpDsc" id="pceExpDsc'+dTime+'"></select>';
//	oCell5.innerHTML = '<input type="text" class="cExpDsc"  name="txtExpDsc">';
	oCell6.innerHTML = '<input type="text" class="cExpQty"  name="txtExpQty">';
	oCell7.innerHTML = '<input type="text" class="cExpUnt"  name="txtExpUnt" >';
	oCell8.innerHTML = '<input type="text" class="cExpTtl"  name="txtExpTtl" readOnly >';
	oCell9.innerHTML = '<button onclick="delRow(this)">-</button>';
    gPCEExpDsc("pceExpDsc"+dTime);
}
function insertPCE(aData,sEvent){
	oPCETable = document.getElementById("idPCETable").getElementsByTagName("tbody")[0];
	oRow = oPCETable.insertRow(-1);
	oCell1 = oRow.insertCell(0);
	oCell2 = oRow.insertCell(1);
	oCell3 = oRow.insertCell(2);
	oCell4 = oRow.insertCell(3);
	oCell5 = oRow.insertCell(4);
	oCell6 = oRow.insertCell(5);
	oCell7 = oRow.insertCell(6);
	oCell8 = oRow.insertCell(7);
	oCell9 = oRow.insertCell(8);
  if(sEvent==0){
  	oCell1.innerHTML = '<input type="text" class="cItmDsc"  name="txtItmDsc" value="'+aData.itemDesc+'" readonly >';
  	oCell2.innerHTML = '<input type="text" class="cItmQty"  name="txtItmQty" value="'+aData.pcQty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell3.innerHTML = '<input type="text" class="cItmUnt"  name="txtItmUnt" value="'+aData.pcUnitCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell4.innerHTML = '<input type="text" class="cItmTtl"  name="txtItmTtl" value="'+aData.pcTotalCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell5.innerHTML = '<input type="text" class="cExpDsc"  name="txtExpDsc" value="'+aData.expenseDesc+'" readonly >';
  	oCell6.innerHTML = '<input type="text" class="cExpQty"  name="txtExpQty" value="'+aData.pceQty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readonly >';
  	oCell7.innerHTML = '<input type="text" class="cExpUnt"  name="txtExpUnt" value="'+aData.pceUnitCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
  	oCell8.innerHTML = '<input type="text" class="cExpTtl"  name="txtExpTtl" value="'+aData.pceTotalCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
  	oCell9.innerHTML = '<button onclick="delRow(this)">-</button>';
  }else{
  	oCell1.innerHTML = '<input type="text" class="cPCEId"  name="txtPCEId" value="'+aData.pceId+'" hidden ><input type="text" class="cItmDsc"  name="txtItmDsc" value="'+aData.itemDesc+'" >';
  	oCell2.innerHTML = '<input type="number" class="cItmQty"  name="txtItmQty" value="'+aData.pcQty+'" >';
  	oCell3.innerHTML = '<input type="number" class="cItmUnt"  name="txtItmUnt" value="'+aData.pcUnitCost+'" >';
  	oCell4.innerHTML = '<input type="number" class="cItmTtl"  name="txtItmTtl" value="'+aData.pcTotalCost+'" >';
  	oCell5.innerHTML = '<input type="text" class="cExpDsc"  name="txtExpDsc" value="'+aData.expenseDesc+'" >';
  	oCell6.innerHTML = '<input type="number" class="cExpQty"  name="txtExpQty" value="'+aData.pceQty+'" >';
  	oCell7.innerHTML = '<input type="number" class="cExpUnt"  name="txtExpUnt" value="'+aData.pceUnitCost+'" >';
  	oCell8.innerHTML = '<input type="number" class="cExpTtl"  name="txtExpTtl" value="'+aData.pceTotalCost+'" >';
  	oCell9.innerHTML = '<button onclick="delRow(this)">-</button>';
  }
  document.getElementById("idItmstiQtyTotal").value = (parseFloat(aData.pcQty) + parseFloat(document.getElementById("idItmstiQtyTotal").value)).toFixed(2);
  document.getElementById("idItmUntCstTotal").value = (parseFloat(aData.pcUnitCost) + parseFloat(document.getElementById("idItmUntCstTotal").value)).toFixed(2);
  document.getElementById("idItmTtlCstTotal").value = (parseFloat(aData.pcTotalCost) + parseFloat(document.getElementById("idItmTtlCstTotal").value)).toFixed(2);
  document.getElementById("idExpnseQtyTotal").value = (parseFloat(aData.pceQty) + parseFloat(document.getElementById("idExpnseQtyTotal").value)).toFixed(2);
  document.getElementById("idExpUntCstTotal").value = (parseFloat(aData.pceUnitCost) + parseFloat(document.getElementById("idExpUntCstTotal").value)).toFixed(2);
  document.getElementById("idExpTtlCstTotal").value = (parseFloat(aData.pceTotalCost) + parseFloat(document.getElementById("idExpTtlCstTotal").value)).toFixed(2);
}
function fillForm(aData){
	document.getElementById("idCmtBy").value = aData.cmtBy;
	document.getElementById("idCmtTxt").value = aData.cmtTxt;
	document.getElementById("idDatPWP").value = aData.pwpDate;
	document.getElementById("idActNam").value = aData.accountName;
	document.getElementById("idChaCla").value = aData.channelClass;
	document.getElementById("idTrrtry").value = aData.territory;
	document.getElementById("idPrjTyp").value = aData.projType;
	document.getElementById("idActTyp").value = aData.activityType;
	document.getElementById("idTrdDsc").value = aData.tradeDisc;
	document.getElementById("idMontDA").value = aData.da.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

	document.getElementById("idPWPSNo").value = aData.pwpSeries;
	document.getElementById("idCstCnt").value = aData.costCenter;
	document.getElementById("idDatFrm").value = aData.promoFrom;
	document.getElementById("idDateTo").value = aData.promoTo;
	document.getElementById("idEvlDdl").value = aData.postPromoEval;
	document.getElementById("idTtlSls").value = aData.prvSal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idYTDTrg").value = aData.ytdTrg.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idYTDAct").value = aData.ytdAct.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idYTDDif").value = aData.ttlGrw;
	document.getElementById("idYTDAch").value = aData.ytdAch;

	document.getElementById("idTxtBg").value = aData.background;
	document.getElementById("idTxtPrmoTtle").value = aData.promoTitle;
	document.getElementById("idTxtObj").value = aData.objectives;
	document.getElementById("idTxtMch").value = aData.mechanics;
	document.getElementById("idTxtConc").value = aData.concession;
	document.getElementById("idTxtRisk").value = aData.risks;

	document.getElementById("idTtlPrjCst").value = aData.totProjCost.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idPrjtdSale").value = aData.projectedSales.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idPrjtdCost").value = aData.projectedCost.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idCostToSalesRatio").value = aData.cToSRatio;
	document.getElementById("idCtoSRatPer").value = ((parseInt(aData.projectedCost)/parseInt(aData.projectedSales))*100).toFixed(2)+"%";
    document.cookie = 'reqId='+aData.reqId;
}
function fillChaCla(aData){
  iMax = aData.length;
  oSelect = document.getElementById('idChaCla');
  for (var iRun = 0; iRun<=iMax; iRun++){
    console.log(aData[iRun]);
    oOption = document.createElement('option');
//    oOption.value = i;
//    opt.innerHTML = i;
//    oSelect.appendChild(opt);
  }
}
function setUpdate(sEvent){
  if(sEvent == 2){tglCmt(true);}
  else{tglCmt(false);}
	if (sEvent == 0){
		document.getElementById('idBtn_dSave').style.visibility = 'hidden';
		document.getElementById('idBtn_dSbmt').style.visibility = 'hidden';
    tglPDF(true);

		document.getElementById("idPWPSNo").readOnly = true;
		document.getElementById("idCstCnt").readOnly = true;
		document.getElementById("idDatPWP").readOnly = true;
		document.getElementById("idActNam").readOnly = true;
		document.getElementById("idChaCla").readOnly = true;
		document.getElementById("idChaCla").disabled = true;
		document.getElementById("idDatFrm").readOnly = true;
		document.getElementById("idDateTo").readOnly = true;
		document.getElementById("idTrrtry").readOnly = true;
		document.getElementById("idEvlDdl").readOnly = true;
		document.getElementById("idActTyp").readOnly = true;
		document.getElementById("idActTyp").disabled = true;
		document.getElementById("idTrdDsc").readOnly = true;
		document.getElementById("idMontDA").readOnly = true;
		document.getElementById("idPrjTyp").readOnly = true;
		document.getElementById("idTtlSls").readOnly = true;
		document.getElementById("idYTDTrg").readOnly = true;
		document.getElementById("idYTDAct").readOnly = true;
		document.getElementById("idYTDDif").readOnly = true;
		document.getElementById("idYTDAch").readOnly = true;

		document.getElementById("idTxtBg").readOnly = true;
		document.getElementById("idTxtPrmoTtle").readOnly = true;
		document.getElementById("idTxtObj").readOnly = true;
		document.getElementById("idTxtMch").readOnly = true;
		document.getElementById("idTxtConc").readOnly = true;
		document.getElementById("idTxtRisk").readOnly = true;
		document.getElementById("idPrjtdSale").readOnly = true;
	}
	else {
    	if (sEvent == 2){ document.getElementById('idBtn_dSbmt').style.visibility = 'hidden'; }
    	else{ document.getElementById('idBtn_dSbmt').style.visibility = 'visible'; }
    	if (sEvent == 0 || sEvent == 2){ document.getElementById('idBtn_dSave').style.visibility = 'visible'; }
    	else{ document.getElementById('idBtn_dSave').style.visibility = 'hidden'; }
//    	if (sEvent == 3){ document.getElementById('idBtn_dUpdt').style.visibility = 'visible'; }
//    	else{ document.getElementById('idBtn_dUpdt').style.visibility = 'hidden'; }
      if (sEvent == 3){ tglBtnUpd(false); }
      tglPDF(false);

		document.getElementById("idPWPSNo").readOnly = false;
		document.getElementById("idCstCnt").readOnly = false;
		document.getElementById("idDatPWP").readOnly = false;
		document.getElementById("idActNam").readOnly = false;
		document.getElementById("idChaCla").readOnly = false;
		document.getElementById("idChaCla").disabled = false;
		document.getElementById("idDatFrm").readOnly = false;
		document.getElementById("idDateTo").readOnly = false;
		document.getElementById("idTrrtry").readOnly = false;
		document.getElementById("idEvlDdl").readOnly = false;
		document.getElementById("idActTyp").readOnly = false;
		document.getElementById("idActTyp").disabled = false;
		document.getElementById("idTrdDsc").readOnly = false;
		document.getElementById("idMontDA").readOnly = false;
		document.getElementById("idPrjTyp").readOnly = false;
		document.getElementById("idTtlSls").readOnly = false;
		document.getElementById("idYTDTrg").readOnly = false;
		document.getElementById("idYTDAct").readOnly = false;
		document.getElementById("idYTDDif").readOnly = false;
		document.getElementById("idYTDAch").readOnly = false;

		document.getElementById("idTxtBg").readOnly = false;
		document.getElementById("idTxtPrmoTtle").readOnly = false;
		document.getElementById("idTxtObj").readOnly = false;
		document.getElementById("idTxtMch").readOnly = false;
		document.getElementById("idTxtConc").readOnly = false;
		document.getElementById("idTxtRisk").readOnly = false;
		document.getElementById("idPrjtdSale").readOnly = false;
	}
}
function getChaCla(){
	$.ajax({
		url:"query/pwp_qry.php",
		method:"POST",
		data:{ type:"9" },
		success:function(data) {

		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function getAttch(requestID,fileType,sType,sSpan){
	$.ajax({
		url:"query/pwp_asm.php",
		method:"POST",
		dataType: "json",
		data:{ type:"7", requestID:requestID, fileType:fileType },
		success:function(data) {
				oDiv = document.getElementById(sSpan);
			if(data!=""){ oDiv.innerHTML=sType; }
			for(iRun=0; iRun<data.length; iRun++){
                oDiv.innerHTML+='<br />';
				oDiv.innerHTML+='<a href="'+data[iRun]['fileName']+'">'+data[iRun]['fileDtl']+'</a>';
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function showAttch(requestID,sEvent){
	if(sEvent==0){
		getAttch(requestID,1,"COMPUTATION","idComp"); // Computations
		getAttch(requestID,2,"FORECAST / ALLOCATION","idFcAl"); // Forecast/Allocation
		getAttch(requestID,3,"HISTORICAL DATA","idHiDa"); // Historal Data
		getAttch(requestID,4,"OTHER RELEVANT DATA","idReDa"); // Other Relevant Data
		getAttch(requestID,5,"RELEVANT PHOTO/S","idRePh"); // Relevant Photos
		getAttch(requestID,6,"SCHEMES","idSche"); // Schemes
		getAttch(requestID,7,"TRADE LETTER","idTrLe"); // Trade Letter// sComp =
	} else { toggleForm(true); }
}
function getUpdateData(requestID, sEvent){
  toggleForm(false);
  tglBtnUpd(true);
	clearPCE();
	clearPVA();
	clearTbl();
	showAttch(requestID, sEvent);
	$.ajax({
		url:"query/pwp_qry.php",
		method:"POST",
		dataType: "json",
		data:{ type:"6", requestID:requestID },
		success:function(data) {
			fillForm(data);
			setUpdate(sEvent);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"query/pwp_qry.php",
		method:"POST",
		dataType: "json",
		data:{ type:"7", requestID:requestID },
		success:function(data) {
			for(iRun=0; iRun<data.length; iRun++){
				insertPVA(data[iRun],sEvent);
			}
      document.getElementById("idAMSInCaseTotal").value = document.getElementById("idAMSInCaseTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idAMSPesValTotal").value = document.getElementById("idAMSPesValTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idITSInCaseTotal").value = document.getElementById("idITSInCaseTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idITSPesValTotal").value = document.getElementById("idITSPesValTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idMAIInCaseTotal").value = document.getElementById("idMAIInCaseTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idMAIPesValTotal").value = document.getElementById("idMAIPesValTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idTPDInCaseTotal").value = document.getElementById("idTPDInCaseTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idTPDPesValTotal").value = document.getElementById("idTPDPesValTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"query/pwp_qry.php",
		method:"POST",
		dataType: "json",
		data:{ type:"8", requestID:requestID },
		success:function(data) {
			for(iRun=0; iRun<data.length; iRun++){
				insertPCE(data[iRun],sEvent);
			}
      document.getElementById("idItmstiQtyTotal").value = document.getElementById("idItmstiQtyTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idItmUntCstTotal").value = document.getElementById("idItmUntCstTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idItmTtlCstTotal").value = document.getElementById("idItmTtlCstTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idExpnseQtyTotal").value = document.getElementById("idExpnseQtyTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idExpUntCstTotal").value = document.getElementById("idExpUntCstTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      document.getElementById("idExpTtlCstTotal").value = document.getElementById("idExpTtlCstTotal").value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function goToAtch(reqId){
	window.location = "pwp_sales_atch.php?reqId="+reqId;
}
function createTbl(sTblName,aData, sEvent){
	sAtch = "";
	if(sEvent==3){
		sAtch ='<button onclick="goToAtch('+aData.requestId+')">Attach</button>';
	}
	oTbl = document.getElementById(sTblName);
	oTbl.style.textAlign = "center";
	oRow = oTbl.insertRow(-1);
	oC0 = oRow.insertCell(0);
	oC1 = oRow.insertCell(1);
	oC2 = oRow.insertCell(2);
	oC3 = oRow.insertCell(3);
	oC4 = oRow.insertCell(4);
	oC5 = oRow.insertCell(5);
	oC6 = oRow.insertCell(6);
	oC7 = oRow.insertCell(7);
	oC8 = oRow.insertCell(8);
	oC9 = oRow.insertCell(9);
	oC10 = oRow.insertCell(10);
	oC0.innerHTML = pad(aData.requestId,6);
	oC1.innerHTML = aData.pwpDate;
	oC2.innerHTML = getActTyp( aData.activityType );
	oC3.innerHTML = aData.promoTitle;
	oC4.innerHTML = aData.accountName;
	oC5.innerHTML = aData.territory;
	oC6.innerHTML = aData.itsPVTtl.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC7.innerHTML = aData.tpdPVTtl.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC8.innerHTML = aData.projectedCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC9.innerHTML = aData.cToSRatio.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC10.innerHTML = '<button onclick="getUpdateData('+aData.requestId+','+sEvent+')">View</button>'+sAtch;
}
function getPrjTyp(idPrjTyp){
	sPrjTyp = "";
	switch(idPrjTyp){
		case "1":
			sPrjTyp = "ADDITIONAL DISCOUNT";
			break;
		case "2":
			sPrjTyp = "DISPLAY ALLOWANCE";
			break;
		case "3":
			sPrjTyp = "ECOM EXPENSE";
			break;
		case "4":
			sPrjTyp = "EVENT SUPPORT";
			break;
		case "5":
			sPrjTyp = "INCENTIVE";
			break;
		case "6":
			sPrjTyp = "IN-STORE PROMOTION";
			break;
		case "7":
			sPrjTyp = "LISTING COST";
			break;
		case "8":
			sPrjTyp = "MANPOWER EXPENSE";
			break;
		case "9":
			sPrjTyp = "MERCHANDISING";
			break;
		case "10":
			sPrjTyp = "PENALTY";
			break;
		case "11":
			sPrjTyp = "VOLUME ENHANCEMENT";
			break;
		default:
			sPrjTyp = "Code not Found";
	}
	return sPrjTyp;
}
function getActTyp(idActTyp){
	switch(idActTyp){
		case "1": return "ANNIVERSARY SUPPORT"; break;
		case "2": return "CHANGE VENDOR FEE"; break;
		case "3": return "CHRISTMAS SUPPORT"; break;
		case "4": return "DEALS"; break;
		case "5": return "DELIVERY PENALTY"; break;
		case "6": return "DISTRIBUTOR INCENTIVES"; break;
		case "7": return "DSP INCENTIVES"; break;
		case "8": return "ECOMMERCE COMMISSION FEES"; break;
		case "9": return "ECOMMERCE HANDLING FEES"; break;
		case "10": return "ECOMMERCE SHIPPING FEES"; break;
		case "11": return "EVENTS SPONSORSHIPS / ACTIVATIONS"; break;
		case "12": return "GONDOLA FABRICATION"; break;
		case "13": return "GROWTH INCENTIVES"; break;
		case "14": return "IN HOUSE MERCHANDISER"; break;
		case "15": return "LISTING FEE ORAL CAT."; break;
		case "16": return "LISTING FEE PAPER CAT."; break;
		case "17": return "LISTING FEE PERSONAL CARE CAT."; break;
		case "18": return "MANPOWER - SPECIAL BUNDLING"; break;
		case "19": return "MDU"; break;
		case "20": return "MERCHANDISER INCENTIVES"; break;
		case "21": return "MERCHANDISER PENALTY AND CHARGES"; break;
		case "22": return "MERCHANDISER SALARIES"; break;
		case "23": return "MERCHANDISING GEN. ASSEMBLY"; break;
		case "24": return "MERCHANDISING SUPPLIES"; break;
		case "25": return "OPENING SUPPORT"; break;
		case "26": return "PASS ON DISCOUNT"; break;
		case "27": return "PORTAL PAYMENT"; break;
		case "28": return "PRIMARY SHELF"; break;
		case "29": return "PROMO BUNDLING"; break;
		case "30": return "REBATES / PRICE OFF"; break;
		case "31": return "THEMATIC SUPPORT / MAILER / JOINING FEE"; break;
    case "32": return "INTRO DISCOUNT"; break;
    case "33": return "MISCELLANEOUS"; break;
    case "34": return "OTHERS"; break;
    case "35": return "DISPLAY ALLOWANCE"; break;
		default : return "Code not Found";
	}
}
function getPWP(sTblName, iType, sEvent){
  iRun=0;
	$.ajax({
		url:"query/pwp_qry.php",
		method:"POST",
		dataType: "json",
		data:{
			type:iType
		},
		success:function(data) {
      aGData[iType] = data;
      iRun = 0;
      data.forEach(function(aData){
        if (iRun<10) { createTbl(sTblName,aData,sEvent); }
        iRun++;
      });
      setPgng(sTblName,iType,sEvent);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function submitDraft(){
	sStatus = "Pending";
	$.ajax({
		url:"query/pwp_req.php",
		method:"POST",
		data:{ type:"4", sStatus:sStatus},
		success:function(dStatus){
    	location.reload();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function saveDraft(){
  aValFld = valiFields();
  if(aValFld['bVal']==true){
	aItemDesc = []; aQty = []; aUnitCost = []; aTotlCost = [];
	aExpeDesc = []; aExpeQty = []; aExpeUnitCost = []; aExpeTotlCost = [];
	aValue = [];

	aCateBrand = [];
	aAMSInCase = []; aAMSPesVal = [];
	aITSInCase = []; aITSPesVal = [];
	aMAIInCase = []; aMAIPesVal = [];
	aTPDInCase = []; aTPDPesVal = [];
	aItmDsc = []; aItmQty = []; aItmUnt = []; aItmTtl = [];
	aExpDsc = []; aExpQty = []; aExpUnt = []; aExpTtl = [];

	dDatPWP = document.getElementById("idDatPWP").value.trim();
	sActNam = document.getElementById("idActNam").value.trim();
	sChaCla = document.getElementById("idChaCla").value.trim();
	sTrrtry = document.getElementById("idTrrtry").value.trim();
	sActTyp = document.getElementById("idActTyp").value.trim();
	iTrdDsc = document.getElementById("idTrdDsc").value.trim();
	iMontDA = document.getElementById("idMontDA").value.trim();
	iPWPSNo = document.getElementById("idPWPSNo").value.trim();
	iCstCnt = document.getElementById("idCstCnt").value.trim();
	iDtStrt = document.getElementById("idDatFrm").value.trim();
	iDatEnd = document.getElementById("idDateTo").value.trim();
	iEvlDdl = document.getElementById("idEvlDdl").value.trim();
	iPrjTyp = 0;
	iTtlSal = document.getElementById("idTtlSls").value.trim();
	iYTDTrg = document.getElementById("idYTDTrg").value.trim();
	iYTDAct = document.getElementById("idYTDAct").value.trim();
	iYTDDif = document.getElementById("idYTDDif").value.trim();
	iYTDAch = document.getElementById("idYTDAch").value.trim();

	iBckGrd = document.getElementById("idTxtBg").value.trim();
	iPrmTtl = document.getElementById("idTxtPrmoTtle").value.trim();
	iObjtve = document.getElementById("idTxtObj").value.trim();
	iMchncs = document.getElementById("idTxtMch").value.trim();
	iCncsns = document.getElementById("idTxtConc").value.trim();
	iRskInv = document.getElementById("idTxtRisk").value.trim();

	$("input[name=txtCateBrand]").each(function () { aCateBrand.push($(this).val().trim()); });
	$("input[name=txtAMSInCase]").each(function () { aAMSInCase.push($(this).val().trim()); });
	$("input[name=txtAMSPesVal]").each(function () { aAMSPesVal.push($(this).val().trim()); });
	$("input[name=txtITSInCase]").each(function () { aITSInCase.push($(this).val().trim()); });
	$("input[name=txtITSPesVal]").each(function () { aITSPesVal.push($(this).val().trim()); });
	$("input[name=txtMAIInCase]").each(function () { aMAIInCase.push($(this).val().trim()); });
	$("input[name=txtMAIPesVal]").each(function () { aMAIPesVal.push($(this).val().trim()); });
	$("input[name=txtTPDInCase]").each(function () { aTPDInCase.push($(this).val().trim()); });
	$("input[name=txtTPDPesVal]").each(function () { aTPDPesVal.push($(this).val().trim()); });

	$("input[name=txtItmDsc]").each(function () { aItmDsc.push($(this).val().trim()); });
	$("input[name=txtItmQty]").each(function () { aItmQty.push($(this).val().trim()); });
	$("input[name=txtItmUnt]").each(function () { aItmUnt.push($(this).val().trim()); });
	$("input[name=txtItmTtl]").each(function () { aItmTtl.push($(this).val().trim()); });
	$("input[name=txtExpDsc]").each(function () { aExpDsc.push($(this).val().trim()); });
	$("input[name=txtExpQty]").each(function () { aExpQty.push($(this).val().trim()); });
	$("input[name=txtExpUnt]").each(function () { aExpUnt.push($(this).val().trim()); });
	$("input[name=txtExpTtl]").each(function () { aExpTtl.push($(this).val().trim()); });

	idPrjtdSale = document.getElementById("idPrjtdSale").value.replace(',','').trim();
	idPrjtdCost = document.getElementById("idPrjtdCost").value.replace(',','').trim();
	idCostToSalesRatio = document.getElementById("idCostToSalesRatio").value.replace(',','').trim();
	idTtlPrjCst = document.getElementById("idTtlPrjCst").value.replace(',','').trim();

	$.ajax({
		url:"query/pwp_req.php",
		method:"POST",
		data:{ type:"0", dDatPWP:dDatPWP, sActNam:sActNam, sChaCla:sChaCla, sTrrtry:sTrrtry, sActTyp:sActTyp, iTrdDsc:iTrdDsc, iMontDA:iMontDA, iPWPSNo:iPWPSNo, iCstCnt:iCstCnt, iDtStrt:iDtStrt, iDatEnd:iDatEnd, iEvlDdl:iEvlDdl, iTtlSal:iTtlSal, iYTDTrg:iYTDTrg, iYTDAct:iYTDAct, iYTDDif:iYTDDif, iYTDAch:iYTDAch, iBckGrd:iBckGrd, iPrmTtl:iPrmTtl, iObjtve:iObjtve, iMchncs:iMchncs, iCncsns:iCncsns, iRskInv:iRskInv, idPrjtdSale:idPrjtdSale, idPrjtdCost:idPrjtdCost, idCostToSalesRatio:idCostToSalesRatio, idTtlPrjCst:idTtlPrjCst},
		success:function(iId){
			sStatus = "Draft";
			iReqId = iId;
			console.log(iReqId);
			$.ajax({
				url:"query/pwp_req.php",
				method:"POST",
				data:{ type:"3", iReqId:iReqId, sStatus:sStatus},
				success:function(dStatus){
					console.log(dStatus);
				},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
          // recErr(XMLHttpRequest, textStatus, errorThrown);
    			console.log("Status: " + textStatus+"\nError: " + errorThrown);
    		}
			});
			$.ajax({
				url:"query/pwp_req.php",
				method:"POST",
				data:{ type:"1", iReqId:iReqId, aCateBrand:aCateBrand, aAMSInCase:aAMSInCase, aAMSPesVal:aAMSPesVal, aITSInCase:aITSInCase, aITSPesVal:aITSPesVal, aMAIInCase:aMAIInCase, aMAIPesVal:aMAIPesVal, aTPDInCase:aTPDInCase, aTPDPesVal:aTPDPesVal},
				success:function(dStatus){
					console.log(dStatus);
				},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
          // recErr(XMLHttpRequest, textStatus, errorThrown);
    			console.log("Status: " + textStatus+"\nError: " + errorThrown);
    		}
			});
			$.ajax({
				url:"query/pwp_req.php",
				method:"POST",
				data:{ type:"2", iReqId:iReqId, aItmDsc:aItmDsc, aItmQty:aItmQty, aItmUnt:aItmUnt, aItmTtl:aItmTtl, aExpDsc:aExpDsc, aExpQty:aExpQty, aExpUnt:aExpUnt, aExpTtl:aExpTtl},
				success:function(dStatus){
					console.log(dStatus);
				},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
          // recErr(XMLHttpRequest, textStatus, errorThrown);
    			console.log("Status: " + textStatus+"\nError: " + errorThrown);
    		}
			});
			location.reload();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      // recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
    }
  else{
    alert("Please Double check the fields" + aValFld['sMsg']);
  }
}
function saveUpdate(){
  aValFld = valiFields();
  if(aValFld['bVal']==true){
	aItemDesc = []; aQty = []; aUnitCost = []; aTotlCost = [];
	aExpeDesc = []; aExpeQty = []; aExpeUnitCost = []; aExpeTotlCost = [];
	aValue = [];

	aPVAId = []; aCateBrand = [];
	aAMSInCase = []; aAMSPesVal = [];
	aITSInCase = []; aITSPesVal = [];
	aMAIInCase = []; aMAIPesVal = [];
	aTPDInCase = []; aTPDPesVal = [];
	aPCEId = []; aItmDsc = []; aItmQty = []; aItmUnt = []; aItmTtl = [];
	aExpDsc = []; aExpQty = []; aExpUnt = []; aExpTtl = [];

	dDatPWP = document.getElementById("idDatPWP").value.trim();
	sActNam = document.getElementById("idActNam").value.trim();
	sChaCla = document.getElementById("idChaCla").value.trim();
	sTrrtry = document.getElementById("idTrrtry").value.trim();
	sActTyp = document.getElementById("idActTyp").value.trim();
	iTrdDsc = document.getElementById("idTrdDsc").value.trim();
	iMontDA = document.getElementById("idMontDA").value.trim();
	iPWPSNo = document.getElementById("idPWPSNo").value.trim();
	iCstCnt = document.getElementById("idCstCnt").value.trim();
	iDtStrt = document.getElementById("idDatFrm").value.trim();
	iDatEnd = document.getElementById("idDateTo").value.trim();
	iEvlDdl = document.getElementById("idEvlDdl").value.trim();
	iPrjTyp = 0;
	iTtlSal = document.getElementById("idTtlSls").value.trim();
	iYTDTrg = document.getElementById("idYTDTrg").value.trim();
	iYTDAct = document.getElementById("idYTDAct").value.trim();
	iYTDDif = document.getElementById("idYTDDif").value.trim();
	iYTDAch = document.getElementById("idYTDAch").value.trim();

	iBckGrd = document.getElementById("idTxtBg").value.trim();
	iPrmTtl = document.getElementById("idTxtPrmoTtle").value.trim();
	iObjtve = document.getElementById("idTxtObj").value.trim();
	iMchncs = document.getElementById("idTxtMch").value.trim();
	iCncsns = document.getElementById("idTxtConc").value.trim();
	iRskInv = document.getElementById("idTxtRisk").value.trim();

  $("input[name=txtPVAId]").each(function () { aPVAId.push($(this).val().trim()); });
	$("input[name=txtCateBrand]").each(function () { aCateBrand.push($(this).val().trim()); });
	$("input[name=txtAMSInCase]").each(function () { aAMSInCase.push($(this).val().trim()); });
	$("input[name=txtAMSPesVal]").each(function () { aAMSPesVal.push($(this).val().trim()); });
	$("input[name=txtITSInCase]").each(function () { aITSInCase.push($(this).val().trim()); });
	$("input[name=txtITSPesVal]").each(function () { aITSPesVal.push($(this).val().trim()); });
	$("input[name=txtMAIInCase]").each(function () { aMAIInCase.push($(this).val().trim()); });
	$("input[name=txtMAIPesVal]").each(function () { aMAIPesVal.push($(this).val().trim()); });
	$("input[name=txtTPDInCase]").each(function () { aTPDInCase.push($(this).val().trim()); });
	$("input[name=txtTPDPesVal]").each(function () { aTPDPesVal.push($(this).val().trim()); });

  $("input[name=txtPCEId]").each(function () { aPCEId.push($(this).val().trim()); });
	$("input[name=txtItmDsc]").each(function () { aItmDsc.push($(this).val().trim()); });
	$("input[name=txtItmQty]").each(function () { aItmQty.push($(this).val().trim()); });
	$("input[name=txtItmUnt]").each(function () { aItmUnt.push($(this).val().trim()); });
	$("input[name=txtItmTtl]").each(function () { aItmTtl.push($(this).val().trim()); });
	$("input[name=txtExpDsc]").each(function () { aExpDsc.push($(this).val().trim()); });
	$("input[name=txtExpQty]").each(function () { aExpQty.push($(this).val().trim()); });
	$("input[name=txtExpUnt]").each(function () { aExpUnt.push($(this).val().trim()); });
	$("input[name=txtExpTtl]").each(function () { aExpTtl.push($(this).val().trim()); });

	idPrjtdSale = document.getElementById("idPrjtdSale").value.replace(',','').trim();
	idPrjtdCost = document.getElementById("idPrjtdCost").value.replace(',','').trim();
	idCostToSalesRatio = document.getElementById("idCostToSalesRatio").value.replace(',','').trim();
	idTtlPrjCst = document.getElementById("idTtlPrjCst").value.replace(',','').trim();

	$.ajax({
		url:"query/pwp_req.php",
		method:"POST",
		data:{ type:"14", dDatPWP:dDatPWP, sActNam:sActNam, sChaCla:sChaCla, sTrrtry:sTrrtry, sActTyp:sActTyp, iTrdDsc:iTrdDsc, iMontDA:iMontDA, iPWPSNo:iPWPSNo, iCstCnt:iCstCnt, iDtStrt:iDtStrt, iDatEnd:iDatEnd, iEvlDdl:iEvlDdl, iTtlSal:iTtlSal, iYTDTrg:iYTDTrg, iYTDAct:iYTDAct, iYTDDif:iYTDDif, iYTDAch:iYTDAch, iBckGrd:iBckGrd, iPrmTtl:iPrmTtl, iObjtve:iObjtve, iMchncs:iMchncs, iCncsns:iCncsns, iRskInv:iRskInv, idPrjtdSale:idPrjtdSale, idPrjtdCost:idPrjtdCost, idCostToSalesRatio:idCostToSalesRatio, idTtlPrjCst:idTtlPrjCst},
		success:function(iRes){
			$.ajax({
				url:"query/pwp_req.php",
				method:"POST",
				data:{ type:"17" },
				success:function(dStatus){
					console.log(dStatus);
				},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
          // recErr(XMLHttpRequest, textStatus, errorThrown);
    			console.log("Status: " + textStatus+"\nError: " + errorThrown);
    		}
			});
			$.ajax({
				url:"query/pwp_req.php",
				method:"POST",
				data:{ type:"15", aPVAId:aPVAId, aCateBrand:aCateBrand, aAMSInCase:aAMSInCase, aAMSPesVal:aAMSPesVal, aITSInCase:aITSInCase, aITSPesVal:aITSPesVal, aMAIInCase:aMAIInCase, aMAIPesVal:aMAIPesVal, aTPDInCase:aTPDInCase, aTPDPesVal:aTPDPesVal},
				success:function(dStatus){
					console.log(dStatus);
				},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
    			console.log("Status: " + textStatus+"\nError: " + errorThrown);
    		}
			});
			$.ajax({
				url:"query/pwp_req.php",
				method:"POST",
				data:{ type:"18" },
				success:function(dStatus){
					console.log(dStatus);
				},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
    			console.log("Status: " + textStatus+"\nError: " + errorThrown);
    		}
			});
			$.ajax({
				url:"query/pwp_req.php",
				method:"POST",
				data:{ type:"16", aPCEId:aPCEId, aItmDsc:aItmDsc, aItmQty:aItmQty, aItmUnt:aItmUnt, aItmTtl:aItmTtl, aExpDsc:aExpDsc, aExpQty:aExpQty, aExpUnt:aExpUnt, aExpTtl:aExpTtl},
				success:function(dStatus){
					console.log(dStatus);
				},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
    			console.log("Status: " + textStatus+"\nError: " + errorThrown);
    		}
			});
			location.reload();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
    }
  else{
    alert("Please Double check the fields" + aValFld['sMsg']);
  }
}
function getPDFFile(){
	var wnd = window.open("includes/sample_1.html");
    setTimeout(function() {
      wnd.close();
    }, 1000);
    return false;
}
