<?php
  /*   Copyright by C-ART WEBDESIGN '2001 - www.c-art-web.de - (c-art@web.de)   */

 include("inc.config.php");

 if ($dir=="") $dir="../private/";
 $picnr=0;

 $column=mysql_fetch_columnname($mysql_tbpic,$connr);

 $query="DELETE FROM $mysql_tbkat1";
 if ($form_write) $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
 $query="DELETE FROM $mysql_tbkat2";
 if ($form_write) $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
 $query="DELETE FROM $mysql_tbpic";
 if ($form_write) $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));

 $handle1=opendir($dir);
 while ($kat1= readdir ($handle1)) {
  if ($kat1!= "." && $kat1!= "..") {
   $kat1nr=$kat1nr+5;
   $kat=explode('_',$kat1);
   $query="INSERT INTO $mysql_tbkat1 VALUES('$kat1nr','".addslashes($kat[1])."','2')";
   if ($form_write) $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
   $toe.=$query."<br>";

   $handle2=opendir("$dir/$kat1/");
   while ($kat2= readdir ($handle2)) {
    if ($kat2!= "." && $kat2!= "..") {
     $kat2nr=$kat2nr+5;
     $kat=explode('_',$kat2);
     $query="INSERT INTO $mysql_tbkat2 VALUES('$kat2nr','$kat1nr','".addslashes($kat[1])."','2')";
     if ($form_write) $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
     $toe.=$query."<br>";

     $handle3=opendir("$dir/$kat1/$kat2/");
     $search=@file("$dir/$kat1/$kat2/search.txt");
     $texte=@file("$dir/$kat1/$kat2/texte.txt");
     $k=0;
     while ($pic= readdir ($handle3)) {
      if (stristr($pic,".gif") || stristr($pic,".jpg")) {
       $query="INSERT INTO $mysql_tbpic ($column[nr],$column[kategorie],$column[status],$column[titel],$column[bild],$column[text],$column[suchbegriffe],$column[opt1],$column[opt2],$column[opt3],$column[opt4],$column[owner]) VALUES ('$picnr','$kat2nr','2','Bild$k','".addslashes("$kat1/$kat2/$pic")."','".addslashes($texte[$k])."','".addslashes($search[0])."','1','1','1','','')";
       if ($form_write) $res = mysql_query($query,$mysql_nr[$connr]) or myerror($query,__LINE__,__FILE__,mysql_error($mysql_nr[$connr]));
       $toe.=$query."<br>";
       $k++;
       $picnr++;
       }
      }
     closedir($handle3);
     }
    }
   closedir($handle2);
   }
  }
 closedir($handle1);

echo"
 <html>
  <body bgcolor=#ffffff>
   <form action=pic2db.php>
    Directory:<input name=dir value='$dir'>&nbsp;&nbsp;&nbsp;Write?<input type=checkbox name=form_write value=1>
    <input type=submit>
   </form><br>
   $toe
  </body>
 </html>";

?> 