<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */

  //site.php
  $lng_menudiashow="Diashow |";
  $lng_menudiashowstop="Diashow Stop |";
  $lng_menuecard="Ecard |";
  $lng_menufav="+Favorites |";
  $lng_menulink="Bild";
  $lng_menuvote[1]="&nbsp;1";
  $lng_menuvote[2]="&nbsp;2";
  $lng_menuvote[3]="&nbsp;3";
  $lng_menuvote[4]="&nbsp;4";
  $lng_menuvote[5]="&nbsp;5";
  $lng_menuvote[6]="&nbsp;6";
  $lng_nopic="Es wurden keine passenden Bilder gefunden";

  //album_fav.php
  $lng_favalready="Du hast dieses Bild schon zu deinen Favoriten hinzugefügt!";
  $lng_favnew="Das Bild wurde zu ihren Favorien hinzugefügt.<br>Wähle im Menu 'Favoriten' aus, um deine Favoriten anzuschauen.";
  $lng_favnocookie="Dein Bowser unterstützt keine Cookies. Um das Bild eindeutig zuzuordnen, gebe bitte deine Emailadresse an.<br>Mit dieser kannst du beim nächsten Besuch deine Favoriten aufrufen.<br> (die Emailadresse wird nicht für andere Zwecke benutzt)";

 //album_vote.php
  $lng_votealready="Du hast dieses Bild schon bewertet!";
  $lng_votenew="Vielen Dank für deine Bewertung!<br>Wähle im Menu 'Top5 Galerie' aus, um die Bilder mit den besten Bewertungen anzuschauen.";

 //album_ecard.php
  $lng_ecardtext="Hier kannst du das ausgewählte Bild an eine Freundin oder Freund als virtuelle Grußkarte schicken.<br> Einfach ihre/seine Emailadresse und Name angeben und schon wird er virtuelle Gruß mit den Bild verschickt.<br><br>";
  $lng_ecardtextpre="Stimmen alle Eingaben? <br> Kontrolliere nochmal alles und klicke auf 'Absenden'. Wenn nicht, klicke auf 'Zurück' um die Eingabe zu ändern.<br><br>";

 //album_headln.php
  $lng_headlnmenu[]="TobiCam";          $lng_headlnlink[]="album_camframe.php?PHPSESSID=$PHPSESSID";
  $lng_headlnmenu[]="Gästebuch";        $lng_headlnlink[]="album_guestb.php?PHPSESSID=$PHPSESSID";
  $lng_headlnmenu[]="Top5 Galerie";     $lng_headlnlink[]="site.php?cat=%&str=1&aufl=100&ranked=1&req=5&picanz=5&catname=".rawurlencode(addslashes($lng_headlnmenu[(count($lng_headlnmenu)-1)]))."&picrow=5&PHPSESSID=$PHPSESSID";
  $lng_headlnmenu[]="Favoriten";        $lng_headlnlink[]="site.php?cat=%&str=1&aufl=100&fav=1&catname=".rawurlencode(addslashes($lng_headlnmenu[(count($lng_headlnmenu)-1)]))."&PHPSESSID=$PHPSESSID";
  $lng_headlnmenu[]="Bild hochladen";   $lng_headlnlink[]="album_picsend.php?PHPSESSID=$PHPSESSID";
  $lng_headlnmenu[]="Ecard abholen";    $lng_headlnlink[]="album_ecardfetch.php?PHPSESSID=$PHPSESSID";
  $lng_headlnmenu[]="Impressum";        $lng_headlnlink[]="album_impressum.php?PHPSESSID=$PHPSESSID";

 //album_cam.php
  $lng_camtext="<span class=textbold> - Die TobiCam ist zur Zeit inaktiv. - </span><br><br><br><br> Du kannst mir hier eine Message schicken, ich schalte Sie dann an (sofern ich online bin):";
  $lng_camtext2="Du willst mir was sagen? Hier kannst du mir eine Message schicken:";

 //album_confirm.php
  $lng_confgb="Vielen Dank für deinen Gästebucheintrag";
  $lng_confecard="Die Ecard wurde erfolgreich verschickt!";
  $lng_confpic="Das Bild wurde erfolgreich hochgeladen. <br>Ich werde es mir nun anschauen und danach in die Galerie unter<br> <b>Fun -> Besucherbilder</b> aufnehmen";
  $lng_confpicwtyp="Das Bild wurde <b>nicht</b>hochgeladen. <br>Der Datei Typ ist falsch. <b>Bitte nurr Bilder vom Typ <br>*.jpg oder *.gif hochladen";
  $lng_confpicwsize="Das Bild wurde <b>nicht</b>hochgeladen. <br>Du hast eine falsche (oder keine) Adresse angegeben  <br>order die Datei<b> ist zu gross. Maximal 200kb";
  $lng_confmsg="Die Nachricht wurde erfolgreich gesendet.<br><a href=album_cammsg.php class=link>zurück</a>";

 //album_ecardfetch.php
  $lng_ecardstart="Hier kannst du deine virtuelle Grußkarte abholen.<br> Gebe hierfür die dir zugeschickte Nummer in das Formularfeld ein.<br><br>";
  $lng_ecardfetch="Willst du antworten oder jemand anderem auch eine Ecard schicken? Dann gehe in die Galerie und wähle ein Foto aus. <br> Links über dem Fotos findest du nun die Option 'Ecard'. Klicke auf diese und schon kannst du das Foto verschicken!<br><br>";
?>