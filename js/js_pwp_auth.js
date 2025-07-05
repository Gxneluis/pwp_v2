function toggleForm(bForm){
    if(bForm == true){
        $("#idModal_PWPDetails").css('display','block');
    }else{
        $("#idModal_PWPDetails").css('display','none');
    }
}
function setUpdate(sEvent){
    document.getElementById('idDiv_Request').style.visibility = 'visible';

		document.getElementById("idPWPSNo").readOnly = true;
		document.getElementById("idCstCnt").readOnly = true;
		document.getElementById("idDatPWP").readOnly = true;
		document.getElementById("idActNam").readOnly = true;
		document.getElementById("idChaCla").readOnly = true;
		document.getElementById("idDatFrm").readOnly = true;
		document.getElementById("idDateTo").readOnly = true;
		document.getElementById("idTrrtry").readOnly = true;
		document.getElementById("idEvlDdl").readOnly = true;
		document.getElementById("idActTyp").readOnly = true;
		document.getElementById("idTrdDsc").readOnly = true;
		document.getElementById("idMontDA").readOnly = true;
		document.getElementById("idPrjTyp").readOnly = true;
		document.getElementById("idTtlSls").readOnly = true;
		document.getElementById("idTtlTrg").readOnly = true;
		document.getElementById("idYTDTrg").readOnly = true;
		document.getElementById("idYTDAct").readOnly = true;
		document.getElementById("idTtlDif").readOnly = true;
		document.getElementById("idYTDDif").readOnly = true;
		document.getElementById("idTtlGrw").readOnly = true;
		document.getElementById("idYTDAch").readOnly = true;

		document.getElementById("idTxtBg").readOnly = true;
		document.getElementById("idTxtPrmoTtle").readOnly = true;
		document.getElementById("idTxtObj").readOnly = true;
		document.getElementById("idTxtMch").readOnly = true;
		document.getElementById("idTxtConc").readOnly = true;
		document.getElementById("idTxtRisk").readOnly = true;

	if (sEvent == 1){
		document.getElementById('idBtn_Approved').style.visibility = 'hidden';
		document.getElementById('idBtn_Rejected').style.visibility = 'hidden';
	}
	else {
		document.getElementById('idBtn_Approved').style.visibility = 'visible';
		document.getElementById('idBtn_Rejected').style.visibility = 'visible';

	}
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
function insertPVA(aData){
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
	oCell0.innerHTML = '<input type="text" class="cCateBrand"  name="txtCateBrand" value="'+aData.cateBrand+'" readOnly >';
	oCell1.innerHTML = '<input type="text" class="cAMSInCase"  name="txtAMSInCase" value="'+aData.amsInCase+'" readOnly >';
	oCell2.innerHTML = '<input type="text" class="cAMSPesVal"  name="txtAMSPesVal" value="'+aData.amsPeso+'" readOnly >';
	oCell3.innerHTML = '<input type="text" class="cITSInCase"  name="txtITSInCase" value="'+aData.itsInCase+'" readOnly >';
	oCell4.innerHTML = '<input type="text" class="cITSPesVal"  name="txtITSPesVal" value="'+aData.itsPeso+'" readOnly >';
	oCell5.innerHTML = '<input type="text" class="cMAIInCase"  name="txtMAIInCase" value="'+aData.maiInCase+'" readOnly >';
	oCell6.innerHTML = '<input type="text" class="cMAIPesVal"  name="txtMAIPesVal" value="'+aData.maipvPeso+'" readOnly >';
	oCell7.innerHTML = '<input type="text" class="cTPDInCase"  name="txtTPDInCase" value="'+aData.tpdInCase+'" readOnly >';
	oCell8.innerHTML = '<input type="text" class="cTPDPesVal"  name="txtTPDPesVal" value="'+aData.tpdPeso+'" readOnly >';
	oCell9.innerHTML = '-';

	document.getElementById("idAMSInCaseTotal").value = (parseFloat(aData.amsInCase) + parseFloat(document.getElementById("idAMSInCaseTotal").value)).toFixed(2);
	document.getElementById("idAMSPesValTotal").value = (parseFloat(aData.amsPeso) + parseFloat(document.getElementById("idAMSPesValTotal").value)).toFixed(2);
	document.getElementById("idITSInCaseTotal").value = (parseFloat(aData.itsInCase) + parseFloat(document.getElementById("idITSInCaseTotal").value)).toFixed(2);
	document.getElementById("idITSPesValTotal").value = (parseFloat(aData.itsPeso) + parseFloat(document.getElementById("idITSPesValTotal").value)).toFixed(2);
	document.getElementById("idMAIInCaseTotal").value = (parseFloat(aData.maiInCase) + parseFloat(document.getElementById("idMAIInCaseTotal").value)).toFixed(2);
	document.getElementById("idMAIPesValTotal").value = (parseFloat(aData.maipvPeso) + parseFloat(document.getElementById("idMAIPesValTotal").value)).toFixed(2);
	document.getElementById("idTPDInCaseTotal").value = (parseFloat(aData.tpdInCase) + parseFloat(document.getElementById("idTPDInCaseTotal").value)).toFixed(2);
	document.getElementById("idTPDPesValTotal").value = (parseFloat(aData.tpdPeso) + parseFloat(document.getElementById("idTPDPesValTotal").value)).toFixed(2);
}
function insertPCE(aData){
	oPVATable = document.getElementById("idPCETable").getElementsByTagName("tbody")[0];
	oRow = oPVATable.insertRow(-1);
	oCell1 = oRow.insertCell(0);
	oCell2 = oRow.insertCell(1);
	oCell3 = oRow.insertCell(2);
	oCell4 = oRow.insertCell(3);
	oCell5 = oRow.insertCell(4);
	oCell6 = oRow.insertCell(5);
	oCell7 = oRow.insertCell(6);
	oCell8 = oRow.insertCell(7);
	oCell9 = oRow.insertCell(8);
	oCell1.innerHTML = '<input type="text" class="cItmDsc"  name="txtItemDesc" value="'+aData.itemDesc+'" readOnly >';
	oCell2.innerHTML = '<input type="text" class="cItmQty"  name="txtQty" value="'+aData.pcQty+'" readOnly >';
	oCell3.innerHTML = '<input type="text" class="cItmUnt"  name="txtUnitCost" value="'+aData.pcUnitCost+'" readOnly >';
	oCell4.innerHTML = '<input type="text" class="cItmTtl"  name="txtTotlCost" value="'+aData.pcTotalCost+'" readOnly >';
	oCell5.innerHTML = '<input type="text" class="cExpDsc"  name="txtExpeDesc" value="'+aData.expenseDesc+'" readOnly >';
	oCell6.innerHTML = '<input type="text" class="cExpQty"  name="txtExpeQty" value="'+aData.pceQty+'" readOnly >';
	oCell7.innerHTML = '<input type="text" class="cExpUnt"  name="txtExpeUnitCost" value="'+aData.pceUnitCost+'" readOnly >';
	oCell8.innerHTML = '<input type="text" class="cExpTtl"  name="txtExpeTotlCost" value="'+aData.pceTotalCost+'" readOnly >';
	oCell9.innerHTML = '-';

	document.getElementById("idItmstiQtyTotal").value = (parseFloat(aData.pcQty) + parseFloat(document.getElementById("idItmstiQtyTotal").value)).toFixed(2);
	document.getElementById("idItmUntCstTotal").value = (parseFloat(aData.pcUnitCost) + parseFloat(document.getElementById("idItmUntCstTotal").value)).toFixed(2);
	document.getElementById("idItmTtlCstTotal").value = (parseFloat(aData.pcTotalCost) + parseFloat(document.getElementById("idItmTtlCstTotal").value)).toFixed(2);
	document.getElementById("idExpnseQtyTotal").value = (parseFloat(aData.pceQty) + parseFloat(document.getElementById("idExpnseQtyTotal").value)).toFixed(2);
	document.getElementById("idExpUntCstTotal").value = (parseFloat(aData.pceUnitCost) + parseFloat(document.getElementById("idExpUntCstTotal").value)).toFixed(2);
	document.getElementById("idExpTtlCstTotal").value = (parseFloat(aData.pceTotalCost) + parseFloat(document.getElementById("idExpTtlCstTotal").value)).toFixed(2);
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
            fResult =  parseFloat(fResult) + parseFloat($(this).val().trim().replaceAll(",",""));
        }
    });
    document.getElementById(idResult).value= fResult.toFixed(2);
}
function fillForm(aData){
	document.getElementById("idDatPWP").value = aData.pwpDate;
	document.getElementById("idActNam").value = aData.accountName;
	document.getElementById("idChaCla").value = aData.channelClass;
	document.getElementById("idTrrtry").value = aData.territory;
	document.getElementById("idPrjTyp").value = aData.projType;
	document.getElementById("idActTyp").value = aData.activityType;
	document.getElementById("idTrdDsc").value = aData.tradeDisc;
	document.getElementById("idMontDA").value = aData.da;

	document.getElementById("idPWPSNo").value = aData.pwpSeries;
	document.getElementById("idCstCnt").value = aData.costCenter;
	document.getElementById("idDatFrm").value = aData.promoFrom;
	document.getElementById("idDateTo").value = aData.promoTo;
	document.getElementById("idEvlDdl").value = aData.postPromoEval;
	document.getElementById("idTtlSls").value = aData.prvSal;
	document.getElementById("idTtlTrg").value = aData.curTrg;
	document.getElementById("idYTDTrg").value = aData.ytdTrg;
	document.getElementById("idYTDAct").value = aData.ytdAct;
	document.getElementById("idTtlDif").value = aData.ttlDif;
	document.getElementById("idYTDDif").value = aData.ttlGrw;
	document.getElementById("idTtlGrw").value = aData.ytdDif;
	document.getElementById("idYTDAch").value = aData.ytdAch;
 	
	document.getElementById("idTxtBg").value = aData.background;
	document.getElementById("idTxtPrmoTtle").value = aData.promoTitle;
	document.getElementById("idTxtObj").value = aData.objectives;
	document.getElementById("idTxtMch").value = aData.mechanics;
	document.getElementById("idTxtConc").value = aData.concession;
	document.getElementById("idTxtRisk").value = aData.risks;

	document.getElementById("idTtlPrjCst").value = aData.totProjCost;
	document.getElementById("idPrjtdSale").value = aData.projectedSales;
	document.getElementById("idPrjtdCost").value = aData.projectedCost;
	document.getElementById("idCostToSalesRatio").value = aData.cToSRatio;
	document.getElementById("idCtoSRatPer").value = ((parseInt(aData.projectedCost)/parseInt(aData.projectedSales))*100).toFixed(2)+"%";
	document.cookie = 'reqId='+aData.reqId;
}
function setAction(sEvent){
	if (sEvent == 0){
		document.getElementById('idBtn_Reviewed').style.visibility = 'visible';
		document.getElementById('idBtn_Rejected').style.visibility = 'visible';
	}
	else {
		document.getElementById('idBtn_Reviewed').style.visibility = 'hidden';
		document.getElementById('idBtn_Rejected').style.visibility = 'hidden';
	}
}
function getAttch(requestID,fileType,sType,sSpan){
	$.ajax({
		url:"query/pwp_asm.php",
		method:"POST",
		data:{ type:"7", requestID:requestID, fileType:fileType },
		success:function(data) {
			if(data!=""){
				// document.getElementById(sSpan).textContent= '<a href="vw.php?file='+data+'">'+sType+'</a>';
				oHref = document.getElementById(sSpan);
				oHref.setAttribute("href", "vw.php?file="+data);
				oHref.setAttribute("target", "_blank");
				oHref.innerHTML=sType;
			}
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function showAttch(requestID){
	getAttch(requestID,1,"COMPUTATION","idComp"); // Computations
	getAttch(requestID,2,"FORECAST / ALLOCATION","idFcAl"); // Forecast/Allocation
	getAttch(requestID,3,"HISTORICAL DATA","idHiDa"); // Historal Data
	getAttch(requestID,4,"OTHER RELEVANT DATA","idReDa"); // Other Relevant Data
	getAttch(requestID,5,"RELEVANT PHOTO/S","idRePh"); // Relevant Photos
	getAttch(requestID,6,"SCHEMES","idSche"); // Schemes
	getAttch(requestID,7,"TRADE LETTER","idTrLe"); // Trade Letter// sComp = 
}
function getPWPData(requestID, sEvent){
	clearPCE();
	clearPVA();
	showAttch(requestID);
	$.ajax({
		url:"query/pwp_auth.php",
		method:"POST",
		dataType: "json",
		data:{ type:"4", requestID:requestID },
		success:function(data) {
		document.getElementById("idPwpId").value = data['reqId'];
			fillForm(data);
			toggleForm(true);
			setUpdate(sEvent);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"query/pwp_auth.php",
		method:"POST",
		dataType: "json",
		data:{ type:"5", requestID:requestID },
		success:function(data) {
			for(iRun=0; iRun<data.length; iRun++){
				insertPVA(data[iRun]);
			}
		    computeTotal("txtAMSInCase","idAMSInCaseTotal");
		    computeTotal("txtAMSPesVal","idAMSPesValTotal");
		    computeTotal("txtITSInCase","idITSInCaseTotal");
		    computeTotal("txtITSPesVal","idITSPesValTotal");
		    computeTotal("txtMAIInCase","idMAIInCaseTotal");
		    computeTotal("txtMAIPesVal","idMAIPesValTotal");
		    computeTotal("txtTPDInCase","idTPDInCaseTotal");
		    computeTotal("txtTPDPesVal","idTPDPesValTotal");
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"query/pwp_auth.php",
		method:"POST",
		dataType: "json",
		data:{ type:"6", requestID:requestID },
		success:function(data) {
			for(iRun=0; iRun<data.length; iRun++){
				insertPCE(data[iRun]);
			}
		    computeTotal("txtItmQty","idItmstiQtyTotal");
		    computeTotal("txtItmUnt","idItmUntCstTotal");
		    computeTotal("txtItmTtl","idItmTtlCstTotal");
		    computeTotal("txtExpQty","idExpnseQtyTotal");
		    computeTotal("txtExpUnt","idExpUntCstTotal");
		    computeTotal("txtExpTtl","idExpTtlCstTotal");
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function createTbl(sTblName,aData,sEvent){
	oTbl = document.getElementById(sTblName);
	oTbl.style.textAlign = "center";
	oRow = oTbl.insertRow(-1);
	oC0 = oRow.insertCell(0);
	oC1 = oRow.insertCell(1);
	oC2 = oRow.insertCell(2);
	oC3 = oRow.insertCell(3);
	oC4 = oRow.insertCell(4);
	oC5 = oRow.insertCell(5);
	oC0.innerHTML = aData.pwpDate;
	oC1.innerHTML = aData.accountName;
	oC2.innerHTML = aData.channelClass;
	oC3.innerHTML = aData.territory;
	oC4.innerHTML = aData.activityType;
	oC5.innerHTML = '<button onclick="getPWPData('+aData.requestId+','+sEvent+')">View</button>';
}
function chngStatus(sStatus){
	$.ajax({
		url:"query/pwp_auth.php",
		method:"POST",
		data:{
			type:"3",sStatus:sStatus
		},
		success:function(data) {
			console.log(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	location.reload();
}
function chngTab(evnt, tabId){
	var i, tabContent, tabLinks;

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
// gets PWP For Review
function getForReview(sTblName, iType, sEvent){
	$.ajax({
		url:"query/pwp_auth.php",
		method:"POST",
		dataType: "json",
		data:{
			type:iType
		},
		success:function(data) {
			data.forEach(function(){
				createTbl(sTblName,data[0],sEvent);
			});
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function getPDFFile(){
	var wnd = window.open("includes/sample_1.html");
    setTimeout(function() {
      wnd.close();
    }, 250);
    return false;
}
$(document).ready(function() {
	document.getElementById("idPendBtn").addEventListener("click", function () { chngTab(event, "idPendTab"); });
	document.getElementById("idLastBtn").addEventListener("click", function () { chngTab(event, "idLastTab"); });
	document.getElementById("idPrevBtn").addEventListener("click", function () { chngTab(event, "idPrevTab"); });
	document.getElementById("idBtn_Approved").addEventListener("click", function () { chngStatus("Approved"); });
	document.getElementById("idBtn_Rejected").addEventListener("click", function () { chngStatus("Rejected"); });

    getForReview("idTbl_Pend_auth", 1, 0);
    getForReview("idTbl_Last_auth", 7, 0);
	getForReview("idTbl_Prev_auth", 2, 1);
});
