<?php

//Get QR-Code and save it
if(!function_exists("rex_qr_getCode")) {
  function rex_qr_getCode($artId,$artlang) {
    global $REX;
    $mypage = "rex_qr";
    $encodedUrl = utf8_encode(rex_getUrl($artId,$artlang));
    $contents= file_get_contents('http://chart.apis.google.com/chart?chs=500x500&cht=qr&chl='.$encodedUrl);
	$savefile = fopen($REX['MEDIAFOLDER']."/addons/".$mypage."/codes/rex_qr_".$artId."_".$artLang.".png", "w");
    fwrite($savefile, $contents);
    fclose($savefile);
  }
}

?>