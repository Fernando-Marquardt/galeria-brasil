<? $sql = mysql_query("SELECT * FROM users where login='$login'");
$dados=mysql_fetch_array($sql);
if($login == "$dados[login]"){?>

<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>O 
  usu�rio <font color="#FF0000"><? echo $login?></font> j� est� cadastrado</strong>.</font><BR>
  <br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='javascript:history.go(-1);'>Clique 
  aqui para Voltar</a></font> 
</center>

<? } else { $sql = mysql_query("Insert into users values('', '$nome', '$email', '$login', '$user_senha', '$user_nivel')");?>

<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>O 
  usu�rio <font color="#FF0000"><? echo $login?></font> foi cadastrado com sucesso!</strong></font><BR>
  <br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'>Agora ele poder� acessar as partes restritas de seu site. Mas lembre-se, apenas voc� pode adicionar usu�rios.<br>
<br>
<a href='javascript:history.go(-1);'>Clique 
  aqui para Voltar</a></font> 
</center>

<? }?>