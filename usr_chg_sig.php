<?php
session_start(); 
require_once 'nav_bar.php';
?>
<!DOCTYPE html>
<head>
	<style><?php include 'css/css_usr.css'; ?></style>
</head>
<body>
<br /><br /><br />
	<div>
		<form action="query/file_sig_upload.php" method="POST" enctype="multipart/form-data">
			Select Signature to upload:
			<input type="file" name="fileSigUpload" id="idfileSigUpload" >
			<input type="submit" value="Upload Signature" name="submit">
		</form>
	</div>
</body>
</html>