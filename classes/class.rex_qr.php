<?php

class rex_qr {
  
  //needed Variables
  var $artId;
  var $artLang;
  
  public function getCode() {
    global $REX;
    //$mypage = "rex_qr";
    $rexurl = $REX['SERVER'].rex_getUrl($this->artId,$this->artLang);
    $encodedUrl = utf8_encode($rexurl);
    $contents= file_get_contents('http://chart.apis.google.com/chart?chs=500x500&cht=qr&chl='.$encodedUrl);
	  $savefile = fopen($REX['MEDIAFOLDER']."/addons/rex_qr/rex_qr-".$this->artId."-".$this->artLang.".png", "w");
    fwrite($savefile, $contents);
    fclose($savefile);
  }
}

?>