<?php
 // Copyright by C-Art Webdesign'2001 (c-art@web.de)

 include("inc.config.php");

 for ($k=0; $k<sizeof($lng_headlnmenu); $k++) $toe_menu.="<td align=center><a href=\"$lng_headlnlink[$k]\" class=menulink target=main> $lng_headlnmenu[$k] |</a></td>\n";

echo"
<html>
 <link rel=stylesheet type=\"text/css\" href=\"style.css\">
 <body class=otherbody>
   <table width=100% height=100% cellspacing=0 cellpadding=0 border=0>
    <tr>
     <td align=left valign=bottom>
      <a href=album_start.php target=main><img src=../img/logo.gif border=0></a>
     </td>
    </tr>
    <tr>
     <td align=right valign=bottom>
      <table cellspacing=0 cellpadding=5 border=0 bgcolor=$bgc_headln>
        <tr>
          <td align=center class=menulink>&nbsp;|</td>
          $toe_menu
        </tr>
      </table>
    </td>
   </tr>
  </table>
 </body>
</html>";
?>