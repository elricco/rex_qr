<?php
  
  $gsize = rex_post('gsize', 'integer', '500');
  $ecache = rex_post('empty_cache', 'string', '');
  if($ecache != '')
  {
    rex_deleteQRcache();
  }

	echo '<div class="rex-addon-output">'."\n";
	echo '  <h2 class="rex-hl2">Einstellungen</h2>'."\n";
  echo '    <div id="rex-addon-editmode" class="rex-form">'."\n";
  echo '      <form action="" method="post">'."\n";
  echo '        <fieldset class="rex-form-col-1">'."/n";
  echo '					<h3 class="rex-hl3">Einstellungen Google Chart API</h3>'."\n";
  echo '	        <div class="rex-form-wrapper">'."\n";
  echo '					  <div class="rex-form-row">'."\n";
  echo '	            <p class="rex-form-col-a rex-form-text">'."\n";
  echo '	              <label for="fromname">Gr&ouml;&szlig;e (in Pixel / maximal 500)</label>'."\n";
  echo '                <input type="text" name="gsize" id="gsize" value="'.$gsize.'" />'."\n";
  echo '              </p>'."\n";
  echo '            </div>'."\n";
  echo '            <div class="rex-form-row">'."\n";
  echo '              <p class="rex-form-col-a rex-form-submit">'."\n";
  echo '                <input class="rex-form-submit" type="submit" name="btn_save" value="Speichern" />'."\n";
  echo '                <input class="rex-form-submit rex-form-submit-2" type="reset" name="btn_reset" value="Reset" onclick="return confirm(\'Reset\');"/>'."\n";
  echo '              </p>'."\n";
  echo '            </div>'."\n";
  echo '          </div>'."\n";
  echo '        </fieldset>'."\n";
  echo '      </form>'."\n";
  echo '    <div id="rex-addon-editmode" class="rex-form">'."\n";
  echo '      <form action="" method="post">'."\n";
  echo '        <fieldset class="rex-form-col-1">'."/n";
  echo '					<h3 class="rex-hl3">Cache leeren</h3>'."\n";
  echo '            <div class="rex-form-row">'."\n";
  echo '              <p class="rex-form-col-a rex-form-submit">'."\n";
  echo '                <input class="rex-form-submit" type="submit" name="empty_cache" value="Cache leeren" />'."\n";
  echo '              </p>'."\n";
  echo '            </div>'."\n";
  echo '          </div>'."\n";
  echo '        </fieldset>'."\n";
  echo '      </form>'."\n";echo 'Was kommen soll:<br />
<ul>
<li>Welchen Dienst nutzen? (Google Chart API oder interne API)</li>
<li>Maximale Größe festlegbar (Google = 500 / interne API = mehr)</li>
<li>Integration / Interaktion mit dem To-Come-AddOn rex_url_shortener</li>
</ul>';

  echo '  </div>'."\n";
  echo '</div>'."\n";
?>