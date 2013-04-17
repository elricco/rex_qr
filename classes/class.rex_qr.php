<?php

class rex_qr {
  
  //needed Variables
  var $artId;
  var $artLang;
  
  function getCode() {
    global $REX;
    $mypage = "rex_qr";
    $encodedUrl = utf8_encode(rex_getUrl($this->artId,$this->artLang))
    $contents= file_get_contents('http://chart.apis.google.com/chart?chs=500x500&cht=qr&chl='.$encodedUrl);
	$savefile = fopen($REX['MEDIAFOLDER']."/addons/".$mypage."/rex_qr_".$this->artId."_".$this->artLang.".png", "w");
    fwrite($savefile, $contents);
    fclose($savefile);
  }
}

?>