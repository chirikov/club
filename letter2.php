<body bgcolor="#f0f3f5">
<font color="#0080c0"><h2>&nbsp;Rambex >> ������ �������������</h2></font><br>
<center>
<table>
<tr><td align=right bgcolor=#ddddee width=50%>���� ���:</td>
<form method="post" action="letter2.php">
<td bgcolor=#ddddee width=50%><input type="Text" name="from"></td></tr>
<td align=right bgcolor=#ddddee width=50%>��� E-mail:</td><td bgcolor=#ddddee width=50%><input type="Text" name="email"></td></tr>
<td align=right bgcolor=#ddddee width=50%>���� ������:</td><td bgcolor=#ddddee width=50%><input type="Text" name="subject"></td></tr>
<td valign="top" align=right bgcolor=#ddddee width=50%>����� ������:</td><td bgcolor=#ddddee width=50%><textarea name="message0" cols="40" rows="7"></textarea></td></tr>
<td align=center bgcolor=#ddddee colspan="2"><input type="Submit" name=go value="���������"><input type="Reset" value=" �������� &nbsp;"></td></tr></table>
</form></center>
<?php
if (isset($go)) {
$to = "sokrat1988@mail.ru";
$message = "
������ ��� ������������� ����� Rambex.\n
�� $from\n
E-mail <a href=mailto:$email>$email</a>\n
���� $subject\n
����� ��������� : \n
$message0";
mail($to, $subject, $message ) or print "<center><h2>�� ���������� ��������� ������.</h2></center>";
}
?>
</body>
