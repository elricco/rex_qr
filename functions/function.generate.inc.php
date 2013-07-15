<?php

//Get QR-Code and save it
if(!function_exists("rex_qr_getCode")) {
  function rex_qr_getCode($artId,$artlang) {
    global $REX;
    $mypage = "rex_qr";
    $encodedUrl = utf8_encode(rex_getUrl($artId,$artlang));
    $contents= file_get_contents('http://chart.apis.google.com/chart?chs=500x500&cht=qr&chl='.$encodedUrl.'&choe=UTF-8&chld=L');
	  $savefile = fopen($REX['MEDIAFOLDER']."/addons/".$mypage."/codes/rex_qr_".$artId."_".$artLang.".png", "w");
    fwrite($savefile, $contents);
    fclose($savefile);
  }
}

rex_register_extension('ART_META_FORM', 'generateBackendCode');  

if(!function_exists("generateBackendCode")) {
	function generateBackendCode($params) {
		global $REX;
		
		//Get params
		$message = $params['subject'];
		$articleID = (int) $params['id'];
		$clangID = (int) $params['clang'];
		$artName = $params['name'];
		$article = $params['article'];
		
		//Check if file exists
		if(!file_exists('../files/addons/rex_qr/rex_qr-'.$articleID.'-'.$clangID.'.png'))
		{
			$qrcode = new rex_qr;
			$qrcode->artId = $articleID;
			$qrcode->artLang = $clangID;
			$qrcode->getCode();
		}
		
		//Output backend integration
		if($REX['REDAXO'])
		{
			$message .= '<div class="rex-form-row">';
			$message .= '	<table>';
			$message .= '		<tr>';
			$message .= '			<td width="145"> </td>';
			$message .= '			<td width="100">';
			$message .= '				<img src="../files/addons/rex_qr/rex_qr-'.$articleID.'-'.$clangID.'.png" width="50" height="50" />';
			$message .= '			</td>';
			$message .= '			<td>';
			//$message .= '</div>';
			//$message .= '<div class="rex-form-row">';
			$message .= '	<p class="rex-form-col-a rex-form-submit">';
			$message .= '		<input class="rex-form-submit" type="button" value="QR-Code herunterladen" target="_blank" onclick="location.href=\'../files/addons/rex_qr/rex_qr-'.$articleID.'-'.$clangID.'.png\';">';
			$message .= '		<input class="rex-form-submit" type="button" value="QR-Code neu generieren" target="_blank" onclick="location.href=\'../files/addons/rex_qr/rex_qr-'.$articleID.'-'.$clangID.'.png\';">';
			//$message .= '		<input class="rex-form-submit" type="button" value="QR-Code herunterladen" target="_blank" onclick="newWindow(\'QR Code '.$artName.'\',\'../files/addons/rex_qr/rex_qr-'.$articleID.'-'.$clangID.'.png\',\'550\',\'550\',\'content\');return false;">';
			$message .= '	</p>';
			$message .= '</td></tr></table>';
			$message .= '</div>';
		}

    	return $message;
	}
}

?>