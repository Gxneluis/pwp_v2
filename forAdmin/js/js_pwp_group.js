// QuantaAdmin
// 0b0617d6409480571d4b3e9169777e31
// Quant@4dm1n
// bb8e69e4fb41d3e93c85a11dde5de740

function loadOptGrp(oList, sIdGroup){
	var select = document.getElementById(sIdGroup);
	for(var iRun = 0; iRun<oList.length; iRun++){
		var aGrpLst = oList[iRun];
		var el = document.createElement("option");
		el.textContent = aGrpLst['groupName'];
		el.value = aGrpLst['groupId'];
		select.appendChild(el);
	}
}
function loadOptSub(oList, sIdSbGrp){
	var select = document.getElementById(sIdSbGrp);
	for(var iRun = 0; iRun<oList.length; iRun++){
		var aGrpLst = oList[iRun];
		var el = document.createElement("option");
		el.textContent = aGrpLst['subGroupName'];
		el.value = aGrpLst['subGroupId'];
		select.appendChild(el);
	}
}
function loadOptEmp(oList, sIdEmply){
	var select = document.getElementById(sIdEmply);
	for(var iRun = 0; iRun<oList.length; iRun++){
		var aGrpLst = oList[iRun];
		var el = document.createElement("option");
		el.textContent = aGrpLst['Name'];
		el.value = aGrpLst['employeeId'];
		select.appendChild(el);
	}
}
function dspUsr(aData){
	// iGARun = int Group Assign List Run
  var ul=$("<ul>");
  $.each(aData, function(index, value){
    ul.append($("<li>").text(value["Name"]));
		console.log(value["Name"]);
  });
  $('#usrCnt').append(ul);
}
function loadUser(){
	$.ajax({
		url:"query/pwp_GetGroupList.php",
		method:"POST",
		dataType: "json",
		data:{
			Type:"4"
		},
		success:function(dUsers) {
			// console.log(dUsers);
			dspUsr(dUsers);
		}
	});
}
function loadList(){
	$.ajax({
		url:"query/pwp_GetGroupList.php",
		method:"POST",
		dataType: "json",
		data:{
			Type:"2"
		},
		success:function(dGroup) {
			aGroupList = JSON.parse(JSON.stringify(dGroup));
			loadOptGrp(aGroupList,"idGrpId");
			loadOptGrp(aGroupList,"idGroupId");
			$.ajax({
				url:"query/pwp_GetGroupList.php",
				method:"POST",
				dataType: "json",
				data:{
					Type:"3"
				},
				success:function(dSubGroup) {
					// console.log(dSubGroup);
					aSubGroupList = JSON.parse(JSON.stringify(dSubGroup));
					loadOptSub(aSubGroupList,"idSbGrpId");
					$.ajax({
						url:"query/pwp_GetGroupList.php",
						method:"POST",
						dataType: "json",
						data:{
							Type:"1"
						},
						success:function(dAssign) {
							// console.log(dAssign);
							aAssign = JSON.parse(JSON.stringify(dAssign));

			// iGRun = int Group List Run
			for(var iGRun = 0; iGRun < aGroupList.length; iGRun++){
				// console.log("Log# "+iGRun+"\nID: "+aGroupList[iGRun]['groupId']+"\nDetails: "+aGroupList[iGRun]['groupDetails']+"\nName: "+aGroupList[iGRun]['groupName']);
				var ulnode = document.createElement('ul');
				ulnode.setAttribute("id","Divul_"+iGRun);
				container.appendChild(ulnode);
				var node = document.createElement('li');
				node.setAttribute("id","Div_"+iGRun);
				node.appendChild(document.createTextNode(aGroupList[iGRun]['groupName']+" - "+aGroupList[iGRun]['approvers']+" - "+aGroupList[iGRun]['usrNam']));
				var ulcont = document.getElementById("Divul_"+iGRun);
				ulcont.appendChild(node);

				// iSGRun = int Sub Group List Run
				for(iSGRun = 0; iSGRun<aSubGroupList.length; iSGRun++){
					// console.log("Sub Log# "+iSGRun+"\nID: "+aSubGroupList[iSGRun]['subGroupId']+"\nDetails: "+aSubGroupList[iSGRun]['subGroupDetails']+"\nName: "+aSubGroupList[iSGRun]['subGroupName']);
					if(aSubGroupList[iSGRun]['groupId'] == aGroupList[iGRun]['groupId']){
						var ulcont3 = document.getElementById("Div_"+iGRun);
						var ulnode2 = document.createElement('ul');
						ulnode2.setAttribute("id","Divul_"+iGRun+"_"+iSGRun);
						ulcont3.appendChild(ulnode2);
						var node2 = document.createElement('li');
						node2.setAttribute("id","Div_"+iGRun+"_"+iSGRun);
						node2.appendChild(document.createTextNode(aSubGroupList[iSGRun]['subGroupName']+" - "+aSubGroupList[iSGRun]['reviewer']+" - "+aSubGroupList[iSGRun]['usrNam']));
						var ulcont2 = document.getElementById("Divul_"+iGRun+"_"+iSGRun);
						ulcont2.appendChild(node2);
					}
					// iGARun = int Group Assign List Run
					for(iGARun = 0; iGARun<aAssign.length; iGARun++){
						// console.log("Assign Log# "+iGARun+"\nEmployee ID: "+aAssign[iGARun]['assignId']+"\nName: "+aAssign[iGARun]['Name']);
						if(aSubGroupList[iSGRun]['subGroupId'] == aAssign[iGARun]['subGroupId'] && aGroupList[iGRun]['groupId'] == aAssign[iGARun]['groupId']){
							var ulcont3 = document.getElementById("Div_"+iGRun+"_"+iSGRun);
							var ulnode2 = document.createElement('ul');
							ulnode2.setAttribute("id","Divul_"+iGRun+"_"+iSGRun+"_"+iGARun);
							ulcont3.appendChild(ulnode2);
							var node2 = document.createElement('li');
							node2.setAttribute("id","Div_"+iGRun+"_"+iSGRun+"_"+iGARun);
							node2.appendChild(document.createTextNode(aAssign[iGARun]['Name']));
							var ulcont2 = document.getElementById("Divul_"+iGRun+"_"+iSGRun+"_"+iGARun);
							ulcont2.appendChild(node2);
						}
					}
				}
			}
						}
					});
				}
			});
		}
	});

	$.ajax({
		url:"query/pwp_GetGroupList.php",
		method:"POST",
		dataType: "json",
		data:{
			Type:"4"
		},
		success:function(dUsers) {
			// console.log(dUsers);
			aUserList = JSON.parse(JSON.stringify(dUsers));
			loadOptEmp(aUserList,"idApprover");
			loadOptEmp(aUserList,"idReviewer");
			loadOptEmp(aUserList,"idGrpEmpId");
		}
	});
}

window.addEventListener('load',() => {
	loadList();
	loadUser();
});

function newGrpAssign(){
	optGrp = document.getElementById("idGrpId");
	optSubGrp = document.getElementById("idSbGrpId");
	empId = document.getElementById("idGrpEmpId");
	// console.log(employeeId);
	var groupId =optGrp.value;
	var subGroupId =optSubGrp.value;
	var employeeId =empId.value;
	$.ajax({
		url:"query/pwp_SetGroup.php",
		method:"POST",
		data:{type:'3', employeeId: employeeId, groupId: groupId, subGroupId: subGroupId},
		success:function(data){
			console.log(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	location.reload();
}

function newGroup(){
	var groupName =document.getElementById("idName").value.trim();
	var groupDetails =document.getElementById("idDetail").value.trim();
	optApp = document.getElementById("idApprover");
	var approvers =optApp.value;

	$.ajax({
		url:"query/pwp_SetGroup.php",
		method:"POST",
		data:{type:'1', groupName: groupName, groupDetails: groupDetails, approvers: approvers},
		success:function(data){
			console.log(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	location.reload();
}

function newSub(){
	var subGroupName =document.getElementById("idSubName").value.trim();
	var subGroupDetails =document.getElementById("idSubDetail").value.trim();
	optRev = document.getElementById("idReviewer");
	var reviewer =optRev.value;
	var groupId =document.getElementById("idGroupId").value.trim();
	$.ajax({
		url:"query/pwp_SetGroup.php",
		method:"POST",
		data:{type:'2', subGroupName: subGroupName, subGroupDetails: subGroupDetails, reviewer: reviewer, groupId:groupId},
		success:function(data){
			console.log(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	location.reload();
}
