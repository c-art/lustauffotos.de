<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

  //configfile includes all other neccesarry files like mysqlconnect, tools, global config
  include("inc.config.php");
  // includes class to generate formular

?>

<html>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">

 <!-- init Script for cheking Formularinput -->
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100% cellspacing=5 cellpadding=0 border=0>
   <tr height=30 >
    <td align=right class=headln>TobiCam</td>
   </tr>
    <!-- Mein aktueller Status:  <img src="http://jabber.fsinf.de/webmessage/status/status.php?jid=ted@jabber.fsinf.de&img=gabber" /><br><br>  <br>-->
  <tr>
    <form method="get" action="send.php">
    <input type="hidden" name="to" value="ted@jabber.fsinf.de" />
    <input type="hidden" name="go" value="album_confirm.php?typ=msg" />
    <td align=center>
     <table bgcolor=#dddddd class=tableborder>
      <tr>
       <td class=textbold>Schick' mir 'ne Message:&nbsp;<input type="text" name="message" size=50 /></td>
       <td class=textbold>von:</span>&nbsp;<input type="text" name="name" value="" /></td>
       <td><input type="submit" value="senden" /></td>
      </tr>
     <table>
    </form>
   </td></tr>
   <tr height=10 >
    <td align=center class=headln><a href=site.php?cat=173&str=1&aufl=100&catname=BestOfTobiCam class=link target=main>|&nbsp;Best of TobiCam&nbsp;|</a></td>
   </tr>
  </table>
 </body>
</html>