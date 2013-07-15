<?php
// ANlegen einiger Variablen
$Basedir = dirname(__FILE__);
$page = rex_request('page', 'string');
$subpage = rex_request('subpage', 'string');
$func = rex_request('func', 'string');

// Seitenheader von REDAXO includen
include $REX['INCLUDE_PATH'].'/layout/top.php';

// Submenue erzeugen
$subpages = array(
	array('start',$I18N->msg('rex_qr_menu_info')),
	array('settings',$I18N->msg('rex_qr_menu_settings'))
);

rex_title($I18N->msg('rex_qr_title'), $subpages);

// Laden der jeweiligen Menueseite
switch($subpage) {
	case "settings":
		require $Basedir .'/settings.inc.php';
		break;
	
	default:
		require $Basedir .'/start.inc.php';
}

// Seitenfooter von REDAXO includen
include $REX['INCLUDE_PATH'].'/layout/bottom.php';
?>