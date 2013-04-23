<?php
echo '<strong>Modulausgabe</strong><br /><br />';
if(OOAddon::isAvailable("textile"))
{
  if(file_get_contents($REX['INCLUDE_PATH'].'/addons/rex_qr/modul_output.txt'))
  {
  	$motxt = file_get_contents($REX['INCLUDE_PATH'].'/addons/rex_qr/modul_output.txt');
    $textile = htmlspecialchars_decode($motxt, ENT_QUOTES);
    echo '<pre><code>'.rex_a79_textile($textile).'</code></pre>';

    // options:
    // rex_a79_textile($textile, true)             -> Textile restricted mode
    // rex_a79_textile($textile, false, 'html5') -> doctype html5
  }
}
else
{
  echo rex_warning('Dieses Modul ben&ouml;tigt das "textile" Addon!');
}
?>