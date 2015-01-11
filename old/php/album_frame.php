<?php
   /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */

 include("inc.config.php");

 session_register("sess_vote");
 session_register("sess_fav");
 session_register("sess_userid");
 session_register("sess_aufl");

 $sess_aufl=$aufl;

 if ($cook_userid) $sess_userid=$cook_userid;
 else {
  $sess_userid=md5(uniqid(rand()));              //make new Userid
  setcookie ("cook_userid", $sess_userid, 2*time(),"/");
 }

 //************* set Statistic ******************************
 //if ($cook_id == "")
  //statistic($cfg_sitename, "visits", $cook_userid, "visit", $connr);
 //else statistic($cfg_sitename, "views", $cook_userId, "visit", $connr);

 $toe_goto = ($ecard) ?  "album_ecardfetch.php?userkey=$ecard" : "album_start.php";

?>

<html>
 <head>
  <title>LustAufFotos.de</title>
  <meta name="audience" content="Alle">
  <meta name="author" content="Tobias Bielohlawek">
  <meta http-equiv="content-language" content="de">
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
  <meta name="copyright" content="C-Art Webdesign c-art@web.de">
  <meta http-equiv="createDate" content="2001/10/1">
  <meta name="date" content="2001-10-1T12:00:00+00:00">
  <meta name="description" content="Hier finden Sie was Sie sonst nirgends finden: Eine Galerie meiner schoensten und orginellsten Fotos!">
  <meta name="keywords" content="foto, galerie, fotogalerie, lust, auf, fotos, tobias, bielohlawek, bilder, c-art, webdesign, wörrstadt, ensheim">
  <meta name="page-topic" content="Gesellschaft">
  <meta name="publisher" content="C-Art Webdesign">
 </head>
 <frameset rows="80,2,*" border=0 frameborder=0>
  <frame src=album_headln.php marginheight=0 marginwidth=0 scrolling=no noresize>
  <frame src=album_spacer.php?border=top name=border marginheight=0 marginwidth=0 scrolling=no noresize>
  <frameset cols="160,2,*" border=0 frameborder=0>
   <frame src=album_link.php?open=1100 name=link marginheight=3 marginwidth=3 scrolling=no noresize>
   <frame src=album_spacer.php?border=left name=border marginheight=0 marginwidth=0 scrolling=no noresize>
   <frame src=<?php echo $toe_goto; ?> name=main marginheight=3 marginwidth=3 scrolling=auto noresize>
  </frameset>
 </frameset>
</html>