<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */


 //*************** Config File ***********************
 $ver="3.0".date("n.j", getlastmod());

 if ($libarypath == "") $libarypath = "../../../_libary";
 if ($cfg_tablepath == "") $cfg_tablepath = "../../../_tables";
 include("$libarypath/inc.config.php");
 @include("inc.lng_german.php");

 $nousrchk=true;

 $cfg_picpath="../private";

 $cfg_sitename = "1";

 //Colors
 $bgc_headln="#1026AE";
 $bgc_main="#AEBFE3";

 //for picsend
 $cfg_uploadpath="../private/05_newpics";
 $cfg_allowed_filetype[0]="image/pjpeg";
 $cfg_allowed_filetype[1]="image/jpeg";
 $cfg_allowed_filetype[2]="image/gif";
 $cfg_picsendto="t.bielohlawek@web.de";

 $cfg_picpass = "pass";

 //for TobiCam
 $cfg_campath = "http://cerberos.dnsalias.net:8882/";
 $cfg_camfile = "ShowLatest.class";
 $cfg_cammsgsendto = "39225973@pager.icq.com";

 //for Ecard
 $cfg_default_img_height = "200";
 $sess_userimgdir = "../private";

 //for Site
 $cfg_aufl=1024;
 $cfg_aufl_fakt[1024]=1;
 $cfg_aufl_fakt[800]=0.7;
 $cfg_aufl_fakt[600]=0.5;
 $cfg_aufl_fakt[100]=0.25;
 $cfg_dia_time = 4;    // time how long pic is shown
 $cfg_pic_row = 3;     // anz Pics per Row
 $cfg_pic_req = 9;     //anz pics per Page

 //for votes
 $cfg_anz_votes = 6;

 //for Guestbook
 $cfg_gbsendto = "t.bielohlawek@gmx.de";

 //MySql connections
 //none take default:
 $connr = 10;

 include("$libarypath/inc.mysqlconnect.php");
 include("$libarypath/inc.tools.php");

 $mysql_tbkat1 = '40_7_kategorie1';
 $mysql_tbkat2 = '41_7_kategorie2';
 $mysql_tbfav  = '42_7_userfavoriten';
 $mysql_tbecard= '43_7_ecard"';
 $mysql_tbpicsend= '44_7_fremdefotos';
 $mysql_tbpic  = '45_7_fotos';
 $mysql_tbcammsg = '46_7_cammessages';
 $mysql_tbgb   = '47_7_lafgaestebuch';



 //$mysql_tbstat = mysql_fetch_tabname("\_stat",$connr);

 $statowner = "virtak";
?>
