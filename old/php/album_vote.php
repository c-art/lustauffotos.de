<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

 include("inc.config.php");

 $column=mysql_fetch_columnname($mysql_tbpic,$connr);

 if (!stristr($sess_vote,"$picnr;") && !stristr($cook_vote,"$picnr;")) {
  $query="UPDATE $mysql_tbpic SET ".$column['votes']."=".$column['votes']."+'1', ".$column['vote']."=".$column['vote']."+'$vote' WHERE ".$column['nr']."='$picnr'";
  $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
  $toe_text=$lng_votenew;
  $sess_vote="$cook_vote $picnr;";
  setcookie("cook_vote",$sess_vote,time()*2,"/");
  }
 else {
  $toe_text=$lng_votealready;
 }

 //statistic($cfg_sitename, "Voting", $cook_userid, "visit", $connr);

?>

<html>
 <head>
  <title>Bild bewerten</title>
 </head>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody  onBlur='window.close()'>
  <table width=100% height=100% cellspacing=0 cellpadding=0 border=0>
   <?php echo"<tr><td align=center class=text>$toe_text</td></tr>"; ?>
   <tr><td align=center><a href='javascript:window.close();' class=menulink>Fenster schliessen</a></td></tr>
  </table>
 </body>
</html>