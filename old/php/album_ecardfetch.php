<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

  //configfile includes all other neccesarry files like mysqlconnect, tools, global config
  include("inc.config.php");
  // includes class to generate formular
  include("$libarypath/class.multiadmin.php");
   //where to go after saving

  if (!$aufl) $aufl=($sess_aufl<1) ? $cfg_aufl : $sess_aufl;

  $toe_entry2="<table cellpadding=0 cellspacing=0 border=0 class=tableborder><tr><td>
                <table cellspacing=5 cellpadding=0 border=0>
                 <tr><td class=textbold>EcardKey:</td><td>&nbsp;<input name=userkey></td></tr>
                 <tr><td align=center colspan=2><input type=submit value='Absenden'></td></tr>
                </table>
               </td></tr></table>";

 $toe_text=$lng_ecardstart;

 if ($userkey!="") {
 //**************** GB DATA  ***********************************
  $column=mysql_fetch_columnname($mysql_tbecard,$connr);
  //where to go after saving
  $cfg_entry_chranz=0;
  $data = new multiadmin();
  $data->tabname=$mysql_tbecard;
  $data->mode="raw";              //show = list a table
  $data->where="WHERE ".$column['key']."='$userkey'";                 //show all
  $data->order="";                 //no order
  $data->tabvis=0;                 //0= only columns with no limits are visible;  1=restricted visible;
  $data->rowreq=100;               //how many entrys
  $data->rowstr=0;                 //entry to start at
  $data->connr=$connr;             //connection number to database
  $data->getTabData();             //get alle Formular data in Arrays

  $query="UPDATE ".$data->tabname." SET ".$column['fetch']."='viewed' ".$data->where;
  $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));

  // eval data (non dynamic)
   for($i = 0; $i<$data->rowanz; $i++){
    $toe_entry2="";
    $toe_text=$lng_ecardfetch;
    @$size = GetImageSize ($cfg_picpath."/".stripslashes($data->rowcontent[$i][2]));
    $picwidth= round($cfg_aufl_fakt[$aufl] * $size[0]);
    $picheight= round($cfg_aufl_fakt[$aufl] *  $size[1]);
    $toe_entry.="
     <table cellpadding=0 cellspacing=0 border=0 class=tableborder><tr><td>
      <table cellspacing=5 cellpadding=0 border=0>
       <tr><td align=center><img src=\"".$cfg_picpath."/".stripslashes($data->rowcontent[$i][2])."\" border=0 width=$picwidth height=$picheight galleryimg=no></td></tr>
       <tr><td class=textsmall valign=middle nowrap>$info</td></tr>\n
       <tr><td class=text align=center nowrap>".nl2br($data->rowcontent[$i][7])."</td></tr>
       <tr><td class=text valign=middle nowrap>von ".$data->rowcontent[$i][5]." am ".date("j.n.Y",$data->rowcontent[$i][9])." um ".date("H:i ",$data->rowcontent[$i][9])." Uhr geschickt</td></tr>
      </table>
     </td></tr></table>";
     }
  // end eval data
  if ($toe_entry=="") $toe_entry="Es wurde keine passende Ecard zu deinem Ecardkey gefunden. <br><br>Hast du dich auch nicht vertippt?<br><br>";
 }

?>

<html>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">
 <!-- init Script for cheking Formularinput -->
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100% cellspacing=5 cellpadding=0 border=0>
   <tr height=30 >
    <td align=right class=headln>Ecard abholen</td>
   </tr>
   <tr height=50><td align=center class=text></td></tr>
   <tr><td align=center class=text>
     <?php echo"$toe_text"; ?>
   </td></tr>
   <tr height=30><td align=center class=headln>Deine Ecard:</td></tr>
   <tr height=50><td align=center class=text>
    <form action=album_ecardfetch.php>
    <?php echo"<input type=hidden name=PHPSESSID value=\"$PHPSESSID\">";  ?>
    <?php echo"$toe_entry $toe_entry2"; ?>
    </form>
   </td></tr>
  </table>
 </body>
</html>