<body bgcolor="#f0f3f5"><font face="Verdana" size="-1">
<h2><font color="#0080C0">&nbsp;&nbsp;����� � ���������:&nbsp;</font></h2>
<form method="get" action="../cgi-bin/web-search.cgi">&nbsp;&nbsp;&nbsp;<b>��� ������:</b>&nbsp;<input type="Text" name="query" size="30">
&nbsp;<b>����� ���������&nbsp;�������:</b>&nbsp;<SELECT NAME="site">
<OPTION VALUE="rambler">Rambler
<OPTION VALUE="yandex">�ndex
<OPTION VALUE="yahoo">Yahoo    
<OPTION VALUE="excite">Excite
<OPTION VALUE="infoseek">Infoseek
<OPTION VALUE="lycos">Lycos
<OPTION VALUE="altavista">Alta Vista
<OPTION VALUE="webcrawler">Webcrawler 
</SELECT>
&nbsp;<Input Type="Image" Src="search.gif" alt="������ �����" Value="submit" BORDER=0  ALIGN=absmiddle></form>

&nbsp;&nbsp;&nbsp;<b>�������:</b><p>
<ul><? include "news.php"; ?></ul>
<hr size=1>
</ul>
<h4>��, ���� ��� ������ ������. �� ������� : ��� ��������.</h4>
&nbsp;&nbsp<b>���������� ����������:&nbsp</b>
<font color="red"><b>
<?
$fh = fopen("phcounter.dat", "r");
$size = fread($fh, "999");
fclose($fh); $size = $size-1000;
echo $size;
?></b></font>
<hr></font>
</body>


