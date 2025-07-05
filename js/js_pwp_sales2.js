function pad(num, size) {
    num = num.toString();
    while (num.length < size) num = "0" + num;
    return num;
}
function clrElm(sElem){
  const parent = document.getElementById(sElem);
  while (parent.firstChild) { parent.removeChild(parent.firstChild); }
  
}
function clrTbl(sTbl){
  oTbl = document.getElementById(sTbl);
  iTblRowCnt = oTbl.rows.length;

  if(iTblRowCnt > 1){ for(iRun = iTblRowCnt - 1; iRun > 0; iRun--){ document.getElementById(sTbl).deleteRow(iRun); } }
}
function chgPgn(sVal,sTbl,iType,sEvent){
  clrTbl(sTbl);
  iLm = aGData[iType].length;
  for(iRun = ((sVal*10)-10); (iRun < ((sVal*10)) && iRun < iLm); iRun++){
    createTbl(sTbl,aGData[iType][iRun],sEvent);
  }
  clrElm('idPgng'+iType);
  setPgng(sTbl,iType,sEvent,sVal);
}
function setPgng(sTbl,iType,sEvent,iPge=1){
  let sPagDiv = 'idPgng'+iType;
  iPg = Number(iPge);
  iLm = Math.ceil(aGData[iType].length/10);
  iRun = 0;
  document.getElementById(sPagDiv).setAttribute('align','center');
  var btnFrs = document.createElement('button');
  var btnLst = document.createElement('button');
  var btnPrv = document.createElement('button');
  var btnNxt = document.createElement('button');
  var btnClr = document.createElement('button');
  let iPrv = 1;
  let iNxt = 1;
  if((iPg-1)>0){iPrv=iPg-1}
  if((iPg+1)<=iLm){iNxt=iPg+1}
  btnFrs.textContent = '<<';
  btnFrs.onclick = function() { chgPgn(1,sTbl,iType,sEvent); };
  document.getElementById(sPagDiv).appendChild(btnFrs);
  btnPrv.textContent = '<';
  btnPrv.onclick = function() { chgPgn(iPrv,sTbl,iType,sEvent); };
  document.getElementById(sPagDiv).appendChild(btnPrv);
  for (let iRun = 1; iRun <= iLm; iRun++) {
    if (iRun > 0 && iRun <= (iPge+3)) {
      const btn = document.createElement('button');
      btn.textContent = iRun;
      btn.onclick = function() { chgPgn(iRun,sTbl,iType,sEvent); };
      document.getElementById(sPagDiv).appendChild(btn);
    }
  }
  btnNxt.textContent = '>';
  btnNxt.onclick = function() { chgPgn(iNxt,sTbl,iType,sEvent); };
  document.getElementById(sPagDiv).appendChild(btnNxt);
  btnLst.textContent = '>>';
  btnLst.onclick = function() { chgPgn(iLm,sTbl,iType,sEvent); };
  document.getElementById(sPagDiv).appendChild(btnLst);
}
function recErr(httpReq, errSts, errMsg){
	// $.ajax({
	// 	url:"query/qry_err.php",
	// 	method:"POST",
	// 	dataType: "json",
	// 	data:{ type:"A1", httpReq:httpReq, errSts:errSts, errMsg:errMsg },
	// 	success:function(response) {
	// 	 console.log(response);
	// 	},
	// 	error: function(XMLHttpRequest, textStatus, errorThrown) {
  //     recErr(XMLHttpRequest, textStatus, errorThrown);
	// 		console.log("Status: " + textStatus+"\nError: " + errorThrown);
	// 	}
	// });
}
function toggleForm(bForm){
        clearTbl();
        clearPVA();
        clearPCE();
        $("#idModal_PWPDetails").css('display','block');
        if(bForm==true){
            $("#idVwForm").css('display','none');
        }else{
            $("#idVwForm").css('display','block');
        }
	tabContent = document.getElementsByClassName("tabContent");
	for(i=0; i<tabContent.length; i++){
		tabContent[i].style.display="none";
	}
}
function tglBtnSbt(bVal){
  if(bVal == true){
    document.getElementById('idBtn_dSbmt').style.visibility = 'hidden';
  }else{
    document.getElementById('idBtn_dSbmt').style.visibility = 'visible';
  }
}
function tglBtnUpd(bVal){
  if(bVal == true){
    document.getElementById('idBtn_dUpdate').style.visibility = 'hidden';
  }else{
    document.getElementById('idBtn_dUpdate').style.visibility = 'visible';
  }
}
function tglCmt(bVal){
  if(bVal==false){
    $("#idCmtDiv").css('display','none');
  }else{
    $("#idCmtDiv").css('display','block');
  }
}
function tglPDF(bVal){
  if(bVal==false){
//    $("#idBtn_PDF").css('display','none');
  }else{
//    $("#idBtn_PDF").css('display','block');
  }
}
// computes Total Growth
function computeTtlGrw(){
    oTtlSls = document.getElementById("idTtlSls");
    oTtlTrg = document.getElementById("idTtlTrg");
    oTtlDif = document.getElementById("idTtlDif");
    oTtlGrw = document.getElementById("idTtlGrw");
    if(oTtlSls.value==0 || oTtlTrg.value==0){
        oTtlDif.value = oTtlTrg.value-oTtlSls.value;
        oTtlGrw.value = 0;
    }
    else if(oTtlSls.value!="" && oTtlTrg.value!=""){
        oTtlDif.value = oTtlTrg.value-oTtlSls.value;
        oTtlGrw.value = ((oTtlDif.value/oTtlSls.value)*100).toFixed(2)+"%";
    }
}
// computes YTD Achieved
function computeYTDAch(){
    oYTDTrg = document.getElementById("idYTDTrg");
    oYTDAct = document.getElementById("idYTDAct");
    oYTDDif = document.getElementById("idYTDDif");
    oYTDAch = document.getElementById("idYTDAch");
    if(oYTDAct.value==0 || oYTDTrg.value==0){
        oYTDDif.value = oYTDAct.value-oYTDTrg.value;
        oYTDAch.value = 0;
    }
    else if(oYTDTrg.value!="" && oYTDAct.value!=""){
        oYTDDif.value = oYTDAct.value-oYTDTrg.value;
        oYTDAch.value = ((oYTDAct.value/oYTDTrg.value)*100).toFixed(2)+"%";
    }
}
// computes Projected Volume Peso Value
function getPrjVolPV(){
    objName1 = "txtAMSPesVal";
    objName2 = "txtITSPesVal";
    $("input[name="+objName1+"]").each(function (index) {
        docName1 = document.getElementsByName(objName2);
        objVal1 = $(this).val().trim().replaceAll(",","");
        objVal2 = docName1[index].value;
        if(objVal1 != "" && objVal2 != ""){
            docResName = document.getElementsByName("txtMAIPesVal");
            docResName[index].value = parseFloat(objVal1)+parseFloat(objVal2);
        }
    });
    computeTotal("txtMAIPesVal","idMAIPesValTotal");
}
// computes Projected Volume In Case
function getPrjVolIC(){
    objName1 = "txtAMSInCase";
    objName2 = "txtITSInCase";
    $("input[name="+objName1+"]").each(function (index) {
        docName1 = document.getElementsByName(objName2);
        objVal1 = $(this).val().trim().replaceAll(",","");
        objVal2 = docName1[index].value;
        if(objVal1 != "" && objVal2 != ""){
            docResName = document.getElementsByName("txtMAIInCase");
            docResName[index].value = parseFloat(objVal1)+parseFloat(objVal2);
        }
    });
    computeTotal("txtMAIInCase","idMAIInCaseTotal");
}
// computes Cost to Sales Ratio
function computeCtoSR(){
    oPrjSale = document.getElementById("idPrjtdSale");
    oPrjCost = document.getElementById("idPrjtdCost");
    oCToSRat = document.getElementById("idCostToSalesRatio");
    oCToSRPr = document.getElementById("idCtoSRatPer");
    if(oPrjSale.value!="" && oPrjCost.value!=""){
        oCToSRat.value = parseFloat(oPrjSale.value)-parseFloat(oPrjCost.value);
        oCToSRPr.value = ((parseFloat(oPrjCost.value)/parseFloat(oPrjSale.value))*100).toFixed(2)+"%";
    } else {
        oCToSRat.value = "";
        oCToSRPr.value = "";
    }
}
// computes Total
function computeTotal(objName, idResult){
    var fResult =0;
    $("input[name="+objName+"]").each(function () {
        if($(this).val().trim().replaceAll(",","")=="")
        {
            fResult =  parseFloat(fResult) + parseFloat(0);
        }
        else
        {
          fValue = Math.round($(this).val().trim()*100)/100;
          fResult =  Math.round((fResult + fValue)*100)/100;
        }
    });
    document.getElementById(idResult).value= fResult.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}
function computePCETtl(){
    objName1 = "txtItmQty";
    objName2 = "txtItmUnt";
    $("input[name="+objName1+"]").each(function (index) {
        docName1 = document.getElementsByName(objName2);
        objVal1 = $(this).val().trim().replaceAll(",","");
        objVal2 = docName1[index].value;
        if(objVal1 != "" && objVal2 != ""){
            docResName = document.getElementsByName("txtItmTtl");
            docResName[index].value = parseFloat(objVal1)*parseFloat(objVal2);
        }
    });
    computeTotal("txtItmTtl","idItmTtlCstTotal");
}
function computePCEExpTtl(){
    objName1 = "txtExpQty";
    objName2 = "txtExpUnt";
    $("input[name="+objName1+"]").each(function (index) {
        docName1 = document.getElementsByName(objName2);
        objVal1 = $(this).val().trim().replaceAll(",","");
        objVal2 = docName1[index].value;
        if(objVal1 != "" && objVal2 != ""){
            docResName = document.getElementsByName("txtExpTtl");
            docResName[index].value = parseFloat(objVal1)*parseFloat(objVal2);
        }
    });
    computeTotal("txtExpTtl","idExpTtlCstTotal");
}
// compute Total Projected Cost
function computePrjCst(){
    oPCETtlCst = document.getElementById("idItmTtlCstTotal");
    oExpTtlCst = document.getElementById("idExpTtlCstTotal");
    oTtlPrjCst = document.getElementById("idTtlPrjCst");
    oPrjtdCost = document.getElementById("idPrjtdCost");
    if(oPCETtlCst.value!="" && oExpTtlCst.value!=""){
        oTtlPrjCst.value = parseFloat(oPCETtlCst.value.replace(/,/g,''))+parseFloat(oExpTtlCst.value.replace(/,/g,''));
        oPrjtdCost.value = parseFloat(oPCETtlCst.value.replace(/,/g,''))+parseFloat(oExpTtlCst.value.replace(/,/g,''));
    } else {
        oTtlPrjCst.value = "";
        oPrjtdCost.value = "";
    }
    computeCtoSR();
}
// compute Total Projected Sale
function computePrjSal(){
    oTarPesValTtl = document.getElementById("idITSPesValTotal");
    oPrjtdSale = document.getElementById("idPrjtdSale");
    if(oTarPesValTtl.value!=""){
        oPrjtdSale.value = parseFloat(oTarPesValTtl.value.replace(/,/g,''));
    } else {
        oPrjtdSale.value = "";
    }
    computeCtoSR();
}
$( document ).ready(function() {
    document.getElementById("idPendingBtn").addEventListener("click", function () { chngTab(event, "idPendingTab"); });
    document.getElementById("idRejectBtn").addEventListener("click", function () { chngTab(event, "idRejectTab"); });
    document.getElementById("idReviewedBtn").addEventListener("click", function () { chngTab(event, "idReviewTab"); });
    document.getElementById("idApprovedBtn").addEventListener("click", function () { chngTab(event, "idApproveTab"); });
    document.getElementById("idDraftBtn").addEventListener("click", function () { chngTab(event, "idDraftTab"); });
    document.getElementById("idFinalBtn").addEventListener("click", function () { chngTab(event, "idFinalTab"); });

    $( "#idYTDPrevSale" ).change(function() { computeVariance(); });
    $( "#idYTDCurrSale" ).change(function() { computeVariance(); });
//    $(document).on('change', '#idTtlSls', function(){ computeTtlGrw(); });
//    $(document).on('change', '#idTtlTrg', function(){ computeTtlGrw(); });
    $(document).on('change', '#idYTDTrg', function(){ computeYTDAch(); });
    $(document).on('change', '#idYTDAct', function(){ computeYTDAch(); });
    $(document).on('change', '#idPrjtdSale', function(){ computeCtoSR(); });
    $(document).on('change', '.cAMSInCase', function(){
        computeTotal("txtAMSInCase","idAMSInCaseTotal");
        getPrjVolIC();
    });
    $(document).on('change', '.cAMSPesVal', function(){
        computeTotal("txtAMSPesVal","idAMSPesValTotal");
        getPrjVolPV();
        // computePrjSal();
    });
    $(document).on('change', '.cITSInCase', function(){
        computeTotal("txtITSInCase","idITSInCaseTotal");
        getPrjVolIC();
    });
    $(document).on('change', '.cITSPesVal', function(){
        computeTotal("txtITSPesVal","idITSPesValTotal");
        getPrjVolPV();
        computePrjSal();
    });
    $(document).on('change', '.cMAIInCase', function(){ computeTotal("txtMAIInCase","idMAIInCaseTotal");});
    $(document).on('change', '.cMAIPesVal', function(){ computeTotal("txtMAIPesVal","idMAIPesValTotal");});
    $(document).on('change', '.cTPDInCase', function(){ computeTotal("txtTPDInCase","idTPDInCaseTotal");});
    $(document).on('change', '.cTPDPesVal', function(){ computeTotal("txtTPDPesVal","idTPDPesValTotal");});

    $(document).on('change', '.cItmQty', function(){
        computeTotal("txtItmQty","idItmstiQtyTotal");
        computePCETtl();
        computePrjCst();
    });
    $(document).on('change', '.cItmUnt', function(){
        computeTotal("txtItmUnt","idItmUntCstTotal");
        computePCETtl();
        computePrjCst();
    });
    $(document).on('change', '.cItmTtl', function(){ computeTotal("txtItmTtl","idItmTtlCstTotal");});
    $(document).on('change', '.cExpQty', function(){
        computeTotal("txtExpQty","idExpnseQtyTotal");
        computePCEExpTtl();
        computePrjCst();
    });
    $(document).on('change', '.cExpUnt', function(){
        computeTotal("txtExpUnt","idExpUntCstTotal");
        computePCEExpTtl();
        computePrjCst();
    });
    $(document).on('change', '.cExpTtl', function(){
        computeTotal("txtExpTtl","idExpTtlCstTotal");
        computePrjCst();
    });
    $(document).on('change', '#idDateTo', function(){
        dDateTo = document.getElementById("idDateTo").value;
        var date = new Date(dDateTo);
        var newdate = new Date(date);
        newdate.setDate(newdate.getDate() + 15);
        dd = newdate.getDate();
        mm = newdate.getMonth() + 1;
        y = newdate.getFullYear();
        m = mm.toString().padStart(2, '0');
        d = dd.toString().padStart(2, '0');
        var someFormattedDate =y+'-'+m+'-'+d;
        document.getElementById('idEvlDdl').value = someFormattedDate;
    });

    document.getElementById("idBtn_dUpdate").addEventListener("click", function () { saveUpdate(); });
    document.getElementById("idBtn_dSave").addEventListener("click", function () { saveDraft(); });
    document.getElementById("idBtn_dSbmt").addEventListener("click", function () { submitDraft(); });
    document.getElementById("idBtn_CreateDraft").addEventListener("click", function () {
      toggleForm(true);
      tglBtnSbt(true);
      tglBtnUpd(true);
      tglCmt(false);
      tglPDF(false);
      addPVA();
      addPCE();
    });
//    document.getElementById("idBtn_PDF").addEventListener("click", function () { getPDFFile(); });
tglCmt(true);
    getChaCla();
    getPWP("idTblPending",1,0);
    getPWP("idTblReject",2,2);
    getPWP("idTblApproved",3,0);
    getPWP("idTblDraft",4,3);
    getPWP("idTblReviewed",5,0);
    getPWP("idTblFinal",10,0);
});
