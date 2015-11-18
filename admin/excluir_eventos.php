<? include("menu.php")?>

<?
$sql = mysql_query("DELETE FROM `calendario` WHERE `id` = '$del'");


?>
<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><b>Evento excluído com sucesso!</b> </font><BR><br><font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='editar_eventos.php'>Clique aqui para Voltar</a></font>
</center>