<?php
 /*  Copyright by C-ART WEBDESIGN '2003 - www.c-art-web.de - (c-art@web.de)    -  07/07/03
  *   Project Stockstreet - www.stockstreet.de
  *
  *   send get Vars:
  */
 
    echo '
     <table width="90%" cellpadding="0" cellspacing="0" border="0">
      <form action="plug.kontaktsql.php#kontakt" method="post">
       <input type="hidden" name="snd_name" size="40" value="Name">
       <tr><td height="30" class="textbig">Ich bitte um Rückmeldung:</td></tr>';
       
       if( !empty( $snd_msg ) ) echo ' <tr><td height="30" class="textbig">Bitte Feld ausfüllen!!</td></tr>';
       
       echo '
       <tr>
        <td class="textbold">Ich&nbsp;
	<input name="snd_email" size="20"  value="'.$snd_email.'">
        komme mit Personen
        <input name="snd_tel" size="4"  value="'.$snd_tel.'">
	<input name="snd_text" type="submit" value="Zusage" class="button">
	<input name="snd_text" type="submit" value="Absage" class="button">
	</td>
       </tr>
         
        
       </tr>
      </form>
     </table>';

?>