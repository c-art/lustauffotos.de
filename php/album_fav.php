<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

 include("inc.config.php");

 $column=mysql_fetch_columnname($mysql_tbfav,$connr);

 if ($sess_userid) $userid=$sess_userid;

 if ($userid) {
   $sess_userid=$userid;
   if (!stristr($sess_fav,"$picnr;") && !stristr($cook_fav,"$picnr;")) {
   $query="INSERT INTO $mysql_tbfav SET ".$column['picnr']."='$picnr', ".$column['blt']."='".time()."', ".$column['owner']."='$userid'";
   $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
   $toe_text=$lng_favnew;
   $sess_fav="$cook_fav $picnr;";
   setcookie("cook_fav",$sess_fav,time()*2,"/");
   }
  else {
   $toe_text=$lng_favalready;
  }
 }
 else {
  $winresize="<script language=\"JavaScript\">\n window.resizeTo(490,270);\n self.focus();\n</script>";
  $toe_text="$lng_favnocookie<br>
  <form action=album_fav.php>
   <input type=hidden name=PHPSESSID value=\"$PHPSESSID\">
   <input type=hidden name=picnr value=\"$picnr\">
   <table cellpadding=0 cellspacing=0 border=0 class=tableborder><tr><td>
    <table cellspacing=5 cellpadding=0 border=0>
     <tr><td class=textbold>Email:</td><td>&nbsp;<input name=userid size=15></td></tr>
     <tr><td align=center colspan=2><input type=submit value='Absenden'></td></tr>
    </table>
   </td></tr></table>
  </form>";
 }

 statistic($cfg_sitename, "Favorites Add", $cook_userid, "visit", $connr);

?>

<html>
 <head>
  <title>Bild zu Favoriten hinzufügen</title>
 </head>
 <script language="JavaScript" src="norclick.js"></script>
  <?php echo $winresize; ?>
 <link rel=stylesheet type="text/css" href="style.css">
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100% height=100% cellspacing=0 cellpadding=0 border=0>
   <?php echo"<tr><td align=center class=text>$toe_text</td></tr>"; ?>
   <tr><td align=center><a href='javascript:window.close();' class=menulink>Fenster schliessen</a></td></tr>
  </table>
 </body>
</html>