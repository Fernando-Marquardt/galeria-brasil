<? include("verifica.php")?>
<? include("menu.php")?>

<?
// inicia criação de pasta
if($_POST['nomedapasta'] != ""){
$pasta = @mkdir("../images/galeria/". $_POST['nomedapasta'], 0777);
@chmod("../images/galeria/". $_POST['nomedapasta'] ."/", 0777);
}
// fim da criação da pasta
// inicia a função para enviar a foto
if($pasta == $_POST['nomedapasta'] && $_FILES['foto01']['tmp_name'] != ""){
if (copy($_FILES['foto01']['tmp_name'],"../images/galeria/". $_POST['nomedapasta'] ."/". $_FILES['foto01']['name'])){
chmod("../images/galeria/". $_POST['nomedapasta'] ."/". $_FILES['foto01']['name'],0777);
}else{
echo ("<BR><div align='center'><font face='$fonte' size='$tamanhofonte'><b>Erro no enviar a foto!</b></font></div><BR>");
}
}
// termina a função para enviar a foto

if($pasta == $_POST['nomedapasta'] && $_FILES['foto01']['tmp_name'] != ""){
$sql="insert into galeria (nome, dia, mes, ano, local, pasta, foto01) VALUES ('". $_POST['nome'] ."','". $_POST['dia'] ."','". $_POST['mes'] ."','". $_POST['ano'] ."','". $_POST['local'] ."','". $_POST['nomedapasta'] ."','". $_FILES['foto01']['name'] ."')"; 
$sql = mysql_query($sql);
?>
<meta http-equiv="refresh" content="1;URL=../images/enviar_fotos.php?nomedapasta=<? echo $_POST['nomedapasta']?>&nivel=<? echo $nivel?>">
<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><b>Galeria cadastrada com sucesso!</b> </font>
</center>
<? }?>
