<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:
  // open ->

 include("inc.config.php");
?>

<html>
 <script language="JavaScript" src="norclick.js"></script>
 <script language='JavaScript'>
   function open_window(url) {
    f2=window.open(url,"window","dependent=yes,width=300,height=320,locationbar=no,menubar=no,resizable=yes,status=no,scrollbars=no");
   }
 </script>
 <link rel=stylesheet type="text/css" href="style.css">
 <body class=otherbody background="../img/bg_search.gif">

<?php
 $column1=mysql_fetch_columnname($mysql_tbkat1,$connr);
 $column2=mysql_fetch_columnname($mysql_tbkat2,$connr);
 $query="SELECT * FROM $mysql_tbkat1 WHERE (".$column1['status']."='2') ORDER BY ".$column1['nr']." ASC";
 $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));

 $k=-1;

 while ($row1 = mysql_fetch_array($res)) {
  $query="SELECT * FROM $mysql_tbkat2  WHERE ".$column2['kategorie']."='".$row1[$column1['nr']]."' && ".$column2['status']."='2' ORDER BY ".$column2['nr']."+0 ASC";
  $res2 = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
  $k++;
  while ($row2 = mysql_fetch_array($res2)) {
   if ($row2[$column2['kategorie']]!=$menu_headln) {
    $myopen="";
    for ($i=0; $i<=strlen($open);$i++) $myopen.= ($i==$k) ? ($open[$i]*-1)+1 : $open[$i];
    $arrow=($open[$k]) ? "arrowlinkdown.gif" : "arrowlink.gif";
    $toe_menu.="<tr><td class=menuheadln><img src=../img/blank.gif height=6 width=5 border=0></td></tr>\n<tr><td class=menuheadln>&nbsp;<img src=../img/$arrow><a href=album_link.php?open=$myopen&PHPSESSID=$PHPSESSID class=menuheadln>".ucfirst(stripslashes($row1[$column1['name']]))."</a></td></tr>\n";
    $menu_headln=$row2[$column2['kategorie']];
   }
   $catname=rawurlencode(addslashes(ucfirst($row1[$column1['name']])."&nbsp;-&gt;&nbsp;".ucfirst($row2[$column2['name']])));
   if ($open[$k]) $toe_menu.="<tr><td class=menulink>&nbsp;&nbsp;&nbsp;&nbsp;<a href=site.php?cat=".$row2[$column2['nr']]."&str=1&aufl=100&catname=$catname&PHPSESSID=$PHPSESSID class=menulink target=main>".ucfirst(stripslashes($row2[$column2['name']]))."</a></td></tr>\n";
  }
 }

?>
  <table width=100% height=100% cellspacing=0 cellpadding=0 border=0>
   <tr><td valign=top>
    <table width=100% cellspacing=0 cellpadding=0 border=0>
     <form action=site.php target=main>
      <input type=hidden name=aufl value=100>
      <input type=hidden name=catname value="Suche">
      <?php echo"<input type=hidden name=PHPSESSID value=$PHPSESSID>"; ?>
      <tr><td colspan=2><img src=../img/blank.gif height=6 width=5 border=0></td></tr>
      <tr><td><input name=krit size=10 onclick="this.value=''"></td><td><input type=submit value=Suchen></td></tr>
      <tr><td colspan=2><img src=../img/blank.gif height=10 width=5 border=0></td></tr>
      <tr><td colspan=2 valign=top>
       <table width=100% cellspacing=0 cellpadding=0 border=0>
        <?php echo $toe_menu; ?>
       </table>
      </td></tr>
      </form>
    </table>
   </td></tr>
   <tr><td valign=bottom align=center><a href="http://www.c-art-web.de/index.php?id=lustauffotos.de" class=alink target=_blank>(c) by C-Art Webdesign'03 - www.c-art-web.de</a></td></tr>
  </table>

 </body>
</html>