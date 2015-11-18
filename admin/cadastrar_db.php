<? include("verifica.php")?>
<? include("menu.php")?>

<?
// inicia criação de pasta
//if($nomedapasta != ""){
//$pasta = @mkdir("../images/galeria/$nomedapasta", 0777);
//}
// fim da criação da pasta
// inicia a função para enviar a foto
//if($pasta == "$nomedapasta" AND $foto01 != ""){
//if (copy($foto01,"../images/galeria/$nomedapasta/".$foto01_name)){}else{
//echo ("<BR><div align='center'><font face='$fonte' size='$tamanhofonte'><b>Erro no enviar a foto!</b></font></div><BR>");
//}
//}
// termina a função para enviar a foto


$sql="insert into galeria (id, nome, dia, mes, ano, local, pasta, foto01) VALUES ('', '$nome','$dia','$mes','$ano','$local','$nomedapasta','$foto01_name')"; 
$sql = mysql_query($sql);
?>
<center>
  <font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><b>Galeria cadastrada com sucesso!</b> </font>
</center>
