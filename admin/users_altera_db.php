<? $sql = mysql_query("UPDATE users SET nome='$nome', email='$email', login='$login', senha='$senha2', nivel='$user_nivel' WHERE id='$id'");?>

<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Usuário alterado com sucesso!</strong></font><BR>
  <br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='?nivel=<? echo $nivel?>&acao=lista'>Clique 
  aqui para Voltar</a></font> 
</center>