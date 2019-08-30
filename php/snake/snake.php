<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

 $libarypath="../../../_libary";
 include("../inc.config.php");

//countup("Lustauffotos.de Snake",$mysql_tbstat,$connr);
?>

<html>
 <script language="JavaScript" src="../norclick.js"></script>
 <link rel=stylesheet type="text/css" href="../style.css">
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100%>
   <tr height=50><td align=center class=textbold>Just play SNAKE!!!!</td></tr>
   <tr><td align=center>&nbsp;</td></tr>
   <tr><td align=center class=text>(Benutze die Pfeiltasten zur Steuerung)</td></tr>
   <tr><td align=center><applet name=a1 Code="snake.class" width=330 height=210></applet></td></tr>
  </table>
 </body>
</html>
