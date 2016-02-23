<?
switch($action) :
case("add") :
include "up.php";
$ok = "non";
$ok2 = "non";
/////////////////provera///////////////////
$name = "users.data";
if ($text == "") { print "Пожалуйста, введите текст записки."; exit; }
if ($text == " ") { print "Пожалуйста, введите текст записки."; exit; }

          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
     $si = $size;
     $sizeres = $size;
$n = "0";
do {
    $data = explode("|", $test[$n]);
if ($login == "$data[0]" && $password == "$data[1]") { $ok = "ok"; }
if ($login2 == "$data[0]") { $ok2 = "ok"; }
$n++;
} while ($n < $size);
//////////////////////////////////////////
if ($login2 == "$login") { print "<center>Невозможно отправить записку, т.к. имя получателя совпадает с именем отправтеля.<br>Пожалуйста, вернитесь и измените имя получателя."; exit; }
if ($ok != "ok")  { print "Неверная комбинация логин\пароль для участника $login!"; exit; }
if ($ok2 != "ok") { print "Не существует участника $login2!"; exit; }

$date = date("d.m.Y");
$data = "$login|$login2|$text|$date";
$data = str_replace("\r\n", "", $data);
$data = str_replace("\"", "`", $data);
$data = htmlspecialchars($data);

                                     $filename = "zapiski.data";
                                     $fp = fopen($filename, "a+");
                                     $xx = fputs($fp, "$data\r\n");
                                     fclose($fp);
print "<h1>Записки : добавление</h1>
       <br><br><center><b>Записка для $login2<br>успешно добавлена</b><br><br>Ее текст:<i><br>$text
      ";
include "down.php";
break;
case("form") :
include "up.php";

print "<h1>Добавить записку на сайт</h1>
<form action=zapiski.php?action=add method=post>
<table width=95% align=center border=0>
<tr><td bgcolor=eeeeee>Вы:</td><td bgcolor=eeeeee><select name=login>";

$name = "users.data";

          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
     $si = $size;
     $sizeres = $size;
$n = "0";
do {
    $data = explode("|", $test[$n]);
print " <option value=$data[0]>$data[0]</a> \r\n";
$n++;
} while ($n < $size);




print "
</select> <a href='reg.php'>Вас нет в списке? - Регистрируйтесь!</a></td></tr>
<tr><td bgcolor=eeeeee>Ваш пароль:</td><td bgcolor=eeeeee><input type=password name=password></td></tr>
<tr><td bgcolor=eeeeee>Оставить записку для:</td><td bgcolor=eeeeee><select name=login2>";

//$name = "users.data";
//
//          $fill="$name";
//          $test = file("$fill"); 
//     $size = sizeof($test);
//     $si = $size;
//     $sizeres = $size;
$n = "0";
do {
    $data = explode("|", $test[$n]);
print " <option value=$data[0]>$data[0]</a> \r\n";
$n++;
} while ($n < $size);

print "</td></tr>
<tr><td bgcolor=eeeeee>Текст сообщения: </td><td bgcolor=eeeeee><textarea cols=40 rows=5 name=text></textarea></td></tr>
<tr><td bgcolor=eeeeee colspan=2><center><input type=submit value=Добавить></td></tr>
</table>
</form>
<center>
<br><br>
<hr size=1>
Записками могут обмениваться только зарегистрированные пользователи 
(регистрация бесплатная и нужна для того, чтобы вашим ником не могли 
воспользоваться посторонние), после добавления ваша записка появится 
в правом столбце сайта и будет находиться там до тех пор, пока тот,
кому она предназначается ее не прочитает.
<hr size=1>
      ";
include "down.php";
break;
case("look") :
include "up.php";
print "<h1>Записка для $login</h1>
      <form action=zapiski.php?action=look2 method=post>
      <input type=hidden name=login value=$login>
      <center>Вы : <b>$login</b>   <br>
      Ваш пароль на сайте: <input type=password name=password>
      <br><input type=submit value='    Прочитать записку!    '> 
      </form>
       ";

include "down.php";
break;

case("look2") :
include "up.php";
$name = "users.data";

          $fill="$name";
          $test = file("$fill"); 
     $size = sizeof($test);
     $si = $size;
     $sizeres = $size;
$n = "0";
do {
    $data = explode("|", $test[$n]);
if ($login == "$data[0]" && $password == "$data[1]") { $ok = "ok"; }
$n++;
} while ($n < $size);

          $file22 = "zapiski.data";
          $test3 = file("$file22"); 
     $size = sizeof($test3);
$n = "0";
do {
    $data4 = explode("|", $test3[$n]);


if ($ok == "ok") {
if ($login == "$data4[1]") {  $test3[$n] = ""; 

print "<h1>Текст записки для $login</h1>
       <font color=red size=3><i>Записка для $data4[1] от $data4[0], написана $data4[3]</i></font><br><tt><font size=3> $data4[2]
       ";
                  } else { } }
                
else {
    $test3[$n] = "$data4[0]|$data4[1]|$data4[2]|$data4[3]|"; 
     }    
$n++;
} while ($n < $size);




$n = "0";                          do {
$array .= "$test3[$n]";
         $n++;               } while ($n < $size);
        $fh = fopen("zapiski.data", "w");          
        $ee = fputs($fh, "$array");      
        fclose($fh);



include "down.php";
break;


default :
$name2 = "zapiski.data";

          $fill2="$name2";
          $test2 = file("$fill2"); 
     $size = sizeof($test2);
     $si = $size;
     $sizeres = $size;
$n = $size;
$pp = "0";
do {

    
    $data2 = explode("|", $test2[$n]);
if ($data2[0] != "") {
print "<img src=./img/mes.gif ALT=\"$data2[3] : Добавил $data2[0]\"> <a href='zapiski.php?action=look&login=$data2[1]'>Записка для <b>$data2[1]</b></a><br>";
}
$n--;
$pp++;
if ($pp == "5") { $n = "0"; }
} while ($size < $n+$size);
break;
endswitch;

?>