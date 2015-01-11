<?php
 /*  Copyright by C-ART WEBDESIGN '2003 - www.c-art-web.de - (c-art@web.de)    -  07/07/03
  *   Project Stockstreet - www.stockstreet.de
  *
  *   send get Vars:
  *	$msg_error = The Error message
  *
  */

  include_once("inc.config.php");

  $to_mail = "\n";
  $snd_msg == "";

  if (trim($snd_email) == ""  || trim($snd_text) == "")
    $snd_msg = "Bitte Füllen Sie die rot makierten Felder aus<br>";



  if($snd_msg == "") {
$to_mail .= "
 Name...:    $snd_name
 Email..:    $snd_email
 Presonen..: $snd_tel
 Anliegen:
 $snd_text";

  $header = "From: 23 Homepage <info@c-art-web.de> \r \n";
  mail("ted42@web.de", "23 $snd_text", $to_mail, $header);
  $published = 2; //Show ok Page (must be 1. Subpage)

    //$query = "INSERT INTO 23_3_anfragen SET name='$snd_name', email='$snd_email', telefon='$snd_tel', nachricht='$snd_text', blt='".time()."'";
    //$res = mysql_query($query, $mysql_nr[$connr]) or myerror($query, __LINE__, __FILE__, mysql_error($mysql_nr[$connr]));
  }

  $snd_page = "20";

  include_once("index.php");
?>