<? include("verifica.php")?>
<? include("menu.php")?>

<?
$sql = mysql_query("DELETE FROM `mensagemfoto` WHERE `post` = '$del'");


?>
<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><b>Comentário excluído com sucesso!</b> </font><BR><br><font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='editar_comentarios.php?nivel=<? echo $nivel?>'>Clique aqui para Voltar</a></font>
</center>