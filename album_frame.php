<?php
   /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */

 include("inc.config.php");

 session_register("sess_vote");
 session_register("sess_fav");
 session_register("sess_userid");

  if ($cook_userid) $sess_userid=$cook_userid;
 else {
  $sess_userid=md5(uniqid(rand()));              //make new Userid
  setcookie ("cook_userid", $sess_userid, time() + 360*24*60*60, "/");
 }

 //************* set Statistic ******************************
// if ($cook_id == "")
//  statistic($cfg_sitename, "visits", $cook_userid, "visit", $connr);
// else statistic($cfg_sitename, "views", $cook_userId, "visit", $connr);

 $toe_goto = ($ecard) ?  "album_ecardfetch.php?userkey=$ecard" : "album_start.php";

 include( 'design.header.php' );
?>


 <frameset rows="60,2,*" border=0 frameborder=0>
  <frame src=album_headln.php marginheight=0 marginwidth=0 scrolling=no noresize>
  <frame src=album_spacer.php?border=top name=border marginheight=0 marginwidth=0 scrolling=no noresize>
  <frameset cols="160,2,*" border=0 frameborder=0>
   <frame src=album_link.php?open=1100 name=link marginheight=3 marginwidth=3 scrolling=no noresize>
   <frame src=album_spacer.php?border=left name=border marginheight=0 marginwidth=0 scrolling=no noresize>
   <frame src=<?php echo $toe_goto; ?> name=main marginheight=3 marginwidth=3 scrolling=auto noresize>
  </frameset>
 </frameset>
</html>