<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

  //configfile includes all other neccesarry files like mysqlconnect, tools, global config
  include("inc.config.php");
  // includes class to generate formular


?>

<html>
 <head>
  <meta http-equiv="refresh" content="10; URL=album_cam.php?nocount=true">
 </head>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">

 <!-- init Script for cheking Formularinput -->

 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100% cellspacing=5 cellpadding=0 border=0>
   <tr height=30 >
    <td align=right class=headln></td>
   </tr>
   <tr height=50><td align=center class=text>&nbsp;</td></tr>
   <tr><td align=center>
    <span class=text><img src='../private/webcam.jpg' width=320 height=240 border=1></span>
   </td></tr>
   <tr height=50>
    <td align=center class=text>
      </td></tr>
  </table>
 </body>
</html>