<?php
$mypage = 'rex_qr';
$myroot = $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/';

// AUTO INCLUDE FUNCTIONS & CLASSES
////////////////////////////////////////////////////////////////////////////////
if ($REX['REDAXO'])
{
  $pattern = $myroot.'functions/function.*.inc.php';
  $include_files = glob($pattern);
  if(is_array($include_files) && count($include_files) > 0){
     foreach ($include_files as $include)
     {
       require_once $include;
     }
  }
  if (!isset($I18N))
  {
    $I18N = new i18n($REX['LANG'],$REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/lang/');
  }
  
  // I18N, Addon-Titel für die Navigation
  if (isset($I18N) && is_object($I18N))
  {
    if ($REX['VERSION'] . $REX['SUBVERSION'] < '42')
    {
      $I18N->locale = $REX['LANG'];
      $I18N->filename = $REX['INCLUDE_PATH'] . '/addons/rex_qr/lang/'. $REX['LANG'] . ".lang";
      $I18N->loadTexts();
    }
    else
    {
      $I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/lang/');
    }  
    $REX['ADDON']['page'][$mypage] = $mypage;
    $REX['ADDON']['name'][$mypage] = $I18N->msg('rex_qr_menu_link');
  }
}
  
  $pattern = $myroot.'classes/class.*.php';
  $include_files = glob($pattern);

  if(is_array($include_files) && count($include_files) > 0){
     foreach ($include_files as $include)
     {
       require_once $include;
     }
  }
  
//$I18N_rex_qr = new i18n($REX['LANG'], $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/lang/');
$REX['ADDON']['rxid'][$mypage] = 'rex_qr';
//$REX['ADDON']['page'][$mypage] = $mypage;
//$REX['ADDON']['name'][$mypage] = 'QR-Generator';
$REX['ADDON']['supportpage'][$mypage] = 'http://www.redaxo.org/de/forum/addons-f30/rex-quick-response-qr-t19091.html';
$REX['ADDON']['perm'][$mypage] = $mypage.'[]';
$REX['PERM'][] = $mypage.'[]';
$REX['ADDON']['version'][$mypage] = '0.1.0';
$REX['ADDON']['author'][$mypage] = 'Tim Filler';

?>