<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)    */

  /* **************** Script to generate a Formular ******************** */

  //configfile includes all other neccesarry files like mysqlconnect, tools, global config
  include("inc.config.php");
  // includes class to generate formular
  include("$libarypath/class.multiadmin.php");
   //where to go after saving
  $url="album_confirm.php?typ=ecard";

  $togo= ($mode=="") ? "album_ecard.php" : "sql.php";
  $mode= ($mode=="") ? "new" : "preview";

  $toe_ecardtext=($mode=="new") ? $lng_ecardtext : $lng_ecardtextpre;

  $picpfad=stripslashes($picpfad);
  if ($key=="") $key="e".time();

//*************************  generate Form ******************************
  $entry =new multiadmin();      //init class
  $entry->tabname=$mysql_tbecard;   //tabname in wchi data should stored
  $entry->mode=$mode;            //ne data = empty formular
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


 if ($mode=="preview") $toe_button="<input type=button value=Zurück onclick=\"document.forms[0].mode.value=''; document.forms[0].action='album_ecard.php'; document.forms[0].submit();\">&nbsp;&nbsp;&nbsp;";

 //statistic($cfg_sitename, "Ecard send", $cook_userid, "visit", $connr);

 mysql_close($mysql_nr[$connr]);
?>

<html>
 <head>
  <META HTTP-EQUIV="imagetoolbar" CONTENT="no">
 </head>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">
 <!-- init Script for cheking Formularinput -->
 <?php echo $entry->init_checkinput().init_openwindow(); ?>

  <script language='Javascript'>
     function checkLocal(form) {
      for (k=0; k<document.forms[form].length; k++) {
       fieldname=document.forms[form].elements[k].name;
       if ((fieldname.indexOf('email')>0) && (document.forms[form].elements[k].value.indexOf('sagmal') > 0 && (document.forms[form].elements[k].type != 'hidden'))) {
        check=alert('Ecards an die Emailadresse sind nicht erlaubt');
         document.forms[form].elements[k].focus();
         return false;
       }
      }
     return true;
    }
</script>


 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100%>
   <tr height=30>
    <td align=right class=headln>Bild als Ecard versenden</td>
   </tr>
   <tr class=rowbglight>
    <td align=center><br>
     <table cellpadding=0 cellspacing=0><tr><td class=text>
      <?php echo $toe_ecardtext ?>
     </td></tr></table>
    </td>
   </tr>
   <tr class=rowbglight>
    <td class=text align=center><br>

   <!-- Form starts here -->
     <table cellpadding=0 cellspacing=0 border=0 class=tableborder><tr><td>
      <table cellspacing=5 cellpadding=0 border=0>
 <?php
      //Output Variables
       echo"<form action=$togo onsubmit=\"return (checkInput(0) && checkLocal(0))\">
             <input type=hidden name=tabname value=\"$entry->tabname\">
             <input type=hidden name=connr value=\"$connr\">
             <input type=hidden name=url value=\"$url\">
             <input type=hidden name=mode value=\"".$entry->mode."\">
             <input type=hidden name=PHPSESSID value=\"$PHPSESSID\">
             <input type=hidden name=key value=\"$key\">

             <input type=hidden name=to_mail value=\"self\">
             <input type=hidden name=mailfrom value=\"ecard@lustauffotos.de\">
             <input type=hidden name=mailmode value=\"email\">
             <input type=hidden name=mailfields value=\"1\">
             <input type=hidden name=mailsubject value=\"Du hast eine Ecard bekommen\">
             <input type=hidden name=mailtextbefore value=\" \nDu hast eine Ecard bekommen!!!\n Um sie abzuholen, klicke auf den Folgenden Link:\n\n http://www.lustauffotos.de/index.php?ecard=$key\n\nWenn es nicht funktionieren sollte, so besuche www.lustauffotos.de und gebe unter <Ecard abholen> folgenden EcardKey ein: $key\">
             <input type=hidden name=mailtextafter value=\"\">
             $toe_form";
         ?>
        <tr class=rowbglight><td colspan=2 align=center><?php echo $toe_button; ?><input type=submit value=Absenden></td></tr>
       </form>
      </table></td></tr>
     </table>
    </td>
   </tr>
  </table>
 </body>
</html>