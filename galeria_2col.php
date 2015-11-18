<?
include("path.php");
$sql = mysql_query("SELECT * FROM galeria"); 
?>
<? // Agora exiba o código com a configuração de sua tabela - o cabeçalho dela. ?>

<table border="0" cellpadding="0" cellspacing="0">
 <?
// Agora vamos montar o código. Pegue o valor total de resultados: 
$total = mysql_num_rows($sql); 
// Defina o número de colunas que você deseja exibir: 
$colunas = "2"; 
// Agora vamos ao "truque": 
if ($total>0) { 
for ($i = 0; $i < $total; $i++) { 
if (($i%$colunas)==0) { 
?>
 <TR>
   <TD height="20" colspan="4"> 
     <HR align="center" width="100%" size="1" noshade color="<? echo $cortexto?>"> </TD></tr>
 <tr> 
   <? }?>
<?
$dados= mysql_fetch_array($sql) ;
?>
    <td width="280" align="left" valign="top"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
      <? if($dados[foto01] != ""){?>
      <a href="javascript:AbreJanelaGaleria('janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><img src="imagemdimindex.php?imagem=images/galeria/<? echo $dados['pasta']?>/<? echo $dados['foto01']?>" border="1" align="left"></a> 
      <? }?>
      <span style="text-transform: uppercase"><b><a href="javascript:AbreJanelaGaleria('janela.php?dir=images/galeria/<? echo "$dados[pasta]/&id=$dados[id]&evento=$dados[nome]&data=$dados[dia]/$dados[mes]/$dados[ano]&local=$dados[local]&id=$dados[id]";?>')"><? echo $dados['nome']?></a></b></span><BR>
     Data: <strong><? echo $dados['dia'],"/",$dados['mes'],"/",$dados[ano];?></strong><br>
       Local: <strong><? echo $dados['local']?></strong><br>
      <strong> 
      <?
$dir="images/galeria/$dados[pasta]";
$dir1=opendir($dir);
$cont=0;
while ($res=readdir($dir1) ){
$tipo=explode(".",$res);
if ($tipo[1]=="jpg" || $tipo[1]=="JPG"){
$cont=$cont+1;
}
}
print ($cont);
?> </strong>Fotos.</font></td>
<TD width="15"></TD>
  <? }}?>
  </TR>
</table>
