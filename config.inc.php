<?php
$mypage = 'rex_qr';
$myroot = $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/';

$I18N_rex_qr = new i18n($REX['LANG'], $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/lang/');
$REX['ADDON']['rxid'][$mypage] = 'rex_qr';
$REX['ADDON']['page'][$mypage] = $mypage;
$REX['ADDON']['name'][$mypage] = 'QR-Generator';
$REX['ADDON']['supportpage'][$mypage] = 'wwww.to.com.e';
$REX['ADDON']['perm'][$mypage] = $mypage.'[]';
$REX['PERM'][] = $mypage.'[]';
$REX['ADDON']['version'][$mypage] = '0.1.0';
$REX['ADDON']['author'][$mypage] = 'Tim Filler';

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
}
  
  $pattern = $myroot.'classes/class.*.php';
  $include_files = glob($pattern);

  if(is_array($include_files) && count($include_files) > 0){
     foreach ($include_files as $include)
     {
       require_once $include;
     }
  }
  


?>