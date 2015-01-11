<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

 include("inc.config.php");

statistic($cfg_sitename, "Impressum", $cook_userid, "visit", $connr);
?>

<html>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100% cellspacing=5 cellpadding=0 border=0>
   <tr height=30 >
    <td align=right class=headln>Impressum</td>
   </tr>
   <tr><td align=center class=text>Diese Seite wurde erstellt von </td></tr>
   <tr><td align=center><img src=../img/c-artlogo.jpg border=1></td></tr>
   <tr><td align=center class=text><a href=mailto:t.bielohlawek@c-art-web.de class=link>- Tobias Bielohlawek 2001 -</a>
  <a href="http://spotlight.de/ms/ted3/home.html" target="Ms" onClick="window.open('','Ms','resizable,width=300,height=500')"><img border=0 src="http://spotlight.de/pic/icons/vcard.gif"></a>
</td></tr>
   <tr height=30><td align=center class=text></td></tr>
   <tr><td align=center class=text>
   Lustauffotos.de basiert komplett auf <b>MultiAdmin</b>. So ist es möglich die Fotos, Kategorien, Ecards,<br>
   Favoriten und Gästebuch Einträge schnell und einfach zu verwalten.<br>
   Weitere Informationen zu <b>MultiAdmin</b> finden Sie unter <a href="http://www.multiadmin.de/index.php?id=lustauffotos.de-impressum" class=link target=_blank><b>www.multiadmin.de</b></a> oder sprechen Sie uns an, <br>
   wir beraten Sie gerne: <a href=mailto:c-art@web.de class=link>c-art@web.de</a>&nbsp;<a href="http://www.c-art-web.de/index.php?id=lustauffotos.de-impressum" class=link target=_blank>(www.c-art-web.de)</a></td></tr>
   <tr height=80><td align=center class=text>
     <a href="tetris/tetris.php" class=link>Play Tetris!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <a href="snake/snake.php" class=link>Play Snake!</a>
   </td></tr>
   <tr height=80><td align=center class=text><a href="werbung.html" class=link>Werbung</a></td></tr>
   <tr><td align=center class=text>Lustauffotos.de wurde mit folgenden Awards ausgezeichnet:<br>
    <table cellspacing=5 cellpadding=10 border=0>
     <tr>
      <td class=text valign=top align=center>vorgestellt bei Giga <br>im Dez. 99 von Sumitra<br><img src=../img/giga.gif border=1></td>
      <td class=text valign=top align=center>Homp@geaward 01/00<br><img src=../img/hpaward.gif></td>
      <td class=text valign=top align=center> Monatssieger 02/00<br> Internet Magazin<br><img src=../img/imag.gif border=1></td>
     </tr>
    </table>
   </td></tr>
   <tr><td align=center class=text>Vielen Dank an Anna, Steffen, BJ, Manu, Max, Jan, Martin...<br>...und allen anderen die ich vergessen habe!</td></tr>
  </table>
 </body>
</html>