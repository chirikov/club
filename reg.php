<?
if ($add != "yes") {
print "
      <center><h1>$x6</h1></center>
      <form action=reg.php?add=yes method=\"post\">
      <table width=200 align=center border=0>
	  <tr><td align=right>$x1</td> <td>
	  <input type=\"Text\" name=name>
	  </td></tr>
	  <tr><td align=right>$x2</td> <td>
	  <input type=\"Text\" name=email>
	  </td></tr>
	  <tr><td align=right>$x8</td> <td>
	  <input type=\"Text\" name=login>
	  </td></tr>
	  <tr><td align=right>$x9</td> <td>
	  <input type=\"password\" name=password>
	  </td></tr>
	  <tr><td align=right>$x3</td> <td>
	  <input type=\"Text\" name=age1 size=2 value=01 maxlength=\"2\">.<input type=\"Text\" name=age2 size=2 value=01 maxlength=\"2\">.<input type=\"Text\" name=age3 size=4 value=1900 maxlength=\"4\">
	  </td></tr>
 	  <tr><td align=right>$x4</td> <td>
	  <input type=\"Text\" name=text>
	  </td></tr>
 	  <tr><td colspan=2><input type=submit value=\"$x5\" style=\"width: 100%;\"></td></tr>
          </table></form>";}
else {
 if ($name == "") { print "<font color=red>Не введен обязательный параметр: Имя</font>"; exit; }
 if ($name == " ") { print "<font color=red>Не введен обязательный параметр: Имя</font>"; exit; }
 if ($email == "") { print "<font color=red>Не введен обязательный параметр: Е-mail</font>"; exit; }
 if ($email == " ") { print "<font color=red>Не введен обязательный параметр: E-mail</font>"; exit; }
 if ($age1 == "" || $age2 == "" || $age3 == "") { print "<font color=red>Не введен обязательный параметр: Дата рождения</font>"; exit; }


 $n = "0";
          $fill="club/users.data";
          $test = file("$fill"); 
          $size = sizeof($test);
                          do {
                          $data = explode("|", $test[$size]);                             
                          if ($login == "$data[2]") { print "<b>$x10</b>"; exit; }
                          $size--;
                          } while ($n < "$size+1");



$filename = "club/phcounter.dat";
$fp = @fopen($filename,"r"); 
if ($fp) { 
   $phcounter=fgets($fp,10); 
   fclose($fp); 
}
else { 
   $phcounter=1000; 
} 
$phcounter++; 
$fp = fopen($filename,"w"); 
if ($fp) { 
   $counter=fputs($fp,$phcounter); 
   fclose($fp); 
}
$time = date("F d, Y");

$name = str_replace("|", "", $name);
$email = str_replace("|", "", $email);
$text = str_replace("|", "", $text);
$text = "$phcounter|$name|$login|$password|$age1|$age2|$age3|$time|$text|";

$text = str_replace("\r\n", "", $text);
$text = htmlspecialchars($text);

 $file1 = "club/users.data";
 $fh = fopen($file1, "a+");          
 $ss = fputs($fh, "$text\r\n");        
 fclose($fh);     



print "<center><h1>$x7</h1></center>";

$time1 = date("Y");
$time2 = date("m");
$time3 = date("d");
$time = ($time2*31)+(($time1*12)*31)+$time3;


   $filename1 = "club/users/$login.dat";
    $fp = fopen($filename1, "w");
    fputs($fp, "$time\r\nПользователь\r\n$email\r\n$name\r\n$login\r\n$password\r\n");
    fclose($fp);
    chmod("$filename1", 0777);

     }


?>