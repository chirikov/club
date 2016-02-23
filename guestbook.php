<?
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
print "<table align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
       <tr><td bgcolor=$bgt1 colspan=2>&nbsp <img src='str.gif' align=center> <b>Последние 10 записей:</b></td></tr>
        ";

  $n = "0";
  $g = "0";
          $fill="guest.data";
          $test = file("$fill");
      $size = sizeof($test);
$num = $size;  
                        do { 

                                   $data = explode("|", $test[$num]);   
              
if ($data[0] != "") {              
print "

<tr>
<td width=4% valign=\"top\"><center><img src=\"mes.gif\"></td>
<td width=\"96%\"><b>$data[0] <a href=mailto:$data[1]>$data[1]</a></b> <i>$data[2]</i><br>$data[3]</td>
</tr>
<tr><td></td><td height=3 background=\"line.gif\"></td>
</tr>
<tr><td height=\"10\"> </td></tr>
        ";
}
$num3 = $num+10;
if ($g == "10") { print "<tr><td colspan=2><hr size=1>
";
$num4 = $num3/10;
$num4 = explode(".", $num4);
$n = "0";
print "<center><img src='str.gif' align=center> ";
do {
$nn = $n+1;
print " [<a href='viewpart.php?part=$n'>$nn</a>] ";
$n++;
 } while($n < $num4[0]);
print "
 </td></tr>

</table>

<center>
<br><br>


<b>Добавить сообщение</b><br><form action=add.php method=post>
<textarea cols=40 rows=5 size=100 name=message></textarea><br>
Имя отправителя :&nbsp;&nbsp;&nbsp;<input type=text  value='' name=name size=30><br>   
E-mail отправителя : <input type=text value='' name=email size=30><br>   
<input type=submit  value='             Отправить  сообщение              '>
</form>
";




 exit; } 

$g++;   
$num--; 
$n++;
                     } while ($n < "$size");


print "
 </td></tr>

</table>

<center>
<br><br>


<b>Добавить сообщение</b><br><form action=add.php method=post>
<textarea cols=40 rows=5 size=100 name=message></textarea><br>
Имя отправителя :&nbsp;&nbsp;&nbsp;<input type=text  value='' name=name size=30><br>   
E-mail отправителя : <input type=text value='' name=email size=30><br>   
<input type=submit  value='             Отправить  сообщение              '>
</form>
";



?>
