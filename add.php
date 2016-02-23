<body bgcolor=#fof3f5>
<?

$dat = date("d.m.Y");

if ($name == "") {print "<h1><center>Пожалуйста, введите имя.</center></h1>"; exit;}
if ($name == "-") {print "<h1><center>Пожалуйста, введите имя.</center></h1>"; exit;}
if ($message == "") {print "<h1><center>Пожалуйста, введите текст.</center></h1>"; exit;}
if ($message == "-") {print "<h1><center>Пожалуйста, введите текст.</center></h1>"; exit;}


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

if (substr($text1,550,355) != "") { $text = "$text [текст обрезан, т.к. превышает 550 символов]"; 
print "<center><br><br> <b>Ваше сообщение было урезано, т.к. его длинна превышала 550 символов!</b>";
}




$fp=fopen("guest.data","a");
fputs($fp,"\r\n $text");
fclose($fp);





print "<center><h1>Сообщение добавлено</h1></center>";

?>
</body>