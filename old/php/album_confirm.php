<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq: tyP [picsend; guestb;

 include("inc.config.php");
 $height = 50;
 switch ($typ) {
  case "gb":
   $toe_conf=$lng_confgb;
   break;
  case "ecard":
   $toe_conf=$lng_confecard;
   break;
  case "msg":
   $toe_conf=$lng_confmsg;
   $height = 0;
   break;
  case "pic":
   $toe_conf=$lng_confpic;
   break;
  case "wtyp":
   $toe_conf=$lng_confpicwtyp;
   break;
  case "wsize":
   $toe_conf=$lng_confpicwsize;
   break;
 }
?>

<html>
 <script language="JavaScript" src="norclick.js"></script>
 <link rel=stylesheet type="text/css" href="style.css">
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <table width=100%>
    <tr height=30>
     <td align=right class=headln>Bestätigung</td>
    </tr>
    <tr height=<?php echo $height; ?>><td align=right class=headln>&nbsp;</td></tr>
    <tr><td align=center class=text><?php echo $toe_conf; ?></td></tr>
  </table>
 </body>
</html>