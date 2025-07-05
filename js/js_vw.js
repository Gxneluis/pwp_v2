var aGData = [];

function toggleForm(bForm){
    if(bForm == true){
        $("#idModal_PWPDetails").css('display','block');
    }else{
        $("#idModal_PWPDetails").css('display','none');
    }
}
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
  if($(this).val().trim().replaceAll(",","")=="") { fResult =  parseFloat(fResult) + parseFloat(0); }
  else { fResult =  parseFloat(fResult) + parseFloat($(this).val().trim().replaceAll(",","")); }
  });
  document.getElementById(idResult).value= fResult.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}
function fillForm(aData){
  document.getElementById("idDatPWP").value = aData.pwpDate;
  document.getElementById("idActNam").value = aData.accountName;
  document.getElementById("idChaCla").value = aData.channelClass;
  document.getElementById("idTrrtry").value = aData.territory;
  document.getElementById("idPrjTyp").value = aData.projType;
  document.getElementById("idActTyp").value = getActTyp(aData.activityType);
  document.getElementById("idTrdDsc").value = aData.tradeDisc;
  document.getElementById("idMontDA").value = aData.da;

  document.getElementById("idPWPSNo").value = aData.pwpSeries;
  document.getElementById("idCstCnt").value = aData.costCenter;
  document.getElementById("idDatFrm").value = aData.promoFrom;
  document.getElementById("idDateTo").value = aData.promoTo;
  document.getElementById("idEvlDdl").value = aData.postPromoEval;
  document.getElementById("idTtlSls").value = aData.prvSal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
//	document.getElementById("idTtlTrg").value = aData.curTrg.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  document.getElementById("idYTDTrg").value = aData.ytdTrg.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  document.getElementById("idYTDAct").value = aData.ytdAct.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
//	document.getElementById("idTtlDif").value = aData.ttlDif.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  document.getElementById("idYTDDif").value = aData.ttlGrw.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
//	document.getElementById("idTtlGrw").value = aData.ytdDif.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
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
    url:"query/pwp_vw.php",
    method:"POST",
    dataType: "json",
    data:{ type:"8", requestID:requestID, fileType:fileType },
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
		default : return "Code not Found";
	}
}
function getPWPData(requestID, sEvent){
	clearPCE();
	clearPVA();
  showAttch(requestID);
	$.ajax({
		url:"query/pwp_vw.php",
		method:"POST",
		dataType: "json",
		data:{ type:"5", requestID:requestID },
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
		url:"query/pwp_vw.php",
		method:"POST",
		dataType: "json",
		data:{ type:"6", requestID:requestID },
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
		url:"query/pwp_vw.php",
		method:"POST",
		dataType: "json",
		data:{ type:"7", requestID:requestID },
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
	oC7 = oRow.insertCell(7);
	oC8 = oRow.insertCell(8);
	oC9 = oRow.insertCell(9);
	oC10 = oRow.insertCell(10);
	oC0.innerHTML = pad(aData.requestId,6) +"<br />"+ aData.dateFrwd;
	oC1.innerHTML = aData.pwpDate;
	oC2.innerHTML = getActTyp( aData.activityType );
	oC3.innerHTML = aData.promoTitle;
	oC4.innerHTML = aData.accountName;
	oC5.innerHTML = aData.territory;
	oC6.innerHTML = aData.itsPVTtl.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC7.innerHTML = aData.tpdPVTtl.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC8.innerHTML = aData.projectedCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC9.innerHTML = aData.cToSRatio.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	oC10.innerHTML = '<button onclick="getPWPData('+aData.requestId+','+sEvent+')">View</button>';
}
function chngTab(evnt, tabId){
	var i, tabContent, tabLinks;
    $("#idModal_PWPDetails").css('display','none');
	tabContent = document.getElementsByClassName("tabContent");
	for(i=0; i<tabContent.length; i++){ tabContent[i].style.display="none"; }

	tabLinks = document.getElementsByClassName("tabLinks");
	for(i=0; i<tabLinks.length; i++){ tabLinks[i].className = tabLinks[i].className.replace(" active","") }

	document.getElementById(tabId).style.display = "block";
	evnt.currentTarget.className += " active";
}
function chngReq(evnt, tabId){
	var i, tabContent, tabLinks;

	tabContent = document.getElementsByClassName("tabReq");
	for(i=0; i<tabContent.length; i++){ tabContent[i].style.display="none"; }

	tabLinks = document.getElementsByClassName("tabLnkReq");
	for(i=0; i<tabLinks.length; i++){ tabLinks[i].className = tabLinks[i].className.replace(" active","") }

	document.getElementById(tabId).style.display = "block";
	evnt.currentTarget.className += " active";
}
// gets PWP For Review
function getForReview(sTblName, iType, sEvent){
  iRun=0;
  $.ajax({
    url:"query/pwp_vw.php",
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
      recErr(XMLHttpRequest, textStatus, errorThrown);
      console.log("Status: " + textStatus+"\nError: " + errorThrown);
    }
  });
}
function getPDFFile(){
	var wnd = window.open("includes/sample_1.html");
    setTimeout(function() {
      wnd.close();
    }, 1000);
    return false;
}
$(document).ready(function() {
	document.getElementById("idBtn_vw_asm").addEventListener("click", function () { chngTab(event, "idVwTab_ASM"); });
	document.getElementById("idBtn_vw_ash").addEventListener("click", function () { chngTab(event, "idVwTab_ASH"); });
	document.getElementById("idBtn_vw_mm").addEventListener("click", function () { chngTab(event, "idVwTab_MM"); });
	document.getElementById("idBtn_vw_gm").addEventListener("click", function () { chngTab(event, "idVwTab_GM"); });

  getForReview("idTbl_ASM_Pend", 1, 0);
  getForReview("idTbl_ASH_Pend", 2, 0);
  getForReview("idTbl_MM_Pend", 3, 0);
  getForReview("idTbl_GM_Pend", 4, 0);
  document.getElementById("idCostToSalesRatio").style.display = "none";
});
