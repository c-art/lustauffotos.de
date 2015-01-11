<?php

require("class.jabber.php");

 if (!isset($to) || $to == "") $to = "ted@jabber.fsinf.de";
$msg = "Von: $name \n $message";

$JABBER = new Jabber;

$JABBER->server         = "jabber.fsinf.de";
$JABBER->port           = 5222;
$JABBER->username       = "webmessage";
$JABBER->password       = "webmsg";
$JABBER->resource       = "ClassJabberPHP";
$JABBER->enable_logging = NULL;

$JABBER->Connect() or die("Couldn't connect!");
$JABBER->SendAuth() or die("Couldn't authenticate!");

//$JABBER->SendPresence(NULL, NULL, "online");

 $JABBER->SendMessage($to, NULL, NULL, array("body" => $msg));

 sleep(1);
 $JABBER->Disconnect();

header("Location: $go");
?> 