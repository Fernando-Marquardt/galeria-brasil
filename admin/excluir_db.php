<? include("verifica.php")?>
<? include("menu.php")?>

<?
$sql = mysql_query("delete from galeria where id='$id'");

$dir = "../images/galeria/$pasta";
$dir1=opendir("$dir");
while ($res=readdir($dir1)){
if ($res!='' && $res!='.' && $res!='..'){
$url = "$dir/$res";
@unlink("$url");
}}
@rmdir ("$dir");
?>
<meta http-equiv="refresh" content="1;URL=listar_galerias.php?nivel=<? echo $nivel?>">
<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><b>Galeria exclu�da com sucesso!</b> </font><BR><br><font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='listar_galerias.php?nivel=<? echo $nivel?>'>Clique aqui para Voltar</a></font>
</center>