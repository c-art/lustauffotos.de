<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */
  // Vars Required:
  //  $cat => Kategorie
  //  $krit => Search key
  //  $req => Anz Pics to show
  //  $str => Number to Start From
  //  $picanz => Nummber of all Pictures
  //  $diashow => Diashow on/off
  //  $aufl
  //  $ranked => if true sortet by voting
  //  $picrow => anz pics per row
  //  $fav => if true only pics form are shown

  $catname=rawurlencode(stripslashes($catname));

  include("inc.config.php");

  $column1 = mysql_fetch_columnname($mysql_tbpic,$connr);
  if ($fav) $column2 = mysql_fetch_columnname($mysql_tbfav,$connr);

  if ($req < 1) $req = $cfg_pic_req;
  if ($picrow < 1) $picrow = $cfg_pic_row;
  if ($str < 1) $str = 1;
  $krit = ($krit == "") ? "nothing" : "$krit";
  if (!$aufl) $aufl = ($sess_aufl<1) ? $cfg_aufl : $sess_aufl;
  if ($ranked) $rank = ", tab1.".$column1['vote']."/tab1.".$column1['votes']." AS ranking";
  if ($ranked) $rank2 = "&& tab1.".$column1['votes']."!='' && tab1.".$column1['opt3']."!=''";
  $pass = ($sess_userpass == $cfg_picpass) ? 1 : 0;
  //$pass = 0;
  //echo $pass;
  $order = ($ranked) ? "ranking" : $column1['nr'];
  if (!$userid) $userid = ($sess_userid) ? $sess_userid : "nothing";
  if ($fav) {
   $favquery1 = ", $mysql_tbfav AS tab2 ";
   $favquery2 = "&& (tab2.".$column2['picnr']."=tab1.".$column1['nr']." && tab2.".$column2['owner']."='$userid') ";
  }

  if ($picanz < 1 && $str) {
   $query = "SELECT COUNT(*) FROM $mysql_tbpic AS tab1 $favquery1 WHERE ((tab1.".$column1['kategorie']." LIKE '$cat' ||  tab1.".$column1['suchbegriffe']." LIKE '%$krit;%') && tab1.".$column1['status']."=2 && (tab1.".$column1['opt4']."='$pass'|| tab1.".$column1['opt4']."='') $favquery2)";
   $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
   $row = mysql_fetch_array($res);
   $picanz=$row[0];
   }
  if ($diashow) {
   $newstr = ($str < $picanz) ? $str + 1 : 1;
   $diashow_meta = "<META http-equiv=\"refresh\" content=\"$cfg_dia_time; URL=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&str=$newstr&aufl=$aufl&req=$req&diashow=1&picanz=$picanz&PHPSESSID=$PHPSESSID\">";
  }

  // Get Image(s)
  $query = "SELECT *$rank FROM $mysql_tbpic AS tab1 $favquery1 WHERE ((tab1.".$column1['kategorie']." LIKE '$cat' ||  tab1.".$column1['suchbegriffe']." LIKE '%$krit;%') && tab1.".$column1['status']."=2 && (tab1.".$column1['opt4']."='$pass'|| tab1.".$column1['opt4']."='') $rank2 $favquery2) ORDER BY $order ASC LIMIT ".($str-1).",$req";
  $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
  $picsget = 0;
  while ($row = mysql_fetch_array($res)) {
   $filename = $row[$column1['bild']];
   $dirname = (dirname($filename) != "") ? dirname($filename)."/" : "";
   $basename = $dirname."thumb_".basename($filename);
   $tsize = @GetImageSize ($cfg_picpath."/".stripslashes($basename));
   if ($tsize[0] > 0 && $tsize[1] > 0 && $req > 1) {
   	$filename = $basename;
   	$aufl = 1024;
   }
   $size = @GetImageSize ($cfg_picpath."/".stripslashes($filename));
   $picwidth = round($cfg_aufl_fakt[$aufl] * $size[0]);
   $picheight = round($cfg_aufl_fakt[$aufl] *  $size[1]);
   $pic[$picsget] = "<img src=\"".$cfg_picpath."/".stripslashes($filename)."\" border=0 width=$picwidth height=$picheight galleryimg=no class=picborder>";
   $picnr[$picsget] = $row[$column1['nr']];
   $picsget++;
   if ($picsget < 2)  {
    $toe_menudia = ($diashow) ? "<td><a href=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&req=$req&str=$str&aufl=$aufl&picanz=$picanz&PHPSESSID=$PHPSESSID class=menulink>$lng_menudiashowstop</a></td>" : "<td><a href=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&req=$req&str=$str&aufl=$aufl&picanz=$picanz&diashow=1&PHPSESSID=$PHPSESSID class=menulink>$lng_menudiashow</a></td>";
    if ($row[$column1['opt1']] && !$diashow) $toe_menuecard="<td><a href=album_ecard.php?picpfad=".rawurlencode($row[$column1['bild']])."&PHPSESSID=$PHPSESSID class=menulink>$lng_menuecard</a></td>";
    if ($row[$column1['opt2']] && !$diashow && (!stristr($sess_fav,"$picnr[0];") && !stristr($cook_fav,"$picnr[0];")) && !$fav) $toe_menufav="<td><a href='javascript:open_window(\"album_fav.php?picnr=".$row[$column1['nr']]."&PHPSESSID=$PHPSESSID\")' class=menulink>$lng_menufav</a></td>";
    if ($row[$column1['opt3']] && !$diashow && (!stristr($sess_vote,"$picnr[0];") && !stristr($cook_vote,"$picnr[0];"))) {
     for ($k = 1; $k <= $cfg_anz_votes; $k++) {
      $menu_vote .= "<tr><td align=center><a href='javascript:open_window(\"album_vote.php?vote=$k&picnr=".$row[$column1['nr']]."&PHPSESSID=$PHPSESSID\")' class=menulink>$lng_menuvote[$k]</a></td></tr>";
     }
     $toe_menuvote = "<td rowspan=2 bgcolor=$bgc_headln><table border=0 cellpadding=0 cellspacing=0><tr><td class=menulink><img src=../img/voting.gif></td></tr><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>$menu_vote</table></td>";
     }
    if (!$diashow) {
     for ($k = 1; $k <= $picanz; $k++) {
      $selected = ($k == $str) ? "selected" : "";
      $toe_menulink .= "<option value=\"$k\" $selected>$lng_menulink $k</option>\n";
     }
     $toe_menulink .= "<option value=\"no\">--------------------</option>\n";
     for ($k = 0; $k < sizeof($lng_headlnmenu); $k++) $toe_menulink.="<option value=\"$lng_headlnlink[$k]\">$lng_headlnmenu[$k]</option>\n";
     $toe_menulink = "<td><select onChange=\"chng(this.options[this.options.selectedIndex].value)\">$toe_menulink</select></td>";
    }
    $toe_text = nl2br(stripslashes($row[$column1['text']]));
   }
  }
  if ($picsget < $req && $str < 2) $picanz = $picsget;   //check if anz pic is still right if not set correct value

//Get Arrows
  if (!$diashow) {
   if (!($picsget<2 && $req<2)) $arrowsub = "m";
   if (($picanz-$str) >= 0 && (($str-$req)>=0 && $str>1) || ($str-$req)>0) $toe_arrowle = "<td><a href=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&str=1&req=$req&picanz=$picanz&aufl=$aufl&PHPSESSID=$PHPSESSID class=menulink title=\"erstes Bild\"><img src=\"../img/arrow-leftend$arrowsub.gif\" alt=\"erstes Bild\" border=0></a></td>";
   if (($picanz-$str) >= 0 && ($str-$req)>=$req) $toe_arrowl = "<td><a href=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&str=".($str-$req)."&req=$req&picanz=$picanz&aufl=$aufl&PHPSESSID=$PHPSESSID class=menulink title=\"vorherriges Bild\"><img src=\"../img/arrow-left$arrowsub.gif\" alt=\"vorherriges Bild\" border=0></a></td>";
   if (($str+$req) <= $picanz-$req) $toe_arrowr = "<td><a href=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&str=".($str+$req)."&req=$req&picanz=$picanz&aufl=$aufl&PHPSESSID=$PHPSESSID class=menulink title=\"nächstes Bild\"><img src=\"../img/arrow-right$arrowsub.gif\" alt=\"nächstes Bild\" border=0></a></td>";
   if (($str+$req) <= $picanz) $toe_arrowre = "<td><a href=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&str=".((floor($picanz / $req) * $req))."&req=$req&picanz=$picanz&aufl=$aufl&PHPSESSID=$PHPSESSID class=menulink title=\"letztes Bild\"><img src=\"../img/arrow-rightend$arrowsub.gif\" alt=\"letztes Bild\" border=0></a></td>";
  }
 // Get Borders  & Icons
  if ($picsget < 2 && $req < 2) {
   //Statistic
   $query = "UPDATE $mysql_tbpic SET ".$column1['views']."=".$column1['views']."+'1' WHERE ".$column1['nr']."='$picnr[0]'";
   $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
   //Generate HTML for one PIC
   $toe_pic="
    <table border=0 cellpadding=0 cellspacing=0>
     <tr>
      <td colspan=3>
       <table border=0 cellpadding=0 cellspacing=0 width=100%>
        <tr bgcolor=$bgc_headln>
         <td align=left>
          <table border=0 cellpadding=0 cellspacing=4>
           <tr>
            $toe_arrowle $toe_arrowl $toe_menulink $toe_arrowr $toe_arrowre
           </tr>
          </td>
         </table>
        </td>
        <td align=right>
         <table border=0 cellpadding=0 cellspacing=4>
          <tr>
           $toe_menudia $toe_menuecard $toe_menufav
           </td>
         </table>
        </td>
       </table>
      </td>
     </tr>
     <tr height=5>
      <td><img src=../img/blank.gif height=5></td>
      <td rowspan=2>&nbsp;&nbsp;</td>
      $toe_menuvote
     </tr>
     <tr>
      <td align=center>
       <table border=0 cellpadding=0 cellspacing=0>
        <tr>$border[1] \n $border[2] \n $border[3]</tr>
        <tr>$border[4] \n <td>$pic[0]</td> \n $border[6]</tr>
        <tr>$border[7] \n $border[8] \n $border[9]</tr>
       </table>
      </td>
     </tr>
    </table>
    <table>
    <tr>
      <td align=center class=text>
       $toe_text
      </td>
     </tr>
    </table>";
   }
  else {    //Generate HTML for more PIC
   if ($pic[0]!="") {
    for ($k = 1; $k <= ceil($picsget/$picrow); $k++) {
     for ($i = 1; $i <= $picrow; $i++) {
      $picnr = ($k-1) * $picrow + $i;
      $toe_picrow[$k] .= "<td align=center valign=middle><a href=site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&str=".($str+$picnr-1)."&req=1&picanz=$picanz&PHPSESSID=$PHPSESSID>".$pic[($picnr-1)]."</a></td>\n";
     }
    $toe_pic .= "<tr>".$toe_picrow[$k]."</tr>\n";
    }
    $toe_pic="<table border=0 cellpadding=0 cellspacing=0><tr>$toe_arrowle $toe_arrowl<td align=center><table border=0 cellpadding=10 cellspacing=10>\n$toe_pic</table></td>$toe_arrowr $toe_arrowre</tr></table>";
   }
   else {
    $toe_pic = $lng_nopic;
    if ($fav && $userid == "nothing") $toe_pic .= "$lng_favnocookie<br>
     <form action=site.php>
      <input type=hidden name=PHPSESSID value=\"$PHPSESSID\">
      <input type=hidden name=cat value=\"$cat\">
      <input type=hidden name=catname value=\"".rawurlencode($catname)."\">
      <input type=hidden name=fav value=\"$fav\">
      <input type=hidden name=aufl value=\"$aufl\">
      <input type=hidden name=str value=\"$str\">
      <input type=hidden name=req value=\"$req\">
      <input type=hidden name=picanz value=\"$picanz\">
      <table cellpadding=0 cellspacing=0 border=0 class=tableborder><tr><td>
       <table cellspacing=5 cellpadding=0 border=0>
        <tr><td class=textbold>Email:</td><td>&nbsp;<input name=userid size=15></td></tr>
        <tr><td align=center colspan=2><input type=submit value='Absenden'></td></tr>
       </table>
      </td></tr></table>
     </form>";
   }
  }

 $cat2 = str_replace("&nbsp;-&gt;&nbsp;","/", rawurldecode($catname));
 //statistic($cfg_sitename, substr($cat2, 0, strpos($cat2, "/")), $cook_userid, "visit", $connr);

 @mysql_close($connr);

?>

<html>
 <head>
  <?php echo $diashow_meta; ?>
  <META HTTP-EQUIV="imagetoolbar" CONTENT="no">
 </head>
 <script language="JavaScript" src="norclick.js"></script>
 <script language='JavaScript'>
   function open_window(url) {
    f2=window.open(url,"window","dependent=yes,width=300,height=150,locationbar=no,menubar=no,resizable=yes,status=no,scrollbars=no");
   }

   function chng(str) {
    if (str=='no') {
      document.forms[0].reset();
      return;
    }
    else  {
     if (str.length>5) {
      window.location.href =str;
      }
     else {
      <?php echo"window.location.href ='site.php?cat=$cat&catname=$catname&fav=$fav&krit=$krit&ranked=$ranked&str='+str+'&req=$req&aufl=$aufl&picanz=$picanz&PHPSESSID=$PHPSESSID'"; ?>
     }
    }
  }
 </script>
 <link rel=stylesheet type="text/css" href="style.css">
 <body <?php echo"bgcolor=$bgc_main";?> class=mainbody>
  <form>
   <table width=100% cellspacing=0 cellpadding=0 border=0>
    <tr height=30><td align=right class=headln><?php echo stripslashes(stripslashes(rawurldecode($catname))); ?></td></tr>
    <tr height=30><td align=right class=headln>&nbsp;</td></tr>
    <tr><td align=center valign=middle class=text>

     <?php echo "$toe_pic"; ?>

     </td>
    </tr>
   </table>
  </form>
 </body>
</html>

