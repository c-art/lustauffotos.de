<?php

   header( 'Window-target: _top');
   header( 'Location: http://lustauffotos.freeflux.net' );
   exit;
   
   /*   Copyright by C-ART WEBDESIGN '2004 - www.c-art-web.de - (c-art@web.de)    */
   if ($ecard) header("Location: album_frame.php?ecard=$ecard");
   
   include( 'design.header.php' );
?>

 <body bgcolor="#FFFFFF">
  <br>
  <table border=0 width="100%">
   <tr><td valign=middle align=center height=400>
     <a href="album_frame.php" class="link">
      <img src="img/start.jpg" alt="Start" border=0>
     </a>
   </td></tr>
   <tr><td align=center>&nbsp;</td></tr>
   <tr><td align=center>&nbsp;</td></tr>
   <tr><td align=center class="alink">best viewed in 1024*768, IE or NE, Cookies and Javascript enabled<br><a href="http://www.c-art-web.de/sign/index.php?id=virtualbum_private" class="alink">(c) by C-Art Webdesign'01 - www.c-art-web.de</a></td></tr>
   <tr><td align=center valign=bottom class="alink" height=54><a href="http://validator.w3.org/check/referer"><img border="0"  src="img/valid-html401.gif"  alt="Valid HTML 4.01!" height="31" width="88"></a></td></tr>
   <tr><td align=center valign=bottom class="alink" height=54>&nbsp;</td></tr>
  </table>
 </body>
</html>