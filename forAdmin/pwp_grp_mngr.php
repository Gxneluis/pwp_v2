<?php
//PWP Group Manager
$grp_mngr = '
<div>Group Management
<button type="button" id="btnNewAssign" onClick="">Assign New</button>
<button type="button" id="btnNewGroup" onClick="">Create New Group</button>
<button type="button" id="btnNewSub" onClick="">Create Sub Group</button>
</div>
<div class="grid-cont-usr">
  <div id="container" class="cont-grp" ></div>
  <div id="usrCnt" class="cont-usr" ></div>
</div>
<div id="idmodalNewGroup" class="modalNewGroup">
  <div class="modal-content">
    <span class="close">&times;</span>
  <h3>New Group</h3>
	<form action="">
		Name: <br /><input type="text" id="idName" name="Name"><br />
		Details: <br /><input type="text" id="idDetail" name="Detail"><br />
		Approver: <br /><select id="idApprover" name="Approver"></select><br />
		<button type="button" id="btnNewSubmit" onClick="newGroup()">Submit</button>
	</form>
  </div>
</div>
<div id="idmodalNewSubGroup" class="modalNewGroup">
  <div class="modal-content">
    <span class="close">&times;</span>
  <h3>New Sub Group</h3>
	<form action="">
		Name: <br /><input type="text" id="idSubName" name="Name"><br />
		Details: <br /><input type="text" id="idSubDetail" name="Detail"><br />
		Reviewer: <br /><select id="idReviewer" name="Reviewer"></select><br />
		Group ID: <br /><select id="idGroupId" name="GroupId"></select><br />
		<button type="button" id="btnNewSubSubmit" onClick="newSub()">Submit</button>
	</form>
  </div>
</div>
<div id="idmodalNewAssignGroup" class="modalNewGroup">
  <div class="modal-content">
    <span class="close">&times;</span>
  <h3>New Sub Group</h3>
	<form action="">
		Employee ID: <br /><select id="idGrpEmpId" name="EmployeeId"></select><br />
		Group ID: <br /><select id="idGrpId" name="GroupId"></select><br />
		Sub Group ID: <br /><select id="idSbGrpId" name="SubGroupId"></select><br />
		<button type="button" id="btnNewAssignSubmit" onClick="newGrpAssign()">Submit</button>
	</form>
  </div>
</div>

<script>
// Get the modal
var modalNew = document.getElementById("idmodalNewGroup");
var modalNewSub = document.getElementById("idmodalNewSubGroup");
var modalNewAssign = document.getElementById("idmodalNewAssignGroup");

// Get the button that opens the modal
var btnNewGroup = document.getElementById("btnNewGroup");
var btnNewSub = document.getElementById("btnNewSub");
var btnNewAssign = document.getElementById("btnNewAssign");

// Get the <span> element that closes the modal
var span0 = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
var span2 = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal
btnNewGroup.onclick = function() {
	modalNew.style.display = "block";
}
btnNewSub.onclick = function() {
	modalNewSub.style.display = "block";
}
btnNewAssign.onclick = function() {
	modalNewAssign.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span0.onclick = function() {
  modalNew.style.display = "none";
  modalNewSub.style.display = "none";
  modalNewAssign.style.display = "none";
}
span1.onclick = function() {
  modalNew.style.display = "none";
  modalNewSub.style.display = "none";
  modalNewAssign.style.display = "none";
}
span2.onclick = function() {
  modalNew.style.display = "none";
  modalNewSub.style.display = "none";
  modalNewAssign.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalNew || event.target == modalNewSub || event.target == modalNewAssign) {
    modalNew.style.display = "none";
    modalNewSub.style.display = "none";
    modalNewAssign.style.display = "none";
  }
}
</script>
';
