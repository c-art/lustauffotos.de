<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

  //configfile includes all other neccesarry files like mysqlconnect, tools, global config
  include("inc.config.php");
  // includes class to generate formular
  include("$libarypath/class.multiadmin.php");
   //where to go after saving
  $url="album_confirm.php?typ=pic";


//*************************  generate Form ******************************
  $entry =new multiadmin();      //init class
  $entry->tabname=$mysql_tbpicsend;   //tabname in wchi data should stored
  $entry->mode="new";            //ne data = empty formular
  $entry->tabvis=0;              //0= only columns with no limits are visible;  1=restricted visible;
  $entry->rowreq=1;              //how many formulars
  $entry->connr=$connr;          //connection number to database
  $entry->getTabData();          //get alle Formular data in Arrays

  for($i = 0; $i<$entry->rowanz; $i++){ //for every anz Formulars
   for($k = 0; $k<$entry->columnanz; $k++){ //for every Column
    if ($entry->columnheadln[$k]!="" && $entry->rowcontent[$i][$k]!="" && (!$entry->columnvis[$k] || ($entry->columnvis[$k]==5 && $entry->tabvis))) {
      $toe_form.="<tr><td class=textbold>".$entry->columnheadln[$k]."</td><td valign=middle nowrap>&nbsp;".$entry->rowcontent[$i][$k]."</td></tr>\n";
     }
     else
      $toe_form.=$entry->rowcontent[$i][$k];
    }
  }

?>

<html>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">
 <!-- init Script for cheking Formularinput -->
 <?php echo $entry->init_checkinput(); ?>
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody >
  <table width=100% cellspacing=0 cellpadding=0 border=0>
   <tr height=30>
    <td align=right class=headln>Bild hochladen</td>
   </tr>
   <tr class=rowbglight>
    <td align=center><br>
     <table cellpadding=0 cellspacing=0><tr><td class=text>
    Hast du auch ein schönes Bild?<br>
Dann lade es hier hoch! Bitte achte dabei drauf, dass das Bild <br>
vom Format JPEG (*.jpg) oder GIF (*.gif) sein muss. Das Bild<br>
sollte nicht höhe als 300Pixel und grösser als 300kb sein.<br>
Schreibe bitte auch noch einen kurzen Text, sowie Suchbegriffe hinzu.<br><br>(die Felder mit * bitte ausgefüllen)<br><br>
     </td></tr></table>
    </td>
   </tr>
   <tr><td align=center>
    <form action=sql.php method=post enctype="multipart/form-data" onsubmit="return checkInput(0)">
     <?php echo"
     <input type=hidden name=MAX_FILE_SIZE value=\"300000\">
     <input type=hidden name=tabname value=\"".$entry->tabname."\">
     <input type=hidden name=connr value=\"$connr\">
     <input type=hidden name=url value=\"$url\">
     <input type=hidden name=mode value=\"".$entry->mode."\">
     <input type=hidden name=PHPSESSID value=\"$PHPSESSID\">

     <input type=hidden name=to_mail value=\"$cfg_picsendto\">
     <input type=hidden name=mailfrom value=\"newpic@lustauffotos.de\">
     <input type=hidden name=mailmode value=\"email\">
     <input type=hidden name=mailfields value=\"1\">
     <input type=hidden name=mailsubject value=\"Es wurde ein Bild hochgeladen\">
     <input type=hidden name=mailtextbefore value=\"Es wurde ein Bild hochgeladen von:\n\">
     <input type=hidden name=mailtextafter value=\"\">"; ?>
     <table cellpadding=0 cellspacing=0 border=0 class=tableborder><tr><td>
      <table cellspacing=5 cellpadding=0 border=0>
       <tr><td class=textbold>Bild:</td><td>&nbsp;<input type=file name=picdata maxlength=300000 accept="image/*"></td></tr>
        <?php echo"$toe_form"; ?>
       <tr><td align=center colspan=2><input type=submit value='Absenden'></td></tr>
      </table>
     </td></tr></table>
    </form>
   </td></tr>
  </table>
 </body>
</html>
