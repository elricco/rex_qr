<?php

$addonname = 'rex_qr';

$error = '';

$dest_dir = $REX['MEDIAFOLDER'] . '/addons/' . $addonname;
$start_dir = $REX['MEDIAFOLDER'] . '/addons';

  if (is_dir($start_dir))
  {
    if(!mkdir($dest_dir))
    {
      $error = 'Verzeichnis konnte nicht erstellt werden';
    }
  }
  else
  {
    if(!mkdir($start_dir) || !mkdir($dest_dir))
    {
      $error = 'Verzeichnis konnte nicht erstellt werden';
    }
  }

if ($error != '')
{
  $REX['ADDON']['installmsg'][$addonname] = $error;
  $REX['ADDON']['install'][$addonname] = false;
}
else
{
  $REX['ADDON']['install'][$addonname] = true;
}
?>