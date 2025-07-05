<?php
//User Manager
$usr_mngr = '
<div>User Management
<button type="button" id="btnNewUser" onClick="">New User</button>
<button type="button" id="btnEditUser" onClick="">Edit User</button>
<button type="button" id="btnchngpass" onClick="">Change Password</button>
</div>

<div id="idModalNewUser" class="modalNewGroup">
  <div class="modal-content">
    <span class="usrClose">&times;</span>
  <h3>New Group</h3>
	<form action="">
		Employee ID: <br /><input type="text" id="idEmpId" name="EmpId"><br />
		First Name: <br /><input type="text" id="idFName" name="FirstName"><br />
		Middle Name: <br /><input type="text" id="idMName" name="MiddleName"><br />
		Last Name: <br /><input type="text" id="idLName" name="LastName"><br />
		Position: <br /><input type="text" id="idPosition" name="Position"><br />
		Department: <br /><input type="text" id="idDept" name="Department"><br />
		<button type="button" id="btnNewUserSubmit" onClick="newUser()">Submit</button>
	</form>
  </div>
</div>

<script>
// Get the modal
var modalNewUser = document.getElementById("idModalNewUser");

// Get the button that opens the modal
var btnNewUser = document.getElementById("btnNewUser");

// Get the <span> element that closes the modal
var usrSpan = document.getElementsByClassName("usrClose")[0];

// When the user clicks the button, open the modal 
btnNewUser.onclick = function() {
	modalNewUser.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
usrSpan.onclick = function() {
  modalNewUser.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalNewUser) {
    modalNewUser.style.display = "none";
  }
}
</script>
';