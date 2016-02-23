<?php
include ( "head.php");
?>
&nbsp;&nbsp;&nbsp;<font color="#f0f3f5">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaaaa
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</font>

<?php
if ((!isset($g1)) and (!isset($d1))) { print "<center><h2>Забыли пароль?</h2><br>
Заполните, пожалуйста, следущие формы, чтобы мы могли Вам помочь:<br><br>
<table>
<tr><td align=right>Ваш логин:</td> <td>
<form action=forgot.php method=\"post\"><input type=text name=login>
</td></tr>
<tr><td colspan=2><input name=\"g1\" type=submit value=\"Дальше\" style=\"width: 100%;\"></form></td></tr></table></center>
</body>
</td>
</tr>
</table>
</body>
</html>";}

if ((isset($g1)) and ($login==true)){

if(file_exists("club/users/$login.dat")){
$filename1 = "club/users/$login.dat";
$fp = fopen($filename1, "r");
$l1 = fgets($fp, 20);
$l2 = fgets($fp, 20);
$l3 = fgets($fp, 20);
$l4 = fgets($fp, 20);
$l5 = fgets($fp, 20);
$l6 = fgets($fp, 20);
$l7 = fgets($fp, 20);
$l8 = fgets($fp, 20);
$question = $l7;
$pass = $l6;
$answer = $l8;
print "<center><h2>Уважаемый $login !</h2><br>
При регистрации Вы ввели свой секретный вопрос. Он будет выведен ниже. Пожалуйста, ответьте на него и нажмите \"Дальше\".<br>
<form action=forgot.php method=\"post\">
<table>
<tr><td align=right>Вопрос:</td><td>&nbsp;<b>$question</b></td>
</tr>
<tr><td align=right>Ответ:</td><td>&nbsp;<input type=text name=answer2></td>
</tr>
<tr><td colspan=2><input type=\"hidden\" name=\"pass\" value=\"$pass\"><input type=\"hidden\" name=\"login\" value=\"$login\"><input type=\"hidden\" name=\"question\" value=\"$question\"><input type=\"hidden\" name=\"answer\" value=\"$answer\"><input type=submit name=\"d1\" value=Дальше style=\"width: 100%;\"></td>
</tr></table></form></center></body></td></tr></table></body></html>";
}

else{

echo"<h2><font color=\"red\"><center><strong>Неверный логин</strong></center></font><h2>";
print"<center><h3>Введите логин заново:</h3><br>
<table>
<tr><td align=right>Ваш логин:</td> <td>
<form action=forgot.php method=\"post\"><input type=text name=login>
</td></tr>
<tr><td colspan=2><input name=\"g1\" type=submit value=\"Дальше\" style=\"width: 100%;\"></form></td></tr></table></center>
</body>
</td>
</tr>
</table>
</body>
</html>";
}
}
if ((isset($g1)) and ($login==false)) {
print "<center><h2>Вы не ввели логин.</h2><br><table>
<tr><td align=right>Ваш логин:</td> <td>
<form action=forgot.php method=\"post\"><input type=text name=login>
</td></tr>
<tr><td colspan=2><input name=\"g1\" type=submit value=\"Дальше\" style=\"width: 100%;\"></form></td></tr></table></center>
</body>
</td>
</tr>
</table>
</body>
</html>";
}


if ((isset($d1)) and ($answer!="$answer2\r\n")){
print"<font color=red><center><h2>Ответ неверный.</h2></center></font>
</body></td></tr></table></body></html>

";
}
if ($answer=="$answer2\r\n")
{
print"<center><h2>Уважаемый $login!<br><br><font color=red>Ваш пароль: <b>$pass</b></font></h2><br><h3>Постарайтесь его больше не забывать.</h3></center>";
}

?>