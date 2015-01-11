<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)    */

  if(!$picdata) header("Location: album_confirm.php?typ=wsize");

  $picdata_suf=explode(".",$picdata_name);

  $handle=opendir("$cfg_uploadpath");
  while (false !== ($file = readdir ($handle))) {
   $picnr++;
  }
  closedir($handle);

  if (in_array($picdata_type, $cfg_allowed_filetype)) {
   //echo "$picdata, $cfg_uploadpath/bild".sprintf("%03d",$picnr).".".$picdata_suf[(count($picdata_suf)-1)];
   copy($picdata,"$cfg_uploadpath/bild".sprintf("%03d",$picnr).".".$picdata_suf[(count($picdata_suf)-1)]);
   }
  else
   echo header("Location: album_confirm.php?typ=wtyp");

 $mailtextbefore.="\n Bild: $cfg_uploadpath/bild".sprintf("%03d",$picnr).".".$picdata_suf[(count($picdata_suf)-1)]."\n ";

 countup("Lustauffotos.de Picupload",$mysql_tbstat,$connr);

?>