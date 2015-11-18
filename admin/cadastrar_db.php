<? include("verifica.php")?>
<? include("menu.php");
include_once("../register_global.php");
?>

<?
// inicia criação de pasta
if($nomedapasta != ""){
$pasta = @mkdir("../images/galeria/$nomedapasta", 0777);
@chmod("../images/galeria/$nomedapasta/", 0777);
}
// fim da criação da pasta
// inicia a função para enviar a foto
if($pasta == "$nomedapasta" AND $foto01 != ""){
if (copy($foto01,"../images/galeria/$nomedapasta/".$foto01_name)){
chmod("../images/galeria/$nomedapasta/".$foto01_name,0777);
}else{
echo ("<BR><div align='center'><font face='$fonte' size='$tamanhofonte'><b>Erro no enviar a foto!</b></font></div><BR>");
}
}
// termina a função para enviar a foto

if($pasta == "$nomedapasta" AND $foto01 != ""){
$sql="insert into galeria (id, nome, dia, mes, ano, local, pasta, foto01) VALUES ('', '$nome','$dia','$mes','$ano','$local','$nomedapasta','$foto01_name')"; 
$sql = mysql_query($sql);
?>
<meta http-equiv="refresh" content="1;URL=../images/enviar_fotos.php?nomedapasta=<? echo $nomedapasta?>&nivel=<? echo $nivel?>">
<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><b>Galeria cadastrada com sucesso!</b> </font>
</center>
<? }?>
