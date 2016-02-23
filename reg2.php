<?php
include ("head.php");
?>&nbsp;&nbsp;&nbsp;<font color="#f0f3f5">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaaaa
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</font>
      <center><h2>Заполните регистрационную форму:</h2><br>
	  <b>Внимание!</b> Перед регистрацией настоятельно рекомендуется прочитать&nbsp;<a href='prav.php' title='Правила участия в клубе Rambex'>правила участия</a>, 
	  т.к. регистриуясь, Вы с ними соглашаетесь.</center>
      <form action=reg.php?add=yes method="post">
      <table width=200 align=center border=0>
	  <tr><td align=right>Ваше имя:</td> <td>
	  <input type="Text" name="name" maxlength=20>
	  </td></tr>
	  <tr><td align=right>Ваш E-mail:</td> <td>
	  <input type="Text" name=email maxlength=20>
	  </td></tr>
	  <tr><td align=right>Логин:</td> <td>
	  <input type="Text" name=login maxlength=20>
	  </td></tr>
	  <tr><td align=right>Пароль:</td> <td>
	  <input type="password" name=password maxlength=20>
	  </td></tr>
	  <tr><td align=right nowrap>Подтвердите пароль:</td> <td>
	  <input type="password" name=password22 maxlength=20>
	  </td></tr>
	  <tr><td align=right>Вопрос,&nbspна&nbsp;который&nbsp;Вы&nbsp;никогда&nbsp;не&nbsp;забудете&nbsp;ответ (используется при восстановлении пароля):</td> <td>
	  <input type=Text name=question maxlength=20>
	  </td></tr>
	  <tr><td align=right>Ответ на вопрос:</td> <td>
	  <input type=text name=answer maxlength=20>
	  </td></tr>
	  <tr><td align=right>Дата рождения [день.месяц.год]:</td> <td>
	  <input type="Text" name=age1 size=2 value=01 maxlength="2">.<input type="Text" name=age2 size=2 value=01 maxlength="2">.<input type="Text" name=age3 size=4 value=1980 maxlength="4">
	  </td></tr>
 	  <tr><td align=right nowrap>Пара слов о себе или девиз:</td> <td>
	  <input type="Text" name=text maxlength=20>
	  </td></tr>
 	  <tr><td colspan=2><input type=submit name=goo value="Зарегистрироваться" style="width: 100%;"></td></tr>
          </table></form></body></td>
</tr>
</table>
</body>
</html>
<?php
if(isset($goo)) {
 if ($name == "") { print "<center><h2>Не введен обязательный параметр: Имя.</h2></center>"; exit; }   
 if ($email == "") { print "<center><h2>Не введен обязательный параметр: Е-mail.</h2></center>"; exit; }   
 if ($password22 != $password) {print "<center><h2>Вы ввели разные пароли.</h2></center>"; exit; }   
 if ($question == "") { print "<center><h2>Не введен обязательный параметр: Секретный вопрос.</h2></center>"; exit; }   
 if ($answer == "") { print "<center><h2>Не введен обязательный параметр: Ответ на секретный вопрос.</h2></center>"; exit; }   
 if ($age1 == "" || $age2 == "" || $age3 == "") { print "<center><h2>Не введен обязательный параметр: Дата рождения.</h2></center>"; exit; }   
 $n = "0";
          $fill="club/users.data";
          $test = file("$fill"); 
          $size = sizeof($test);
                          do {
                          $data = explode("|", $test[$size]);                             
                          if ($login == "$data[2]") { print "<h3>Регистрация прервана : Пользователь с таким логином уже существует. Пожалуйста, вернитесь и выберите другой логин.</h3>"; exit; }
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
$question = str_replace("|", "", $question);
$answer = str_replace("|", "", $answer);
$text = "$phcounter|$name|$login|$password|$age1|$age2|$age3|$time|$text";
$text = str_replace("\r\n", "", $text);
$text = htmlspecialchars($text);
 $file1 = "club/users.data";
 $fh = fopen($file1, "a+");          
 $ss = fputs($fh, "$text\r\n");        
 fclose($fh);     
print "<center><h1>Вы зарегистрированы</h1><br><br><h2>Войти в клуб можно здесь:</h2><br><form action=club/index.php method=post>
<b>ЛОГИН:</b>&nbsp;<input type=text value=$login name=login>
<B>ПАРОЛЬ:</B>&nbsp;<input type=password value=$password name=password>
<input type=submit value=Войти ></form><form action=http://www.maillist.ru/cgi/ml_fs.cgi target=_blank>
<input type=hidden value=$email name=email><br> 
<input type=hidden name=topic value=38025> 
<input type=submit name=subscribe value=\"Подписаться на рассылку новостей и обновлений Rambex\">
</form>
</center>";
$time1 = date("Y");
$time2 = date("m");
$time3 = date("d");
$time = ($time2*31)+(($time1*12)*31)+$time3;
   $filename1 = "club/users/$login.dat";
    $fp = fopen($filename1, "w");
    fputs($fp, "$time\r\nПользователь\r\n$email\r\n$name\r\n$login\r\n$password\r\n$question\r\n$answer\r\n");
    fclose($fp);
    chmod("$filename1", 0777);
     }
?>