<? $sql = mysql_query("delete from users where id='". $_GET['id'] ."'");?>
<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><b>Usuário excluído com sucesso!</b> </font><BR><br>
  <font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='?nivel=<? echo $nivel?>&acao=lista'>Clique 
  aqui para Voltar</a></font> 
</center>