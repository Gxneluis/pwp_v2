function toggleForm(bForm){
    if(bForm == true){
        $("#idModal_PWPDetails").css('display','block');
    }else{
        $("#idModal_PWPDetails").css('display','none');
    }
}
function getUrl(){
  sPathName = window.location.href;
  return sPathName.split("/");
}
function setPgng(iLn, vPg){
  iPg = Number(vPg);
  iLm = Math.floor(iLen/10);
  document.getElementById('idPgng').setAttribute('align','center');
  document.getElementById('idPgng').innerHTML = ' <a href="?pg=1" title="First" ><<</a> ';
  document.getElementById('idPgng').innerHTML += ' <a href="?pg='+(iPg-1)+'" title="Previous" ><</a> ';
  iRun=iPg-3;
  do{
    if(iRun>0 && iRun<=iLm){ document.getElementById('idPgng').innerHTML += ' <a href="?pg='+iRun+'" title="'+iRun+'" >'+iRun+'</a> '; }
    iRun++;
  } while(iRun<iPg+4);
  document.getElementById('idPgng').innerHTML += ' <a href="?pg='+(iPg+1)+'" title="Next" >></a> ';
  document.getElementById('idPgng').innerHTML += ' <a href="?pg='+iLm+'" title="Last" >>></a> ';
}
function pad(num, size) {
    num = num.toString();
    while (num.length < size) num = "0" + num;
    return num;
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
	oCell1.innerHTML = '<input type="text" class="cAMSInCase"  name="txtAMSInCase" value="'+aData.amsInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell2.innerHTML = '<input type="text" class="cAMSPesVal"  name="txtAMSPesVal" value="'+aData.amsPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell3.innerHTML = '<input type="text" class="cITSInCase"  name="txtITSInCase" value="'+aData.itsInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell4.innerHTML = '<input type="text" class="cITSPesVal"  name="txtITSPesVal" value="'+aData.itsPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell5.innerHTML = '<input type="text" class="cMAIInCase"  name="txtMAIInCase" value="'+aData.maiInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell6.innerHTML = '<input type="text" class="cMAIPesVal"  name="txtMAIPesVal" value="'+aData.maipvPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell7.innerHTML = '<input type="text" class="cTPDInCase"  name="txtTPDInCase" value="'+aData.tpdInCase.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell8.innerHTML = '<input type="text" class="cTPDPesVal"  name="txtTPDPesVal" value="'+aData.tpdPeso.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
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
	oCell2.innerHTML = '<input type="text" class="cItmQty"  name="txtItmQty" value="'+aData.pcQty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell3.innerHTML = '<input type="text" class="cItmUnt"  name="txtItmUnt" value="'+aData.pcUnitCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell4.innerHTML = '<input type="text" class="cItmTtl"  name="txtItmTtl" value="'+aData.pcTotalCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell5.innerHTML = '<input type="text" class="cExpDsc"  name="txtExpeDesc" value="'+aData.expenseDesc+'" readOnly >';
	oCell6.innerHTML = '<input type="text" class="cExpQty"  name="txtExpQty" value="'+aData.pceQty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell7.innerHTML = '<input type="text" class="cExpUnt"  name="txtExpUnt" value="'+aData.pceUnitCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell8.innerHTML = '<input type="text" class="cExpTtl"  name="txtExpTtl" value="'+aData.pceTotalCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')+'" readOnly >';
	oCell9.innerHTML = '-';
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
    document.getElementById(idResult).value= fResult.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
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
	document.getElementById("idTtlSls").value = aData.prvSal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idTtlTrg").value = aData.curTrg.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idYTDTrg").value = aData.ytdTrg.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idYTDAct").value = aData.ytdAct.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idTtlDif").value = aData.ttlDif.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idYTDDif").value = aData.ttlGrw.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idTtlGrw").value = aData.ytdDif.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idYTDAch").value = aData.ytdAch.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

	document.getElementById("idTxtBg").value = aData.background;
	document.getElementById("idTxtPrmoTtle").value = aData.promoTitle;
	document.getElementById("idTxtObj").value = aData.objectives;
	document.getElementById("idTxtMch").value = aData.mechanics;
	document.getElementById("idTxtConc").value = aData.concession;
	document.getElementById("idTxtRisk").value = aData.risks;

	document.getElementById("idTtlPrjCst").value = aData.totProjCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idPrjtdSale").value = aData.projectedSales.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idPrjtdCost").value = aData.projectedCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idCostToSalesRatio").value = aData.cToSRatio.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	document.getElementById("idCtoSRatPer").value = ((parseInt(aData.projectedCost)/parseInt(aData.projectedSales))*100).toFixed(2)+"%";
	document.cookie = 'reqId='+aData.reqId;
}
function getAttch(requestID,fileType,sType,sSpan){
	$.ajax({
		url:"query/pwp_mis.php",
		method:"POST",
		dataType: "json",
		data:{ type:"5", requestID:requestID, fileType:fileType },
		success:function(data) {
				oDiv = document.getElementById(sSpan);
			if(data!=""){ oDiv.innerHTML=sType; }
			for(iRun=0; iRun<data.length; iRun++){
                oDiv.innerHTML+='<br />';
				oDiv.innerHTML+='<a href="'+data[iRun]['fileName']+'">'+data[iRun]['fileDtl']+'</a>';
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      recErr(XMLHttpRequest, textStatus, errorThrown);
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
		url:"query/pwp_mis.php",
		method:"POST",
		dataType: "json",
		data:{ type:"2", requestID:requestID },
		success:function(data) {
		document.getElementById("idPwpId").value = data['reqId'];
			fillForm(data);
			toggleForm(true);
			setUpdate(sEvent);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"query/pwp_mis.php",
		method:"POST",
		dataType: "json",
		data:{ type:"3", requestID:requestID },
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
      recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"query/pwp_mis.php",
		method:"POST",
		dataType: "json",
		data:{ type:"4", requestID:requestID },
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
      recErr(XMLHttpRequest, textStatus, errorThrown);
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
	oC6 = oRow.insertCell(6);
	oC0.innerHTML = pad(aData.requestId,6)+"<br />"+aData.pwpDate+"<br />"+'<button onclick="getPWPData('+aData.requestId+','+sEvent+')">View</button>';
	oC1.innerHTML = aData.channelClass+"<br />"+aData.accountName;
	oC2.innerHTML = aData.asmDate;
	oC3.innerHTML = aData.ashDate;
	oC4.innerHTML = aData.mmDate;
	oC5.innerHTML = aData.appDate;
	oC6.innerHTML = aData.rejDate;
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
function chngReq(evnt, tabId){
	var i, tabContent, tabLinks;

	tabContent = document.getElementsByClassName("tabReq");
	for(i=0; i<tabContent.length; i++){
		tabContent[i].style.display="none";
	}

	tabLinks = document.getElementsByClassName("tabLnkReq");
	for(i=0; i<tabLinks.length; i++){
		tabLinks[i].className = tabLinks[i].className.replace(" active","")
	}

	document.getElementById(tabId).style.display = "block";
	evnt.currentTarget.className += " active";
}
// gets PWP For Review
function getForReview(sTblName, iType, sEvent){
  iRun=0;
	$.ajax({
		url:"query/pwp_mis.php",
		method:"POST",
		dataType: "json",
		data:{
			type:iType
		},
		success:function(data) {
      iPg = 1;
      iLen = data.length;
      aUrl = getUrl(data);
      aUrl.forEach((sVal, iRun) => {
        if(sVal.includes("pg")){
          aVal = sVal.split("?");
          aDt = aVal[1];
          aPg = aDt.split("=");
          iPg = aPg[1];
        }
      });
			data.forEach(function(aData){
        if(iRun<(10*iPg)&iRun>(10*(iPg-1))){
          createTbl(sTblName,aData,sEvent);
        }
        iRun++;
			});
      setPgng(iLen,iPg);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
      recErr(XMLHttpRequest, textStatus, errorThrown);
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function getPDFFile(){
	var wnd = window.open("includes/sample_1.html");
    setTimeout(function() {
      // wnd.close();
    }, 1000);
    return false;
}
window.setTimeout( function() {
  window.location.reload();
}, 30000);
$(document).ready(function() {

  getForReview("idTbl_MIS", 1, 0);
  document.getElementById("idCostToSalesRatio").style.display = "none";
});
