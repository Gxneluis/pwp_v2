function chkAtch(reqId){
	$.ajax({
		url:"../query/pwp_pdf.php",
		method:"POST",
		dataType: "json",
		data:{ type:"4", requestID:reqId },
		success:function(data) {
            for(iRun=0; iRun<data.length; iRun++){
                if(data[iRun]['fileType']==1){document.cookie = 'file01=true';}
                if(data[iRun]['fileType']==2){document.cookie = 'file02=true';}
                if(data[iRun]['fileType']==3){document.cookie = 'file03=true';}
                if(data[iRun]['fileType']==4){document.cookie = 'file04=true';}
                if(data[iRun]['fileType']==5){document.cookie = 'file05=true';}
                if(data[iRun]['fileType']==6){document.cookie = 'file06=true';}
                if(data[iRun]['fileType']==7){document.cookie = 'file07=true';}
            }
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function splitFile(reqId){
chkAtch(reqId);
	sCookie = document.cookie;
	aCookie = sCookie.split(';');
	aCookies = [];
	for(i = 0; i<aCookie.length; i++){
		aTemp = aCookie[i].split('=');
		sIndex = aTemp[0].trim();
		if(sIndex.includes('file0')){
			aCookies[sIndex]="F";
		}
	}
console.log(aCookies);
	return aCookies;
}
// get Signatories
function collectSgnrs(reqId){
		gmngrId = 0;
		unknwnId = 0;
		globlId = 3;
	$.ajax({
		url:"../query/pdf_sgnr.php",
		method:"POST",
		dataType: "json",
		data:{ type:"1", requestID:reqId },
		success:function(data) {
			document.cookie = 'sgnr_rqstr_name='+data['empName'];
			if(data['signature']===null){
				document.cookie = 'sgnr_rqstr_sign= ';
			}else{
				document.cookie = 'sgnr_rqstr_sign='+data['signature'];
			}

			d = new Date();
			d2 = new Date(d.getTime()+10000);
               document.cookie = "expires=" + d2.toUTCString() + ";"
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"../query/pdf_sgnr.php",
		method:"POST",
		dataType: "json",
		data:{ type:"2", requestID:reqId },
		success:function(data) {
			document.cookie = 'sgnr_revwr_name='+data['empName'];
			if(data['signature']===null){
				document.cookie = 'sgnr_revwr_sign= ';
			}
			else{
				document.cookie = 'sgnr_revwr_sign='+data['signature'];
			}

			d = new Date();
			d2 = new Date(d.getTime()+10000);
               document.cookie = "expires=" + d2.toUTCString() + ";"
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"../query/pdf_sgnr.php",
		method:"POST",
		dataType: "json",
		data:{ type:"3", requestID:reqId },
		success:function(data) {
			document.cookie = 'sgnr_aprvr_name='+data['empName'];
			if(data['signature']===null){
				document.cookie = 'sgnr_aprvr_sign= ';
			}
			else{
				document.cookie = 'sgnr_aprvr_sign='+data['signature'];
			}

			d = new Date();
			d2 = new Date(d.getTime()+10000);
               document.cookie = "expires=" + d2.toUTCString() + ";"
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"../query/pdf_sgnr.php",
		method:"POST",
		dataType: "json",
		data:{ type:"4", empId:globlId },
		success:function(data) {
			document.cookie = 'sgnr_globl_name='+data['empName'];
			d = new Date();
			d2 = new Date(d.getTime()+10000);
               document.cookie = "expires=" + d2.toUTCString() + ";"
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	$.ajax({
		url:"../query/pdf_sgnr.php",
		method:"POST",
		dataType: "json",
		data:{ type:"5", requestID:reqId },
		success:function(data) {
			if(data['signature']===undefined){
				document.cookie = 'sgnr_globl_sign= ';
			}
			else{
				document.cookie = 'sgnr_globl_sign='+data['signature'];
			}

			d = new Date();
			d2 = new Date(d.getTime()+10000);
               document.cookie = "expires=" + d2.toUTCString() + ";"
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	// $.ajax({
	// 	url:"../query/pdf_sgnr.php",
	// 	method:"POST",
	// 	dataType: "json",
	// 	data:{ type:"4", empId:unknwnId },
	// 	success:function(data) {
	// 		document.cookie = 'sgnr_uknwn_name='+data['empName'];
	// 		if(data['signature']===undefined){
	// 			document.cookie = 'sgnr_uknwn_sign=0';
	// 		}
	// 		else{
	// 			document.cookie = 'sgnr_uknwn_sign='+data['signature'];
	// 		}


	// 		d = new Date();
	// 		d2 = new Date(d.getTime()+10000);
    //            document.cookie = "expires=" + d2.toUTCString() + ";"
	// 	},
	// 	error: function(XMLHttpRequest, textStatus, errorThrown) {
	// 		console.log("Status: " + textStatus+"\nError: " + errorThrown);
	// 	}
	// });
	// $.ajax({
	// 	url:"../query/pdf_sgnr.php",
	// 	method:"POST",
	// 	dataType: "json",
	// 	data:{ type:"4", empId:'' },
	// 	success:function(data) {
	// 		document.cookie = 'sgnr_gmngr_name='+data['empName'];
	// 		if(data['signature']===undefined){
	// 			document.cookie = 'sgnr_gmngr_sign=0';
	// 		}
	// 		else{
	// 			document.cookie = 'sgnr_gmngr_sign='+data['signature'];
	// 		}

	// 		d = new Date();
	// 		d2 = new Date(d.getTime()+10000);
    //            document.cookie = "expires=" + d2.toUTCString() + ";"
	// 	},
	// 	error: function(XMLHttpRequest, textStatus, errorThrown) {
	// 		console.log("Status: " + textStatus+"\nError: " + errorThrown);
	// 	}
	// });
}
function getSgnrs(reqId){
	collectSgnrs(reqId);
	sCookie = document.cookie;
	aCookie = sCookie.split(';');
	aCookies = [];
	for(i = 0; i<aCookie.length; i++){
		aTemp = aCookie[i].split('=');
		sIndex = aTemp[0].trim();
		if(sIndex.includes('sgnr_')){
			sTemps = sIndex.replace('sgnr_','');
			aCookies[sTemps]=aTemp[1].trim();
		}
	}
	// console.log(aCookies);
	return aCookies;
}
function getCookie(){
	sCookie = document.cookie;
	aCookie = sCookie.split(';');
	aCookies = [];
	for(i = 0; i<aCookie.length; i++){
		aTemp = aCookie[i].split('=');
		sIndex = aTemp[0].trim();
		if(sIndex.includes('reqId')){
			aCookies[sIndex]=aTemp[1].trim();
		}
	}
	return aCookies;
}
function splitCookie(){
	sCookie = document.cookie;
	aCookie = sCookie.split(';');
	aCookies = [];
	for(i = 0; i<aCookie.length; i++){
		aTemp = aCookie[i].split('=');
		sIndex = aTemp[0].trim();
		if(!sIndex.includes('pva_') || !sIndex.includes('pce_')){
			aCookies[sIndex]=aTemp[1].trim();
		}
	}
	return aCookies;
}
function splitPVA(){
	sCookie = document.cookie;
	aCookie = sCookie.split(';');
	aPVA = [];
	aCatBrnd = [];
	aAMSICTtl = [];
	aAMSPVTtl = [];
	aITSICTtl = [];
	aITSPVTtl = [];
	aMAIICTtl = [];
	aMAIPVTtl = [];
	aTPDICTtl = [];
	aTPDPVTtl = [];
	for(i = 0; i<aCookie.length; i++){
		aCookies = [];
		aTemp = aCookie[i].split('=');
		sIndex = aTemp[0].trim();
		if(sIndex.includes('pva_')){
			sTemps = sIndex.replace('pva_','');
			sTemp = sTemps.replace(/[0-9]/g,'');
			switch(sTemp){
				case 'cateBrand':
				aCatBrnd.push(aTemp[1].trim());
					break;
				case 'amsInCase':
				aAMSICTtl.push(aTemp[1].trim());
					break;
				case 'amsPeso':
				aAMSPVTtl.push(aTemp[1].trim());
					break;
				case 'itsInCase':
				aITSICTtl.push(aTemp[1].trim());
					break;
				case 'itsPeso':
				aITSPVTtl.push(aTemp[1].trim());
					break;
				case 'maiInCase':
				aMAIICTtl.push(aTemp[1].trim());
					break;
				case 'maipvPeso':
				aMAIPVTtl.push(aTemp[1].trim());
					break;
				case 'tpdInCase':
				aTPDICTtl.push(aTemp[1].trim());
					break;
				case 'tpdPeso':
				aTPDPVTtl.push(aTemp[1].trim());
					break;
			}
		}
	}
	aPVA.push(aCatBrnd);
	aPVA.push(aAMSICTtl);
	aPVA.push(aAMSPVTtl);
	aPVA.push(aITSICTtl);
	aPVA.push(aITSPVTtl);
	aPVA.push(aMAIICTtl);
	aPVA.push(aMAIPVTtl);
	aPVA.push(aTPDICTtl);
	aPVA.push(aTPDPVTtl);
	return aPVA;
}
function splitPCE(){
	sCookie = document.cookie;
	aCookie = sCookie.split(';');
	aPCE = [];
	itemDesc = [];
	pcQty = [];
	pcUnitCost = [];
	pcTotalCost = [];
	expenseDesc = [];
	pceQty = [];
	pceUnitCost = [];
	pceTotalCost = [];

	for(i = 0; i<aCookie.length; i++){
		aCookies = [];
		aTemp = aCookie[i].split('=');
		sIndex = aTemp[0].trim();
		if(sIndex.includes('pce_')){
			sTemps = sIndex.replace('pce_','');
			sTemp = sTemps.replace(/[0-9]/g,'');
			switch(sTemp){
				case 'itemDesc':
				itemDesc.push(aTemp[1].trim());
					break;
				case 'pcQty':
				pcQty.push(aTemp[1].trim());
					break;
				case 'pcUnitCost':
				pcUnitCost.push(aTemp[1].trim());
					break;
				case 'pcTotalCost':
				pcTotalCost.push(aTemp[1].trim());
					break;
				case 'expenseDesc':
				expenseDesc.push(aTemp[1].trim());
					break;
				case 'pceQty':
				pceQty.push(aTemp[1].trim());
					break;
				case 'pceUnitCost':
				pceUnitCost.push(aTemp[1].trim());
					break;
				case 'pceTotalCost':
				pceTotalCost.push(aTemp[1].trim());
					break;
			}
		}
	}
	aPCE.push(itemDesc);
	aPCE.push(pcQty);
	aPCE.push(pcUnitCost);
	aPCE.push(pcTotalCost);
	aPCE.push(expenseDesc);
	aPCE.push(pceQty);
	aPCE.push(pceUnitCost);
	aPCE.push(pceTotalCost);
	return aPCE;
}
function getPWPRequest(requestID){
	jData = [];
	$.ajax({
		url:"../query/pwp_pdf.php",
		method:"POST",
		dataType: "json",
		data:{ type:"1", requestID:requestID },
		success:function(data) {
			if((Object.keys(data).length)!= 35){ location.reload(); }
			document.cookie = 'reqId='+data["reqId"];
			document.cookie = 'pwpDate='+data['pwpDate'];
			document.cookie = 'accountName='+data['accountName'];
			document.cookie = 'channelClass='+data['channelClass'];
			document.cookie = 'territory='+data['territory'];
			document.cookie = 'projType='+data['projType'];
			document.cookie = 'activityType='+data['activityType'];
			document.cookie = 'tradeDisc='+data['tradeDisc'];
			document.cookie = 'da='+data['da'];
			document.cookie = 'pwpSeries='+data['pwpSeries'];
			document.cookie = 'costCenter='+data['costCenter'];
			document.cookie = 'promoFrom='+data['promoFrom'];
			document.cookie = 'promoTo='+data['promoTo'];
			document.cookie = 'postPromoEval='+data['postPromoEval'];
			document.cookie = 'prvSal='+data['prvSal'];
			document.cookie = 'curTrg='+data['curTrg'];
			document.cookie = 'ytdTrg='+data['ytdTrg'];
			document.cookie = 'ytdAct='+data['ytdAct']
			document.cookie = 'ttlDif='+data['ttlDif'];
			document.cookie = 'ttlGrw='+data['ttlGrw'];
			document.cookie = 'ytdDif='+data['ytdDif'];
			document.cookie = 'ytdAch='+data['ytdAch']

			document.cookie = 'background='+data['background'];
			document.cookie = 'promoTitle='+data['promoTitle'];
			document.cookie = 'objectives='+data['objectives'];
			document.cookie = 'mechanics='+data['mechanics'];
			document.cookie = 'concession='+data['concession'];
			document.cookie = 'risks='+data['risks'];

			document.cookie = 'pvaTotal='+data['pvaTotal'];
			document.cookie = 'pcTotal='+data['pcTotal'];
			document.cookie = 'pceTotal='+data['pceTotal'];

			document.cookie = 'totProjCost='+data['totProjCost'];
			document.cookie = 'projectedSales='+data['projectedSales'];
			document.cookie = 'projectedCost='+data['projectedCost'];
			document.cookie = 'cToSRatio='+data['cToSRatio'];

			d = new Date();
			d2 = new Date(d.getTime()+10000);
               document.cookie = "expires=" + d2.toUTCString() + ";"
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function getPWPPVA(requestID){
	jData = [];
	$.ajax({
		url:"../query/pwp_pdf.php",
		method:"POST",
		dataType: "json",
		data:{ type:"2", requestID:requestID },
		success:function(data) {
			for(iRun=0; iRun<data.length; iRun++){
				document.cookie = 'pva_cateBrand'+iRun+'='+data[iRun]["cateBrand"];
				document.cookie = 'pva_amsInCase'+iRun+'='+data[iRun]["amsInCase"];
				document.cookie = 'pva_amsPeso'+iRun+'='+data[iRun]["amsPeso"];
				document.cookie = 'pva_itsInCase'+iRun+'='+data[iRun]["itsInCase"];
				document.cookie = 'pva_itsPeso'+iRun+'='+data[iRun]["itsPeso"];
				document.cookie = 'pva_maiInCase'+iRun+'='+data[iRun]["maiInCase"];
				document.cookie = 'pva_maipvPeso'+iRun+'='+data[iRun]["maipvPeso"];
				document.cookie = 'pva_tpdInCase'+iRun+'='+data[iRun]["tpdInCase"];
				document.cookie = 'pva_tpdPeso'+iRun+'='+data[iRun]["tpdPeso"];
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
function getPWPPCE(requestID){
	jData = [];
	$.ajax({
		url:"../query/pwp_pdf.php",
		method:"POST",
		dataType: "json",
		data:{ type:"3", requestID:requestID },
		success:function(data) {
			for(iRun=0; iRun<data.length; iRun++){
				document.cookie = 'pce_itemDesc'+iRun+'='+data[iRun]["itemDesc"];
				document.cookie = 'pce_pcQty'+iRun+'='+data[iRun]["pcQty"];
				document.cookie = 'pce_pcUnitCost'+iRun+'='+data[iRun]["pcUnitCost"];
				document.cookie = 'pce_pcTotalCost'+iRun+'='+data[iRun]["pcTotalCost"];
				document.cookie = 'pce_expenseDesc'+iRun+'='+data[iRun]["expenseDesc"];
				document.cookie = 'pce_pceQty'+iRun+'='+data[iRun]["pceQty"];
				document.cookie = 'pce_pceUnitCost'+iRun+'='+data[iRun]["pceUnitCost"];
				document.cookie = 'pce_pceTotalCost'+iRun+'='+data[iRun]["pceTotalCost"];
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
}
