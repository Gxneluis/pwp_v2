function newUser(){

	var employeeId = document.getElementById("idEmpId").value.trim();
	var firstName = document.getElementById("idFName").value.trim();
	var middleName = document.getElementById("idMName").value.trim();
	var lastName = document.getElementById("idLName").value.trim();
	var position = document.getElementById("idPosition").value.trim();
	var department = document.getElementById("idDept").value.trim();

	$.ajax({
		url:"query/usr_qry.php",
		method:"POST",
		data:{
			type:'1',
			employeeId:employeeId,
			firstName:firstName,
			middleName:middleName,
			lastName:lastName,
			position:position,
			department:department
		},
		success:function(data){
			alert(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
	location.reload();
}

window.addEventListener('load',() => {

});
