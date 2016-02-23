<?
require "settings.php";

$name = "online.data";
$yes = "no";
          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
$n = "0";
do {
 $data = explode("|", $test[$n]);
$time1 = date("d");
$time3 = date("H");
$time2 = date("i");
$time = ($time3*60)+(($time1*12)*60)+$time2;
$sss = $time-$data[1];

if ($login == "$data[0]") { 
                          $array .= "$login|$time|\r\n";
                          $yes = "yes"; }
else {
if ($sss > 10) { } else { $array .= "$data[0]|$data[1]|\r\n"; }
     }
$n++;
} while ($n < $size);
if ($yes != "yes") {  $array .= "$login|$time|\r\n"; }


$fh = fopen($name, "w");
fputs($fh, "$array");
fclose($fh);
///////////////////////////////////////////////////////////////////////////
$name = "users.data";
$yes = "no";
          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
$n = "0";
do {
 $data = explode("|", $test[$n]);
if ($login == "$data[2]" && $password == "$data[3]") { $yes = "yes"; }
$n++;
} while ($n < $size);
if ($yes == "yes") { print "
<html>
<title>$title</title>
<style>
A:hover {COLOR: #FF0000}</style>
<META http-equiv=pragma content=no-cache>
<frameset  rows=\"70,*\" framespacing=\"0\">
    <frame name=\"up\" src=\"club.php?p=1\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" frameborder=\"0\" noresize>
    <frameset  cols=\"200,*\" border=\"no\" framespacing=\"0\">
        <frame name=\"menu\" src=\"club.php?p=2&login=$login&password=$password\" MARGINHEIGHT=0 MARGINWIDTH=0 FRAMESPACING=0 scrolling=\"auto\" frameborder=\"0\" noresize>
        <frame name=\"main\" src=\"club.php?p=3&login=$login&password=$password&param=main.php\" MARGINHEIGHT=0 MARGINWIDTH=0 FRAMESPACING=0 scrolling=\"auto\" frameborder=\"0\" noresize>
    </frameset>
</frameset>
</html>
";
} else {
 print "
<center><font color=red><h1>Неверный логин\пароль!</font> Пожалуйста,&nbsp;проверьте&nbsp;введённую&nbsp;информацию.</h1><br><form action=index.php method=post>
&nbsp;&nbsp;&nbsp;<b>Логин:</b> <input type=text name=login>
&nbsp;&nbsp;<B>Пароль:</B> <input type=password name=password>
<input type=submit value=\"Войти\" ></form></center></body></td></tr></table></body></html>
"; exit; }
?>