<?php
/**
 * Lˆscht einen Ordner/Datei mit Unterordnern
 *
 * @param $file Zu lˆschender Ordner/Datei
 * @param $delete_folders Ordner auch lˆschen? false => nein, true => ja
 * 
 * @return TRUE bei Erfolg, sonst FALSE
 */
if(!function_exists("rex_deleteQRDir")) {
function rex_deleteQRDir($file, $delete_folders = FALSE)
{
  $debug = FALSE;
  $state = TRUE;
  
  $file = rtrim($file, DIRECTORY_SEPARATOR);

  if (file_exists($file))
  {
    // Fehler unterdr¸cken, falls keine Berechtigung
    if (@ is_dir($file))
    {
      $handle = opendir($file);
      if (!$handle)
      {
        if($debug)
          echo "Unable to open dir '$file'<br />\n";
          
        return FALSE;
      }

      while ($filename = readdir($handle))
      {
        if ($filename == '.' || $filename == '..')
        {
          continue;
        }

        if (!rex_deleteQRDir($file.DIRECTORY_SEPARATOR.$filename, $delete_folders))
        {
          $state = FALSE;
        }
      }
      closedir($handle);

      if ($state !== TRUE)
      {
        return FALSE;
      }
      

      // Ordner auch lˆschen?
      if ($delete_folders)
      {
        // Fehler unterdr¸cken, falls keine Berechtigung
        if (!@ rmdir($file))
        {
          if($debug)
            echo "Unable to delete folder '$file'<br />\n";
            
          return FALSE;
        }
      }
    }
    else
    {
      // Datei lˆschen
      // Fehler unterdr¸cken, falls keine Berechtigung
      if (!@ unlink($file))
      {
        if($debug)
          echo "Unable to delete file '$file'<br />\n";
            
        return FALSE;
      }
    }
  }
  else
  {
    if($debug)
      echo "file '$file'not found!<br />\n";
    // Datei/Ordner existiert nicht
    return FALSE;
  }

  return TRUE;
}
}

if(!function_exists("rex_deleteQRcache"))
{
  function rex_deleteQRcache ()
  {
    $rdir .= realpath('./../files/addons/rex_qr');
    //For testing purposes
    //(echo "<p>Full path to this realdir: " . $rdir . "</p>";
    return rex_deleteQRDir($rdir,false);
  }
}

if(!function_exists("rex_deleteQRfile"))
{
  function rex_deleteQRfile ($file)
  {
    $rdir .= realpath('./../files/addons/rex_qr');
    rex_deleteQRDir($rdir.'/'.$file,false);
  }
}

?>