<?
include "lang.php";

require "settings.php";
require "lang.php";

if ($p == "1") {
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
<title>RAMBEX</title>
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgt background=$bgi1>
<table width=100% height=70><tr><td valign=middle>
&nbsp;&nbsp;<img src=\"logo.gif\" alt=\"RAMBEX LOGO\" border=\"0\" align=center></a>&nbsp;&nbsp;
</td></tr></table>

</body>
</HTML>
";
}

if ($p == "2") {
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgt1 background=$bgi2>
";
$file = "users/$login.dat";
$file = file($file);
$time1 = date("Y");
$time2 = date("m");
$time3 = date("d");
$time = ($time2*31)+(($time1*12)*31)+$time3;
$sss = $time-$file[0];

if ($sss < 7) { $status = "Живой"; }
if ($sss > 20) { $status = "Умер"; $dead = "1"; }
if ($sss > 7 && $dead != "1") { $status = "Больше недели здесь не появлялся"; }


print "<table width=100% cellspacing=0 cellpadding=0><tr><td>";
$aaa = "A"; $vvv = "В";
require "menu.txt";
print "
<BR><hr size=1 color=gray>
&nbsp; Вы: <b>$file[3]</b><br>
&nbsp; Последний вход: <b>$sss</b> дней назад.<br>
&nbsp; Права: <b>$file[1]</b><br>
&nbsp; Ваш статус: <b>$status</b><br>
&nbsp;<img src=str.gif>&nbsp;<a href=club.php?p=7&login=$login target=main>Персональная информация</a><br>
&nbsp;<img src=str.gif>&nbsp;<a href=club.php?p=9&login=$login&password=$password target=main>Закачать свою фотографию</a><br>
<hr size=1 color=gray>

&nbsp;<font color=$bgt><b>Сейчас в клубе:</b></font><br>
";


$name1 = "online.data";
          $fill="$name1";
          $test1 = file("$fill"); 
     $size1 = sizeof($test1);
$n1 = "0";
do {
$data1 = explode("|", $test1[$n1]);
print "&nbsp;<img src=str.gif>&nbsp;<a href=club.php?p=7&login=$data1[0] target=main>$data1[0]</a><br>";
$n1++;
} while ($n1 < $size1);

print "

	

<br><br>
<table bgcolor=$bgt width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td>&nbsp; <font color=#FFFFFF>Записки:</font></td></tr></table>
";
$name2 = "zapiski.data";
          $fill2="$name2";
          $test2 = file("$fill2");
     $size = sizeof($test2);
     $si = $size;
     $sizeres = $size;
$n = $size; $hr = "";
$pp = "0";
do {

    
    $data2 = explode("|", $test2[$n]);
if ($data2[0] != "") {
print "&nbsp;<img src=mes.gif ALT=\"$data2[3] : Добавил $data2[0]\"> <a href='club.php?p=6&login1=$data2[1]&login=$login&password=$password' target=main>Записка для <b>$data2[1]</b></a><br>";
}
$n--;
$pp++;
if ($pp == "5") { $n = "0"; }
} while ($size < $n+$size);
print "<hr size=1>&nbsp;<img src=str.gif>&nbsp;<a href=club.php?p=4&login=$login&password=$password target=main><b>ДОБАВИТЬ ЗАПИСКУ</b></a><br><br><br>
<br><br><br>&nbsp;&nbsp;&nbsp;&copy; Rambex 2003,<br>&nbsp;&nbsp;&nbsp;<a href=letter2.php target=main>Письмо администрации</a><br><br>
";






$hr; 




}
if ($p == "3") {
include "$param";
}


if ($p == "4") { 
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgc>
";

print "<center><h1>Добавить записку</h1></center>
<form action=club.php?p=5 method=post>
<table width=95% align=center border=0>
<tr><td bgcolor=$bgt1>Вы:</td><td bgcolor=$bgt1><b>$login</b><input type=hidden name=login value=$login>";



print "
 </td></tr>
<tr><td bgcolor=$bgt1>Оставить записку для:</td><td bgcolor=$bgt1><select name=login2>";

$name = "users.data";

          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
     $si = $size;
     $sizeres = $size;
$n = "0";
do {
    $data = explode("|", $test[$n]);
print " <option value=$data[2]>$data[2] ($data[1])</a> \r\n";
$n++;
} while ($n < $size);

print "</td></tr>
<tr><td bgcolor=$bgt1>Текст сообщения: </td><td bgcolor=$bgt1><textarea cols=40 rows=5 name=text></textarea></td></tr>
<tr><td bgcolor=$bgt1 colspan=2><center><input type=submit value=Добавить></td></tr>
</table>
</form>
<center>
<br><br>
      ";
}

if ($p == "5") {
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgc>
";

if ($text == "") { print "<h2><center>Пожалуйста вернитесь и введите текст записки.</center></h2>"; exit; }
if ($text == " ") { print "<h2><center>Пожалуйста вернитесь и введите текст записки.</center></h2>"; exit; }
if ($login2 == "$login") { print "<h2><center>Невозможно отправить записку, т.к. имя получателя совпадает с именем отправителя. Вернитесь и измените имя получателя.</center></h2>"; exit; }

$date = date("d.m.Y");
$data = "$login|$login2|$text|$date";
$data = str_replace("\r\n", "", $data);
$data = str_replace("\"", "`", $data);
$data = htmlspecialchars($data);

                                     $filename = "zapiski.data";
                                     $fp = fopen($filename, "a+");
                                     $xx = fputs($fp, "$data\r\n");
                                     fclose($fp);
print "<h1><center>Записки : добавление</center></h1>
       <br><br><center><b>Записка для $login2<br>успешно добавлена!</b><br><br>Её текст:<i><br>$text
      ";

}
if ($p == "6") {
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgc>
";

$name = "users.data";

          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
$n = "0";
do {
 $data = explode("|", $test[$n]);
if ($login == "$data[2]" && $password == "$data[3]") { $yes = "yes"; }
$n++;
} while ($n < $size);

if ($yes == "yes") { 
if ($login != "$login1") { print "<center><h1>Вы не можете прочитать эту записку, т.к. она адресована не вам.</h1></center>"; exit; }

          $file22 = "zapiski.data";
          $test3 = file("$file22"); 
     $size = sizeof($test3);
$n2 = "0";
do {
    $data4 = explode("|", $test3[$n2]);



if ($login == "$data4[1]") {  $test3[$n2] = ""; 

print "<blockquote><h1>Текст записки для $login</h1>
       <font color=red size=3><i>Записка для $data4[1] от $data4[0], написана $data4[3]</i></font><br><tt><font size=3> $data4[2]
       ";
                   }
                
else {
    $test3[$n2] = "$data4[0]|$data4[1]|$data4[2]|$data4[3]"; 
     }    
$n2++;
} while ($n2 < $size);




$n2 = "0";                          do {
$array .= "$test3[$n2]";
         $n2++;               } while ($n2 < $size);
        $fh = fopen("zapiski.data", "w");          
        $ee = fputs($fh, "$array");      
        fclose($fh);




}
else { print "Это не ваш логин"; exit; }
}
if ($p == "7") {
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgc>
";
$file = "users/$login.dat";
$file = file($file);

print "
<center><h1>Пользователь : $login</h1></center>
  <table width=400 align=center border=0>
	  <tr><td align=right bgcolor=$bgt1 width=50%>Имя</td> <td bgcolor=$bgt1 width=50%>
	  $file[3]
	  </td></tr>
	  <tr><td align=right bgcolor=$bgt1>логин</td> <td bgcolor=$bgt1>
	  $file[4]
	  </td></tr>
	  <tr><td align=right bgcolor=$bgt1>права</td> <td bgcolor=$bgt1>
	  $file[1]
	  </td></tr>
	  <tr><td align=right bgcolor=$bgt1>статус</td> <td bgcolor=$bgt1>
";
$time1 = date("Y");
$time2 = date("m");
$time3 = date("d");
$time = ($time2*31)+(($time1*12)*31)+$time3;
$sss = $time-$file[0];
if ($sss < 7) { print "Живой"; }
if ($sss > 20) { print "Умер"; $dead = "1"; }
if ($sss > 7 && $dead != "1") { print "Больше недели здесь не появлялся"; }


print "
	  </td></tr>
 	  <tr><td colspan=2 bgcolor=$bgt1><center>
";
 $file1 = "photos/$login.jpg";
 $file11 = "photos/$login.bmp";
 if (file_exists($file1) && file_exists($file11)){
 if (filemtime($file11) > filemtime($file1)){ $file1 = $file11;}
 }
 if (file_exists($file11) && !file_exists($file1)){$file1 = $file11;}
 if (is_file($file1)) { print "<img src='$file1' border=0>"; } else {
$test = file("users.data"); 
$size = sizeof($test);
$n = "0";
do {
 $data = explode("|", $test[$n]);
$n++;
} while ($n < $size);
 print "Фото не загружено. <a href=club.php?p=9&login=$data[2]&password=$data[3] target=main>Загрузить</a>."; }
 
print "	  </td></tr>
 	  
          </table></form>

      ";
}
if ($p == "8") {
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgc>
";

 $n = "0";
  $g = "0";
          $fill="users.data";
          $test = file("$fill"); 
     $size = sizeof($test);
$num = $size;
print "<br><br><table align=center width=95%>
<tr>
<td bgcolor=$bgt>ID</td>
<td bgcolor=$bgt>логин</td>
<td bgcolor=$bgt>имя</td>
<td bgcolor=$bgt>дата рождения</td>
<td bgcolor=$bgt>дата вступления</td>
<td bgcolor=$bgt>дополнительно</td>
</tr>
";
                          do {
                               
                               $data = explode("|", $test[$size]);  if ($data[1] != "") {



print "<tr>
<td bgcolor=$bgt1 width=40>$data[0]</td>
<td bgcolor=$bgt1><a href=club.php?p=7&login=$data[2]>$data[2]</a></td>
<td bgcolor=$bgt1 align=center>$data[1]</td>
<td bgcolor=$bgt1 align=center>$data[4].$data[5].$data[6]</td>
<td bgcolor=$bgt1 align=center>$data[7]</td>
<td bgcolor=$bgt1>$data[8]</td>
</tr>";
                       }

$size--;
$g++;
                         } while ($n < "$size+1");

}
if ($p == "9") {
print "
<html>
<head>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
</head>
<style>
 td { font-family: Arial, Helvetica, sans-serif; font-size: 9pt;   }
 H1 {font-family: Times New Roman Cyr, Times New Roman; font-size: 14pt; 	text-decoration : underline;}
 Li { list-style : circle; }
</style>
<title>$title</title>
</head>
<body topmargin=0 leftmargin=0 margintop=0 marginleft=0 bgcolor=$bgc>

<br><blockquote>
<center><h1>Добавление фотографии</h1>
Вы можете закачать одну фотографию с расширением .jpg или .bmp
<form action=club.php?p=10 method=post ENCTYPE=\"multipart/form-data\">
<INPUT TYPE=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1000000\">
<INPUT NAME=\"userfile\" TYPE=\"file\">
<input type=hidden name=login value=$login>
<input type=hidden name=password value=$password>
<input type=submit value=\">> Закчать >>\"></form>
";
}
if ($p == "11") {
$fh = fopen("$file", "w");
fputs($fh, "$text");
fclose($fh);
 }
if ($p == "10") {
$name = "users.data";

          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
$n = "0";
do {
 $data = explode("|", $test[$n]);
if ($login == "$data[2]" && $password == "$data[3]") { $yes = "yes"; }
$n++;
} while ($n < $size);

if ($yes == "yes") { 
if ($userfile == 'none') {print("Файл отсутствует...");exit();}
if ($userfile==false) {
    print("<body bgcolor=#f0f3f5><center><h1>Вы не ввели имя файла.<br>
	<form action=club.php?p=10 method=post ENCTYPE=\"multipart/form-data\">
<INPUT TYPE=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1000000\">
<INPUT NAME=\"userfile\" TYPE=\"file\">
<input type=hidden name=login value=$login>
<input type=hidden name=password value=$password>
<input type=submit value=\">> Закчать >>\"></form>
</h1></center></body>\n");
}
else {

if ($userfile_size == 0){print "<body bgcolor=#f0f3f5><center><h1>Нет такого файла $userfile_name.<br><br>
Введите имя файла заново.<br>
<form action=club.php?p=10 method=post ENCTYPE=\"multipart/form-data\">
<INPUT TYPE=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1000000\">
<INPUT NAME=\"userfile\" TYPE=\"file\">
<input type=hidden name=login value=$login>
<input type=hidden name=password value=$password>
<input type=submit value=\">> Закчать >>\"></form>
</h1></center></body>\n";}
else {
if ($userfile_type != "image/pjpeg" && $userfile_type != "image/bmp"){print "<body bgcolor=#f0f3f5><center><h1>Это не файл с расширением .jpg или .bmp. Это файл типа $userfile_type.<br><br>
Введите имя файла заново.<br>
<form action=club.php?p=10 method=post ENCTYPE=\"multipart/form-data\">
<INPUT TYPE=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1000000\">
<INPUT NAME=\"userfile\" TYPE=\"file\">
<input type=hidden name=login value=$login>
<input type=hidden name=password value=$password>
<input type=submit value=\">> Закчать >>\"></form>
</h1></center></body>\n";}
else {
$extarr = explode(".", $userfile_name);
end($extarr);
$ext = current($extarr);

if ($userfile_type == "image/pjpeg"){$newfile = "photos/$login.jpg";}
else{$newfile = "photos/$login.bmp";}

if (!copy($userfile , $newfile)) {
    print("<body bgcolor=#f0f3f5></body><center><h1>Не удалось скопировать $userfile ... Попробуйте заново.<br></h1></center></body>\n");
}
print("<body bgcolor=#fof3f5><center><h3>Фотография сохранена!</h3><br><br>Новый файл Вы увидите, если зайдёте в <a href=club.php?p=7&login=$login target=main>персональную информацию</a>.<br><br>
Если Вы уже загружали фотографию, то Вам ещё придётся обновить страницу с персональной информацией, нажав правую клавишу мышки и выбрав \"Обновить\". Сочетание \"Ctrl\" + \"r\" или кнопка \"Обновить\" в браузере не помогают, так как нужно обновить отдельный фрейм.<br>\n</center></body>");}
}


}}
 else { print "<body bgcolor=#f0f3f5><center>Чужой логин!<h1><br></h1></center></body>"; }
}
?>