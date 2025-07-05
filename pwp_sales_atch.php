<?php
session_start(); 
require_once 'nav_bar.php';
require_once 'includes/config.php';
$conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<head>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style><?php include 'css/css_sales.css'; ?></style>
	<style><?php include 'js/js_sales.js'; ?></style>
<script>
  function remFile(idFile){
	$.ajax({
		url:"query/pwp_req.php",
		method:"POST",
		data:{ type:"13", id:idFile },
		success:function(data) {
            console.log(data);
//            location.reload();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log("Status: " + textStatus+"\nError: " + errorThrown);
		}
	});
  }
</script>
</head>
<body>
<br /><br /><br />
<?php

  $url=$_SERVER['REQUEST_URI'];
  $aReqId=explode("=",$url);
  $reqId=$aReqId[1];
  $aPWPFile = array();
  $query="SELECT * FROM `pwpfile` WHERE `requestId`='$reqId' AND `active` = true";
  $queRes=$conn->query($query);
  while ($aQueRes=mysqli_fetch_array($queRes)) {
		$data['id'] = $aQueRes["id"];
		$data['fileName'] = $aQueRes["fileName"];
		$data['FileType'] = $aQueRes["FileType"];
		$data['requestId'] = $aQueRes["requestId"];
		$data['fileDtl'] = $aQueRes["fileDtl"];
		array_push($aPWPFile, $data);
	}
?>
    <div id="" class="grid-cont-pwp-atc">
			<div id="" class="l_side" >
				Supporting Documents / Attachment
                <?php
                  $iRun = 0;
                  $iLimit = count($aPWPFile);
                  while($iRun<$iLimit){
                  	echo '<br />';
                  	echo '<a href="vw.php?file='.$aPWPFile[$iRun]['fileName'].'" target="_blank">'.$aPWPFile[$iRun]['fileDtl'].'</a><button onclick="remFile('.$aPWPFile[$iRun]['id'].')">-</button>';
                    $iRun++;
                  }
              ?>
			</div>
			<div id="" class="r_side" >
		        <form action="query/file_atch_upload.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" id="idReqID" name="reqID" value="<?php echo $reqId; ?>">
				<select id="idAtcTyp" name="atcTyp" class="txt_sales" >
					<option value="1">COMPUTATIONS</option>
					<option value="2">FORECAST / ALLOCATION</option>
					<option value="3">HISTORICAL DATA</option>
					<option value="4">OTHER RELEVANT DATA</option>
					<option value="5">RELEVANT PHOTO/S</option>
					<option value="6">SCHEMES</option>
					<option value="7">TRADE LETTER</option>
				</select>
			    <input type="file" name="fileAtchUpload" id="idfileAtchUpload" accept="application/pdf,image/gif, image/jpeg, image/png, .xls, .xlsx, .docx" >
			    <input type="submit" value="Upload Attachment" name="submit">
		        </form>
			</div>
	</div>
</body>
</html>
