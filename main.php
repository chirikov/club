<body bgcolor="#f0f3f5"><font face="Verdana" size="-1">
<h2><font color="#0080C0">&nbsp;&nbsp;Найти в Интернете:&nbsp;</font></h2>
<form method="get" action="../cgi-bin/web-search.cgi">&nbsp;&nbsp;&nbsp;<b>Что искать:</b>&nbsp;<input type="Text" name="query" size="30">
&nbsp;<b>Через поисковую&nbsp;систему:</b>&nbsp;<SELECT NAME="site">
<OPTION VALUE="rambler">Rambler
<OPTION VALUE="yandex">Яndex
<OPTION VALUE="yahoo">Yahoo    
<OPTION VALUE="excite">Excite
<OPTION VALUE="infoseek">Infoseek
<OPTION VALUE="lycos">Lycos
<OPTION VALUE="altavista">Alta Vista
<OPTION VALUE="webcrawler">Webcrawler 
</SELECT>
&nbsp;<Input Type="Image" Src="search.gif" alt="Начать поиск" Value="submit" BORDER=0  ALIGN=absmiddle></form>

&nbsp;&nbsp;&nbsp;<b>НОВОСТИ:</b><p>
<ul><? include "news.php"; ?></ul>
<hr size=1>
</ul>
<h4>Да, клуб ещё совсем пустой. Но уверяем : это временно.</h4>
&nbsp;&nbsp<b>КОЛИЧЕСТВО УЧАСТНИКОВ:&nbsp</b>
<font color="red"><b>
<?
$fh = fopen("phcounter.dat", "r");
$size = fread($fh, "999");
fclose($fh); $size = $size-1000;
echo $size;
?></b></font>
<hr></font>
</body>


