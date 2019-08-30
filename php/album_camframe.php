<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // varreq:

  //configfile includes all other neccesarry files like mysqlconnect, tools, global config
  include("inc.config.php");
  // includes class to generate formular
 if (!isset($cook_cam) && !isset($nocount)) {
  setcookie("cook_cam", "true", time()+900,"/");
 }
 // statistic($cfg_sitename, "Tobi Cam", $cook_userid, "visit", $connr);
?>

<html>
 <head>
  <title>TobiCam</title>
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
 <frameset rows="120,*" border=0 frameborder=0>
  <frame src=album_cammsg.php name=camlink marginheight=3 marginwidth=3 scrolling=no noresize>
  <frame src=album_cam.php name=cammain marginheight=0 marginwidth=0 scrolling=no noresize>
 </frameset>
</html>


<?php

 if (!isset($cook_cam) && !isset($nocount)) {
  incude("_libary/class.jabber.php");

  $msg ="Besucher auf TobiCam\n".
  "IP: $REMOTE_ADDR\n".
  "AGENT: $HTTP_USER_AGENT";
  $to = "ted@jabber.fsinf.de";

  $JABBER = new Jabber;

  $JABBER->server         = "jabber.fsinf.de";
  $JABBER->port           = 5222;
  $JABBER->username       = "webmessage";
  $JABBER->password       = "webmsg";
  $JABBER->resource       = "ClassJabberPHP";
  $JABBER->enable_logging = NULL;

  $JABBER->Connect() or die("Couldn't connect!");
  $JABBER->SendAuth() or die("Couldn't authenticate!");
  $JABBER->SendMessage($to, NULL, NULL, array("body" => $msg));
  sleep(1);
  $JABBER->Disconnect();
}
?>