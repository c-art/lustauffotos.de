<?php

$mail = "tinageimer@web.de";
//$mail = "ted42@web.de";

$to_email = "

Hi Tina,

schau mal unter

www.lustauffotos.de/ecard.html nach.

Gruss Tobi";


mail($mail, "Nachträglich...", $to_email, "From: Tobias Bielohlawek <t.bielohlawek@web.de>");
?>
