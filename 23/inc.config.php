<?php
   /*   Copyright by C-ART '2001 www.c-art-web.de (c-art@web.de)   */

 //includes at bottom of file

 //*************** Config File ***********************

 $ver = "&nbsp;&nbsp; v.1.3-".date("n.j", getlastmod());

  if (!isset($cfg_libarypath)) $cfg_libarypath = "../../_libary";
 include_once("$cfg_libarypath/inc.config.php");

 include_once("$cfg_libarypath/inc.mysqlconnect.php");
 include_once("$cfg_libarypath/inc.tools.php");

 $connr = 10;

 $cfg_sitename = "7";
 $mysql_tbtexte= "22_3_sites";
?>