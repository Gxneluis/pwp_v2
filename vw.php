<?php
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
  else  
    $url = "http://";   
  // Append the host(domain name, ip) to the URL.   
  $url.= $_SERVER['HTTP_HOST'];
  // Append the requested resource location to the URL   
  $url.= $_SERVER['REQUEST_URI'];
  $aString=explode("=",$url);
  $sFileName=$aString[1];
?>

<iframe src="<?php echo $sFileName ?>" width="100%" height="100%" ></iframe>
