<?php
error_reporting(0);
$redirectUrlIfFlag = "https://www.google.com";
$sites = ["https://domain1.com","https://domain2.com","https://domain3.com"];
for($i=0;$i<count($sites);$i++){
$input = $sites[$i];
$parse = parse_url($input);
$trim = $parse['host'];
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.urlvoid.com/");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'cookie: _ga=GA1.2.1823657957.1596892673; _omappvp=6ywhIOzMNomWb5zudSBWBfAzXjR2uhiZeRbxyneMuv5xz6mKORJmVCeMKJ9xGoG7INIrm6sPYTpinBORnE8bzt1jsRBrJy1e; __gads=ID=bf86de75d6d6d863:T=1596892775:S=ALNI_MaHNMVRZeRk7nx5bSW_PfUEUukTAw; cookiebanner-accepted=1; _gid=GA1.2.432637674.1599313794; _gat_gtag_UA_47951715_31=1',
'origin: https://www.urlvoid.com',
'referer: https://www.urlvoid.com/'));
 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'site=http://'.$trim.'&go='); 
$page = curl_exec($ch);
curl_close($ch);
ob_flush();
if(strpos($page, "Detected")){$url="$redirectUrlIfFlag";}
else{$url = $input;break;}}
header("Location: $url");
?>