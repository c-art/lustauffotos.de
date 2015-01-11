<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */


 //*************** Config File ***********************
 //if ($libarypath == "") $libarypath = "../_libary";
 //if ($cfg_tablepath == "") $cfg_tablepath = "../_tables";
 //include("$libarypath/inc.config.php");
 //@include("inc.lng_german.php");

 $cfg_picpath = "pics/";
 $cfg_sitename = "1";

 //Colors
 $bgc_headln="#1026AE";
 $bgc_main="#AEBFE3";

 //for picsend
 $cfg_uploadpath =  $cfg_picpath.'05_newpics';
 $cfg_allowed_filetype[0] = "image/pjpeg";
 $cfg_allowed_filetype[1] = "image/jpeg";
 $cfg_allowed_filetype[2] = "image/gif";
 $cfg_picsendto = "t.bielohlawek@web.de";

 $cfg_picpass = "pass";

 //for TobiCam
 $cfg_campath = "http://cerberos.dnsalias.net:8882/";
 $cfg_camfile = "ShowLatest.class";
 $cfg_cammsgsendto = "39225973@pager.icq.com";

 //for Ecard
 $cfg_default_img_height = "200";
 $sess_userimgdir = $cfg_picpath;

 //for Site
 $cfg_dia_time = 4;    // time how long pic is shown
 $cfg_pic_row = 3;     // anz Pics per Row
 $cfg_pic_req = 9;     //anz pics per Page

 //for votes
 $cfg_anz_votes = 6;

 //for Guestbook
 $cfg_gbsendto = "t.bielohlawek@web.de";

 //MySql connections
 //none take default:
 $connr = 10;

 //include("$libarypath/inc.mysqlconnect.php");
 //include("$libarypath/inc.tools.php");
 
 /*
 $mysql_tbkat1=mysql_fetch_tabname("\_kategorie1",$connr);
 $mysql_tbkat2=mysql_fetch_tabname("\_kategorie2",$connr);
 $mysql_tbpic=mysql_fetch_tabname("\_fotos",$connr);

 $mysql_tbfav=mysql_fetch_tabname("\_userfavoriten",$connr);

 $mysql_tbecard=mysql_fetch_tabname("\_ecard",$connr);
 $mysql_tbgb=mysql_fetch_tabname("\_lafgästebuch",$connr);
 $mysql_tbpicsend=mysql_fetch_tabname("\_fremdefotos",$connr);
 $mysql_tbcammsg = mysql_fetch_tabname("\_cammessages",$connr);

 $mysql_tbstat = mysql_fetch_tabname("\_stat",$connr);
 */
?>