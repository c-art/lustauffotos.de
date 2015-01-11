<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)    */

  /* **************** Script to generate a Formular ******************** */

  //configfile includes all other neccesarry files like mysqlconnect, tools, global config
  include("inc.config.php");
  // includes class to generate formular
  include("$libarypath/class.multiadmin.php");
   //where to go after saving
  $url="album_confirm.php?typ=gb";


//*************************  generate Form ******************************
  $entry = new multiadmin();      //init class
  $entry->tabname = $mysql_tbgb;   //tabname in wchi data should stored
  $entry->mode = "new";            //ne data = empty formular
  $entry->tabvis = 0;              //0= only columns with no limits are visible;  1=restricted visible;
  $entry->rowreq = 1;              //how many formulars
  $entry->connr = $connr;          //connection number to database
  $entry->getTabData();          //get alle Formular data in Arrays

  for($i = 0; $i<$entry->rowanz; $i++){ //for every anz Formulars
   for($k = 0; $k<$entry->columnanz; $k++){ //for every Column
    if ($entry->columnheadln[$k]!="" && $entry->rowcontent[$i][$k]!="" && (!$entry->columnvis[$k] || ($entry->columnvis[$k]==5 && $entry->tabvis))) {
      $toe_form.="<tr><td class=textbold>".$entry->columnheadln[$k]."</td><td nowrap>&nbsp;".$entry->rowcontent[$i][$k]."</td></tr>\n";
     }
     else
      $toe_form.=$entry->rowcontent[$i][$k];
    }
  }

//**************** GB DATA  ***********************************
  $column = mysql_fetch_columnname($mysql_tbgb,$connr);
  //where to go after saving
  $cfg_entry_chranz=0;
  $data = new multiadmin();
  $data->tabname = $mysql_tbgb;
  $data->mode = "raw";              //show = list a table
  $data->where = "";                 //show all
  $data->order  ="ORDER BY ".$column['blt']." DESC";                 //no order
  $data->tabvis = 0;                 //0= only columns with no limits are visible;  1=restricted visible;
  $data->rowreq = 100;               //how many entrys
  $data->rowstr = 0;                 //entry to start at
  $data->connr = $connr;             //connection number to database
  $data->getTabData();             //get alle Formular data in Arrays

  // eval data (non dynamic)
   for($i = 0; $i<$data->rowanz; $i++){
    $info="";
    if ($data->rowcontent[$i][2]) $info .= "&nbsp;Email:&nbsp;<a href=mailto:".$data->rowcontent[$i][2]." class=linksmall>".$data->rowcontent[$i][2]."</a>&nbsp;|";
    if ($data->rowcontent[$i][3] != "") $info .= "&nbsp;URL:&nbsp;<a href=\"http://".str_replace("http://", "", $data->rowcontent[$i][3])."\" target=_blank class=linksmall>".$data->rowcontent[$i][3]."</a>&nbsp;|&nbsp;";
    if ($data->rowcontent[$i][5]) $info .= "&nbsp;eingetragen: &nbsp; am ".date("j.n.Y",$data->rowcontent[$i][5])." um ".date("H:i ",$data->rowcontent[$i][5])." Uhr";
    $toe_entry.="
     <tr><td align=center>
     <table width=70%>
     <tr><td class=textbold valign=middle nowrap>".$data->rowcontent[$i][1]."</td></tr>
     <tr><td class=text valign=middle nowrap>$info</td></tr>\n
     <tr><td class=text valign=middle>".nl2br($data->rowcontent[$i][4])."</td></tr>
     <tr height=30><td align=center><hr noshade width=400 color=$bgc_headln></td></tr>
     </table>
     </td></tr>";
     }
  // end eval data

 statistic($cfg_sitename, "Guestbook", $cook_userid, "visit", $connr);

 mysql_close($mysql_nr[$connr]);

?>

<html>
 <script language="JavaScript" src="norclick.js2"></script>
 <link rel=stylesheet type="text/css" href="style.css">
 <!-- init Script for cheking Formularinput -->
 <?php echo $entry->init_checkinput(); ?>
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100% border=0>
   <tr height=30>
    <td align=right class=headln>Gästebuch</td>
   </tr>
   <tr class=rowbglight>
    <td align=center><br>
     <table cellpadding=0 cellspacing=0><tr><td class=text>
     Was wäre eine Website ohne Gästebuch!<br>
     Scheibt einfach was euch einfällt Kritik, Lob usw., habt es ja beim letzten schon gut gemacht!
     <br><br>(die Felder mit * bitte ausgefüllen)<br><br>
     </td></tr></table>
    </td>
   </tr>
   <tr class=rowbglight>
    <td class=text align=center><br>

   <!-- Form starts here -->
     <table cellpadding=0 cellspacing=0 border=0 class=tableborder><tr><td>
      <table cellspacing=5 cellpadding=0 border=0>
       <form action=sql.php onsubmit="return checkInput(0)">
        <?php
         //Output Variables
        echo"<input type=hidden name=tabname value=\"".$entry->tabname."\">
             <input type=hidden name=connr value=\"$connr\">
             <input type=hidden name=url value=\"$url\">
             <input type=hidden name=mode value=\"".$entry->mode."\">

             <input type=hidden name=to_mail value=\"$cfg_gbsendto\">
             <input type=hidden name=mailfrom value=\"guestbook@lustauffotos.de\">
             <input type=hidden name=mailmode value=\"email\">
             <input type=hidden name=mailfields value=\"1\">
             <input type=hidden name=mailsubject value=\"Es wurde ins Gästebuch eingetragen\">
             <input type=hidden name=mailtextbefore value=\"Es wurde ins Gästebuch eingetragen von:\n\">
             <input type=hidden name=mailtextafter value=\"\">
             $toe_form";
         ?>
        <tr class=rowbglight><td colspan=2 align=center><input type=submit value=Absenden></td></tr>
       </form>
      </table></td></tr>
     </table>
    </td>
   </tr>
   <tr height=30><td align=right class=headln>&nbsp;</td></tr>
   <tr>
    <td class=text align=center>
  <!-- Data starts here -->
     <table border=0>
       <?php
        //Output Variables
       echo $toe_entry;
        ?>
     </table>
    </td>
   </tr>
  </table>
 </body>
</html>