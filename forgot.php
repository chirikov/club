<?php
include ( "head.php");
?>
&nbsp;&nbsp;&nbsp;<font color="#f0f3f5">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaaaa
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</font>

<?php
if ((!isset($g1)) and (!isset($d1))) { print "<center><h2>������ ������?</h2><br>
���������, ����������, �������� �����, ����� �� ����� ��� ������:<br><br>
<table>
<tr><td align=right>��� �����:</td> <td>
<form action=forgot.php method=\"post\"><input type=text name=login>
</td></tr>
<tr><td colspan=2><input name=\"g1\" type=submit value=\"������\" style=\"width: 100%;\"></form></td></tr></table></center>
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
print "<center><h2>��������� $login !</h2><br>
��� ����������� �� ����� ���� ��������� ������. �� ����� ������� ����. ����������, �������� �� ���� � ������� \"������\".<br>
<form action=forgot.php method=\"post\">
<table>
<tr><td align=right>������:</td><td>&nbsp;<b>$question</b></td>
</tr>
<tr><td align=right>�����:</td><td>&nbsp;<input type=text name=answer2></td>
</tr>
<tr><td colspan=2><input type=\"hidden\" name=\"pass\" value=\"$pass\"><input type=\"hidden\" name=\"login\" value=\"$login\"><input type=\"hidden\" name=\"question\" value=\"$question\"><input type=\"hidden\" name=\"answer\" value=\"$answer\"><input type=submit name=\"d1\" value=������ style=\"width: 100%;\"></td>
</tr></table></form></center></body></td></tr></table></body></html>";
}

else{

echo"<h2><font color=\"red\"><center><strong>�������� �����</strong></center></font><h2>";
print"<center><h3>������� ����� ������:</h3><br>
<table>
<tr><td align=right>��� �����:</td> <td>
<form action=forgot.php method=\"post\"><input type=text name=login>
</td></tr>
<tr><td colspan=2><input name=\"g1\" type=submit value=\"������\" style=\"width: 100%;\"></form></td></tr></table></center>
</body>
</td>
</tr>
</table>
</body>
</html>";
}
}
if ((isset($g1)) and ($login==false)) {
print "<center><h2>�� �� ����� �����.</h2><br><table>
<tr><td align=right>��� �����:</td> <td>
<form action=forgot.php method=\"post\"><input type=text name=login>
</td></tr>
<tr><td colspan=2><input name=\"g1\" type=submit value=\"������\" style=\"width: 100%;\"></form></td></tr></table></center>
</body>
</td>
</tr>
</table>
</body>
</html>";
}


if ((isset($d1)) and ($answer!="$answer2\r\n")){
print"<font color=red><center><h2>����� ��������.</h2></center></font>
</body></td></tr></table></body></html>

";
}
if ($answer=="$answer2\r\n")
{
print"<center><h2>��������� $login!<br><br><font color=red>��� ������: <b>$pass</b></font></h2><br><h3>������������ ��� ������ �� ��������.</h3></center>";
}

?>