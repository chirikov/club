<body bgcolor=#fof3f5>
<?

$dat = date("d.m.Y");

if ($name == "") {print "<h1><center>����������, ������� ���.</center></h1>"; exit;}
if ($name == "-") {print "<h1><center>����������, ������� ���.</center></h1>"; exit;}
if ($message == "") {print "<h1><center>����������, ������� �����.</center></h1>"; exit;}
if ($message == "-") {print "<h1><center>����������, ������� �����.</center></h1>"; exit;}


$text = "$name|$email|$dat|$message|";
$text = stripslashes($text);
$text = htmlspecialchars($text);
$text = str_replace("\r\n", "<br>", $text);




$text = str_replace(":)", "<img src='./img/smile.gif' border=0>", $text);
$text = str_replace(":-)", "<img src='./img/smile.gif' border=0>", $text);
$text = str_replace(";)", "<img src='./img/smile1.gif' border=0>", $text);
$text = str_replace(";-)", "<img src='./img/smile1.gif' border=0>", $text);
$text = str_replace("!", "<img src='./img/01.gif' border=0>", $text);
$text1 = $text;
$text = substr($text,0,550);

if (substr($text1,550,355) != "") { $text = "$text [����� �������, �.�. ��������� 550 ��������]"; 
print "<center><br><br> <b>���� ��������� ���� �������, �.�. ��� ������ ��������� 550 ��������!</b>";
}




$fp=fopen("guest.data","a");
fputs($fp,"\r\n $text");
fclose($fp);





print "<center><h1>��������� ���������</h1></center>";

?>
</body>