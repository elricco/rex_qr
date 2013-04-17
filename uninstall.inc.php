<?php
$addonname = 'rex_qr';
$dest_dir = $REX['MEDIAFOLDER'] . '/addons/' . $addonname;

rmdir($dest_dir);

$REX["ADDON"]["install"]["rex_qr"] = 0;
// Install-Status wird von 0 auf 1 geändert
?>